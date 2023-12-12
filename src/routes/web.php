<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BikelifeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\TouringController;
use App\Http\Controllers\SuggestionController;
use Laravel\Prompts\SuggestPrompt;

Route::get('/', [BikelifeController::class, 'top'])->name('top');
Route::get('/know', [BikelifeController::class, 'know'])->name('know');

// おすすめの飲食
Route::get('/eating', [SuggestionController::class, 'eating'])->name('eating');
// 飲食・詳細
Route::get('/eating/detail/{id}', [SuggestionController::class, 'detail'])->name('detail');
// 飲食・紹介
Route::get('/introduction', [SuggestionController::class, 'introduction'])->name('introduction');
Route::post('/intro', [SuggestionController::class, 'intro'])->name('intro');
// おすすめの風景
Route::get('/scenery', [SuggestionController::class, 'scenery'])->name('scenery');
// 風景・詳細
Route::get('/scenery/specifics/{id}', [SuggestionController::class, 'specifics'])->name('specifics');
// 風景・紹介
Route::get('/referral', [SuggestionController::class, 'referral'])->name('referral');
Route::post('/refe', [SuggestionController::class, 'refe'])->name('refe');

// マスツーリング
Route::get('/touring', [TouringController::class, 'touring'])->name('touring');
Route::post('/like', [TouringController::class, 'like'])->name('like');
// マスツーリング投稿
Route::get('/touring/recruiting', [TouringController::class, 'recruiting'])->name('recruiting');
Route::post('/touring/recruiting/add', [TouringController::class, 'add'])->name('add');
// マスツーリングコメント
Route::get('/touring/comment/{id}', [TouringController::class, 'comment'])->name('comment');
// マスツーリングコメント・追加
Route::post('/transmission', [TouringController::class, 'transmission'])->name('transmission');
// マスツーリングリプライ・追加
Route::post('/replie', [TouringController::class, 'replie'])->name('replie');

// つぶやき
Route::get('/tweet', [TweetController::class, 'tweet'])->name('tweet');
Route::post('/favorite', [TweetController::class, 'favorite'])->name('favorite');
// つぶやき投稿
Route::get('/tweet/write', [TweetController::class, 'write'])->name('write');
Route::post('/tweet/write/post', [TweetController::class, 'post'])->name('post');

// プロフィール
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::put('/profile/store', [ProfileController::class, 'store'])->name('store');

// お問い合わせ
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
// お問い合わせ確認
Route::post('/confimation', [ContactController::class, 'confimation'])->name('confimation');
// 送信処理
Route::post('/thanks', [ContactController::class, 'thanks'])->name('thanks');



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
    // return view('welcome');
// });
