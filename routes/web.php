<?php
use Illuminate\Support\Facades\Route;
//一覧表示　ArticleController.php に処理を飛ばす処理
Route::get('/list', [App\Http\Controllers\ArticleController::class, 'showList'])->name('list');
//投稿画面用表示
Route::get('/regist',[App\Http\Controllers\ArticleController::class, 'showRegistForm'])->name('regist');
//投稿機能作成
Route::post('/regist',[App\Http\Controllers\ArticleController::class, 'registSubmit'])->name('submit');
//画像の登録・保存
use App\Http\Controllers\ArticleController;
Route::POST('/regist', [ArticleController::class, 'regist'])->name('regist')
?>