<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


Route::get('users', function()
{
    $users = User::all();

    return View::make('users1')->with('users', $users);
});

Route::get('taxis',function()
{
	$taxis = Taxi::all();

	return View::make('taxis')->with('taxis', $taxis);
});

// route to show the login form
Route::get('login', array('uses' => 'HomeController@showLogin'));

// route to process the form
Route::post('login', array('uses' => 'HomeController@doLogin'));