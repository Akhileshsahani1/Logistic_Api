<?php
 use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')->group(function() {

      Route::get('/login','LoginController@login')->name('admin.login');
      Route::post('/login','LoginController@authenticate')->name('admin.postlogin');
    // Route::get('/', 'AdminController@index');
});

Route::group(['prefix'=>'admin','middleware'=>['auth', 'isAdmin']],function(){
       Route::get('/','DashboardController@index')->name('dashboard');
       Route::get('/list','DashboardController@list');
    });