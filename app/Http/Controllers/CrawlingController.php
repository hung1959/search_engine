<?php

namespace App\Http\Controllers;

use App\Models\data_crawl;
use App\Models\search_history;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use PHPHtmlParser\Dom;
use PHPHtmlParser\Options;

class CrawlingController extends Controller
{

    public function index()
    {
        $searchHistories = search_history::orderBy('created_at', 'desc')->pluck('key_search');
        $searchHistories = $searchHistories->unique()->take(5);
        $searchHistories = $this->handleKeySearch($searchHistories);
        return view('index', compact('searchHistories'));
    }

    public function submitKeywordCrawl($requestKeyword)
    {
        $keyword = str_replace(' ', '+', $requestKeyword);
        $searchUrl = "https://www.google.com/search?q=";
        $url = "${searchUrl}${keyword}+review+english";
        $this->crawlingData($url);
    }

    public function crawlingData($url)
    {
        $count = 0;
        $dom = new Dom;
        $html = $dom->loadFromUrl($url, (new Options())->setenforceEncoding('UTF-8'));
        foreach ($html->find('h3') as $elements) {
            $data = data_crawl::where('title', '=', $elements->innertext())->first();
            if ($data === null) {
                $urlLength = strpos($elements->parent->getAttribute('href'), "=");
                $targetUrl = substr($elements->parent->getAttribute('href'), $urlLength + 1);
                $position = strpos($targetUrl, "&sa=");
                if ($position == false) {
                    $position = strpos($targetUrl, "&amp");
                }
                $targetUrl = urldecode(substr($targetUrl, 0, $position));
                data_crawl::create([
                    'title' => $elements->innertext(),
                    'description' => $elements->parent->parent->parent->lastChild()->innertext(),
                    'url' => $targetUrl
                ]);
            } else {
                $count++;
            }
        }
    }

    public function ajaxRequest(Request $request)
    {
        $this->submitKeywordCrawl($request->keyword);
        if ($request->ajax()) {
            $keyword = $request->keyword;
            search_history::create([
                'key_search' => $keyword
            ]);
            if (isset($request->skip)) {
                $skip = $request->skip;
            } else {
                $skip = 0;
            }
            $results = data_crawl::SearchReview($keyword)->limit(10)->skip($skip)->get();
            $response = '';
            if ($results) {
                foreach ($results as $key => $result) {
                    $name = $result["title"];
                    $description = $result["description"];
                    $url = $result["url"];
                    #<label class='label-link'>${name}</label>
                    $response .= "
                    <div class='block'>
                        <a target='_blank' href='${url}'>
                            <h5 style='color: rgb(57, 165, 165);'>${name}</h5>
                        </a>
                        <p>${description}</p>
                    </div>";
                }
                return response($response);
            }
        }
    }

    public function handleKeySearch($keywords)
    {
        $result = "[";
        $index = 0;
        foreach ($keywords as $keyword) {
            if ($index == 0) {
                $result = $result . "$keyword";
            } else {
                $result = $result . ",$keyword";
            }
            $index++;
        }
        $result .= "]";
        return $result;
    }
}
