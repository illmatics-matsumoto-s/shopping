<?php

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

/**
 * フロントサイド
 */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * 管理サイド
 */
Route::prefix('admin')->namespace('Admin')->as('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login')->name('login');
    });
    Route::middleware('auth:admin')->group(function () {
        Route::post('logout', 'LoginController@logout')->name('logout');
        Route::get('home', 'HomeController@index')->name('home');

        // 管理者管理
        Route::prefix('admin_users')->as('users.')->group(function () {
            Route::get('/', 'AdminUsersController@index')->name('search');
        });
    });
});

/**
 * リダイレクト
 */
Route::redirect('/', '/home');
Route::redirect('/admin', '/admin/home');
