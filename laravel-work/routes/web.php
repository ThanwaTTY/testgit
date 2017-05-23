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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return "hello Laravel 5.4";
});

Route::get('form', 'Auth\LoginController@form');

//Require Parameters
Route::get('blog/{id}', function($id) {
    return "Welcome to Blog ID : ". $id;
});

//Optional Parameters
Route::get('profile/{id?}', function($id=null) {
    return "Welcome to Profile ID : ". $id;
});

//Regular Exprassion กรอกตัวเลชได้แค่ 1 ตัว
Route::get('Book/{id}', function($id) {
    return "Welcome to Book ID : ". $id;
})->where('id', '[0-9]+');

//Regular Exprassion กรอกตัวอักษรได้แค่ 1 ตัว
Route::get('Book/{name}', function($name) {
    return "Welcome to Book ID : ". $name;
})->where('name', '[A-Za-z]+');


Route::match(['get','post'], 'bill', function() {
    if(Request::isMethod('get')){
        return 'This is get method';
    }
    if(Request::isMethod('post')){
        return 'This is post method';
    }
});
