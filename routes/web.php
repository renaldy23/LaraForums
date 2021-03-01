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

Route::get('/', function () {
    return view('welcome');
});
Route::get("/home", "HomeController@index");

Route::get("/category", "CategoryController@index");
Route::get("/category/create", "CategoryController@create");
Route::post("/category/store", "CategoryController@store");
Route::delete("/category/delete/{id}", "CategoryController@destroy");

Route::get("/question/create", "QuestionController@create");
Route::post("/question/store", "QuestionController@store");
Route::get("/question/{id}", "QuestionController@show");
Route::get("/question/edit/{id}", "QuestionController@edit");
Route::put("/question/update/{id}", "QuestionController@update");
Route::delete('/question/delete/{id}', "QuestionController@destroy");

Route::post("/comment/create/{id}", "CommentController@store");
Route::delete("/comment/delete/{id}", "CommentController@destroy");

Route::get("/profile", "ProfileController@index");
Route::get("/profile/active", "ProfileController@active");
Route::get("/profile/questions", "ProfileController@question");
Route::post("/profile/email", "ProfileController@email");
Route::put("/profile/newmail", "ProfileController@newmail");
Route::post("/profile/name", "ProfileController@name");
Route::put("/profile/newname", "ProfileController@newname");

Auth::routes();
