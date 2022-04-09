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
        $result = $dom->outerHtml;
        $arr = [];
        $parentIndex = 0;
        foreach($html->find('h3') as $elements) {
            $childIndex = 0;
            foreach($html->find('span a') as $elements) {
                if ($parentIndex == $childIndex)
                {
                    $GLOBALS['link'] = str_replace("/url?q=", "", $elements->getAttribute('href'));
                }
                $childIndex += 1;
            }
            $descIndex = 0;
            foreach ($html->find('.MSiauf div') as $description)
            {
                if ($parentIndex == $descIndex)
                {
                    $targetData = [
                        "name" => $elements->innertext,
                        "url" => $GLOBALS['link'],
                        "description" => $description->innertext
                    ];
                    array_push($arr, $targetData);
                }
                $descIndex += 1;
            }
            $parentIndex += 1;
        }
        dd($arr);
    }

    public function handleSearchUrl()
    {
        $searchUrl = "https://www.google.com/search?q=";
        $key = "du lich da nang"; # get from user request
        $searchKey = $this->convertingSearchKey($key);
        return "${searchUrl}${searchKey}";
    }

    public function convertingSearchKey($searchKey)
    {
        return str_replace(' ','+', $searchKey);
    }
}
