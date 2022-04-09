<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPHtmlParser\Dom;

class CrawlingController extends Controller
{
    public function index()
    {
        $dom = new Dom;
        $dom->loadStr('<div class="all"><p>Hey bro, <a href="google.com">click here</a><br /> :)</p></div>');
        $a = $dom->find('a')[0];
        echo $a->text; // "click here"
    }
}
