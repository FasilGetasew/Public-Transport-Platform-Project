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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout','Auth\LoginController@userlogout')->name('user.logout');

Route::prefix('/organization')->group(function(){
    Route::get('/login', 'Auth\OrganizationLoginController@showLoginform')->name('organization.login');
    Route::post('/login', 'Auth\OrganizationLoginController@login')->name('organization.login.submit');
    Route::get('/logout','Auth\OrganizationLoginController@logout')->name('organization.logout');
    Route::post('/logout','Auth\OrganizationLoginController@logout')->name('organization.logout');
    Route::get('/', 'OrganizationController@index')->name('organization.dashboard');
    Route::get('/registeremployee', function (){
        return view('organization.Employee.registeremployee');
    })->name('organization.registeremployee');
    Route::get('/manageemployee', function (){
        return view('organization.Employee.manageemployee');
    })->name('organization.manageemployee');
    Route::get('/buses', function (){
        return view('organization.Bus.buses');
    })->name('organization.buses');
    Route::get('/managebuses', function (){
        return view('organization.Bus.managebuses');
    })->name('organization.managebuses');
    Route::get('/schedule', function (){
        return view('organization.Schedule.schedule');
    })->name('organization.schedule');
    Route::get('/postschedule', function (){
        return view('organization.Schedule.postschedule');
    })->name('organization.postschedule');
    Route::get('/bookedtickets', function (){
        return view('organization.Ticket.bookedtickets');
    })->name('organization.bookedtickets');
    Route::get('/ticketverification', function (){
        return view('organization.Ticket.ticketverification');
    })->name('organization.ticketverification');
    Route::get('/data', function (){
        return view('organization.Data.organizationdata');
    })->name('organization.data');
    Route::get('/transportdata', function (){
        return view('organization.Data.transportdata');
    })->name('organization.transportdata');
    Route::get('/feedback', function (){
        return view('organization.Data.transportdata');
    })->name('organization.feedback');
    Route::get('/contact', function (){
        return view('organization.Data.transportdata');
    })->name('organization.contact');
});
Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginform')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
    Route::post('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

});

