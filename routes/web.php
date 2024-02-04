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
Route::post('/member', [MemberController::class, 'store'])->name('member');
Route::delete('/member/{member}',[MemberController::class, 'delete'])->name('/member/{member}');

//会員登録画面用のルート
Route::get('/members/create', [MemberController::class, 'create'])->name('members.create');
Route::post('/members/store',[MemberController::class, 'store'])->name('/member/store');


