<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//会員一覧画面用のルート
Route::get('/members', [MemberController::class, 'index'])->name('members');

//コントローラのstoreメソッドの処理が行われる
Route::post('/member/delete/{member}',[MemberController::class, 'delete']);

//会員登録画面用のルート
Route::get('/members/create', [MemberController::class, 'create']);
//Route::post('/members/create', [MemberController::class, 'store']);
Route::post('/members/store',[MemberController::class, 'store']);

//会員編集画面用のルート・URLに直接打ち込む移動の記述は「get」になる
Route::get('/member/edit/{id}',[MemberController::class, 'edit']);
Route::post('/member/update/{id}', [MemberController::class, 'update']);