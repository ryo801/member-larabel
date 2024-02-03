<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\memberController;

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


Route::get('/members', [App\Http\Controllers\MemberController::class, 'index'])->name('members');
//コントローラのstoreメソッドの処理が行われる
Route::post('/member', [App\Http\Controllers\MemberController::class, 'store'])->name('member');
Route::delete('/member/{member}',[App\Http\Controllers\MemberController::class, 'delete'])->name('/member/{member}');