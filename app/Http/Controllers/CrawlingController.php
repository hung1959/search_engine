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
        $dom->loadFromUrl($searchUrl);
        $result = $dom->outerHtml;
        $this->regexResult($result);
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

    public function regexResult($result)
    {
        $firstString = '</div></div><div><div class'; 
        $splitPos = strpos($result,$firstString);
        $result = substr($result, $splitPos);
        $lastString = 'T?m ki&#7871;m c? li?n quan';
        $splitPos = strpos($result,$lastString);
        $remove = substr($result, $splitPos);
        $result = str_replace($remove,"",$result);
        #$a = preg_match( '/<h3>(.*?)<\/div>/', $result, $match );
        #$pieces = explode("<h3>", $result);
    
        dd($result);
    }
}
