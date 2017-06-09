<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

// Authentication Routes...
$this->get('login', 'Auth\AuthController@showLoginForm');
$this->post('login', 'Auth\AuthController@login');
$this->get('logout', 'Auth\AuthController@logout');
// Registration Routes...
$this->get('register', 'Auth\AuthController@showRegistrationForm');
$this->post('register', 'Auth\AuthController@register');
// Password Reset Routes...
$this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
$this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
$this->post('password/reset', 'Auth\PasswordController@reset');

// App Routes
$this->get('report', 'ReportController@showReport');
$this->post('report', 'ReportController@postReport');
$this->get('myreports{user_id}', 'ReportController@myReports');
$this->get('pending', 'ReportController@viewPending');
$this->post('receive', 'ReportController@receive');
$this->get('all', 'ReportController@allReports');
$this->get('close', 'ReportController@viewClosing');
$this->post('close', 'ReportController@close');
$this->get('closed', 'ReportController@viewClosed');
$this->get('users', 'ReportController@viewUsers');
$this->post('roles', 'ReportController@makeAdmin');
$this->get('admins', 'ReportController@viewAdmins');
