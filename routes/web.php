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

Route::view('test', 'pages.home');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/budget', 'BudgetController@index')->name('budget.index');
Route::get('/budget/create', 'BudgetController@create')->name('budget.create');
Route::get('/budget/{id}/edit', 'BudgetController@edit')->name('budget.edit');
Route::post('/budget/{id}/update', 'BudgetController@update')->name('budget.update');
Route::post('/budget/store', 'BudgetController@store')->name('budget.store');
Route::get('/budget/{id}/destroy', 'BudgetController@destroy')->name('budget.destroy');
Route::get('/budget/{id}', 'BudgetController@show')->name('budget.show');

Route::get('/category/{id}', 'CategoryController@show')->name('category.show');
Route::get('/budget/{id}/category/create', 'CategoryController@create')->name('category.create');
Route::post('/category/store', 'CategoryController@store')->name('category.store');
Route::get('/category/{id}/edit', 'CategoryController@edit')->name('category.edit');
Route::post('/category/{id}/update', 'CategoryController@update')->name('category.update');
Route::post('/category/{id}', 'CategoryController@destroy')->name('category.destroy');
Route::post('/category/copy', 'CategoryController@copy')->name('category.copy');

Route::get('/category/{id}/expense/create', 'ExpenseController@create')->name('expense.create');
Route::post('/expense/store', 'ExpenseController@store')->name('expense.store');
Route::get('/expense/{id}/edit', 'ExpenseController@edit')->name('expense.edit');
Route::post('/expense/{id}/update', 'ExpenseController@update')->name('expense.update');
Route::post('/expense/{id}', 'ExpenseController@destroy')->name('expense.destroy');




Route::get('api/budget/all', 'Api\BudgetController@all');
Route::post('api/budget/create', 'Api\BudgetController@create');
Route::get('api/budget/{id}', 'Api\BudgetController@show');
