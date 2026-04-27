<?php

// Login routes
Route::get('/', 'LoginController@index');
Route::post('/login', 'LoginController@auth');
Route::get('/logout', 'LoginController@logout');

//Home routes
Route::get('/home', 'HomeController@index');

// Unit routes
Route::get('/unit', 'UnitController@index');
Route::get('/unit/register', 'UnitController@create');
Route::post('/unit/register', 'UnitController@save');
Route::get('/unit/delete/{id}', 'UnitController@delete');
Route::get('/unit/edit/{id}', 'UnitController@edit');
Route::post('/unit/edit', 'UnitController@update');
Route::post('/unit/search', 'UnitController@search');

// Patients routes
Route::get('/patient', 'PatientController@index');
Route::get('/patient/register', 'PatientController@create');
Route::post('/patient/register', 'PatientController@save');
Route::get('/patient/delete/{id}', 'PatientController@delete');
Route::get('/patient/edit/{id}', 'PatientController@edit');
Route::post('/patient/edit', 'PatientController@update');
Route::post('/patient/search', 'PatientController@search');

// User routes
Route::get('/user', 'UserController@index');
Route::get('/user/register', 'UserController@create');
Route::post('/user/register', 'UserController@save');
Route::get('/user/delete/{id}', 'UserController@delete');
Route::get('/user/edit/{id}', 'UserController@edit');
Route::post('/user/edit', 'UserController@update');
Route::get('/user/redefinirsenha/{id}', 'UserController@redefinirsenha');

// Password routes
Route::get('/password/{id}', 'PassController@index');
Route::post('/password/edit', 'PassController@update');

Route::get('laravel-version', function() {
    $laravel = app();
    return "Your Laravel version is ".$laravel::VERSION;
});
