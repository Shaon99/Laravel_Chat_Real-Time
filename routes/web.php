<?php

use Illuminate\Support\Facades\Route;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


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

Route::get('/', function () {
    return view('welcome');
});













// Route::get('/fmessages', 'HomeController@fetchMessages')->name('fetch.msg');
// Route::post('messages', 'HomeController@sendMessage')->name('send.msg');


Auth::routes();
Route::get('/user/home', 'HomeController@User')->name('user.home');

//adminarea
Route::middleware('Is_admin')->group(function () {
Route::get('/admin/home', 'HomeController@Admin')->name('admin.home');
Route::get('/admin/alluser', 'HomeController@Alluser')->name('admin.user');
Route::post('/admin/adduser', 'HomeController@Adduser');
Route::get('/admin/user/delete/{id}','HomeController@Delete');

Route::get('/admin/send-message', function (Request $request) {
    event(
        new MessageSent(
        $request->$message
        )
        );

        return ["success"=>true];
});


});
