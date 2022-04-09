<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPHtmlParser\Dom;

class CrawlingController extends Controller
{
    public function index()
    {
        $dom = new Dom;
        $searchUrl = $this->handleSearchUrl();
        $html = $dom->loadFromUrl($searchUrl);
        $arr = [];
        foreach($html->find('h3') as $elements) {
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
        return str_replace(' ','+', $searchKey);
    }
}
