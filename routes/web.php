<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrawlingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

#Route::get('/', [CrawlingController::class, 'index']);
Route::get('/search', [CrawlingController::class, 'ajaxRequest'])->name('ajax-search');
Route::get('/suggest-search', [CrawlingController::class, 'suggestKeyword'])->name('suggest-search');
Route::get('/crawling', function () {
  return view('crawl');
});
Route::post('/crawling', [CrawlingController::class, 'submitKeywordCrawl'])->name('crawling-data');
Route::get('/', [CrawlingController::class, 'index']);
