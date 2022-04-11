<?php

namespace App\Http\Controllers;

use App\Models\data_crawl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPHtmlParser\Dom;
use PHPHtmlParser\Options;

class CrawlingController extends Controller
{

    public function index()
    {
        $result = data_crawl::all()->pluck('title');
        return view('index', compact('result'));
    }

    public function submitKeywordCrawl(Request $request)
    {
        $keyword = $this->convertingSearchKey($request->keyword);
        $url = $this->handleSearchUrl($keyword);
        return $this->crawlingData($url);
    }

    public function convertingSearchKey($searchKey)
    {
        return str_replace(' ', '+', $searchKey);
    }

    public function handleSearchUrl($keyword)
    {
        $searchUrl = "https://www.google.com/search?q=";
        return "${searchUrl}${keyword}+review+english";
    }

    public function crawlingData($url)
    {
        $dom = new Dom;
        $html = $dom->loadFromUrl($url, (new Options())->setenforceEncoding('UTF-8'));
        foreach ($html->find('h3') as $elements) {
            $urlLength = strpos($elements->parent->getAttribute('href'), "=");
            $targetUrl = substr($elements->parent->getAttribute('href'), $urlLength + 1);
            data_crawl::create([
                'title' => $elements->innertext(),
                'description' => $elements->parent->parent->parent->lastChild()->innertext(),
                'url' => $targetUrl
            ]);
        }

        $message = "Data has been crawled successfully!";
        return view('crawl', compact('message'));
    }

    public function ajaxRequest(Request $request)
    {
        if ($request->ajax()) {
            $keyword = $request->keyword;
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
                        <a href='${url}'>
                            <h5 style='color: rgb(57, 165, 165);'>${name}</h5>
                        </a>
                        <p>${description}</p>
                    </div>";
                }
                return response($response);
            }
        }
    }
}
