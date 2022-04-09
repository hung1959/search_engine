<?php

namespace App\Http\Controllers;

use App\Models\Search;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPHtmlParser\Dom;

class CrawlingController extends Controller
{
    public function index()
    {
        $dom = new Dom;
        $searchUrl = $this->handleSearchUrl();
        $html = $dom->loadFromUrl($searchUrl);
        $arr = [];
        foreach ($html->find('h3') as $elements) {
            $targetData = [
                "url" => str_replace("/url?q=", "", $elements->parent->getAttribute('href')),
                "name" => $elements->innertext,
                "description" => $elements->parent->parent->parent->find('div div div div')->innertext
            ];
            array_push($arr, $targetData);
        }
        dd($arr);
    }

    public function handleSearchUrl()
    {
        $searchUrl = "https://www.google.com/search?q=";
        $key = "cach hoc tieng nhat"; # get from user request
        $searchKey = $this->convertingSearchKey($key);
        return "${searchUrl}${searchKey}";
    }

    public function convertingSearchKey($searchKey)
    {
        return str_replace(' ', '+', $searchKey);
    }

    public function ajaxRequest(Request $request)
    {
        if ($request->ajax()) {
            $keyword = $request->keyword;
            $response = '';
            #$results = DB::table('products')->where('title', 'LIKE', '%' . $request->search . '%')->get();
            $results = [
                [
                    "name" => "ABC",
                    "url" => "aaaa",
                    "description" => "dsdsah fhdksahd"
                ],
                [
                    "name" => "ABC",
                    "url" => "aaaa",
                    "description" => "dsdsah fhdksahd"
                ],
                [
                    "name" => "ABC",
                    "url" => "aaaa",
                    "description" => "dsdsah fhdksahd"
                ]
            ];
            if ($results) {
                foreach ($results as $key => $result) {
                    $name = $result["name"];
                    $description = $result["description"];
                    $url = $result["url"];
                    $response .= "
                    <div class='block'>
                        <a href='${url}'>
                            <label class='label-link'>${name}</label>
                            <h5 style='color: rgb(57, 165, 165);'>${name}</h5>
                        </a>
                        <p>${description}</p>
                    </div>";
                }
            }
            
            return response($response);
        }
    }
}
