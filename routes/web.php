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
use Illuminate\Support\Facades\Hash;

Route::get('/',function (){
    return view('welcome');
});

Auth::routes();


Route::get('/login',function (){
    return view('pages.admin.login');
})->name('login')->middleware('login');

Route::group([
    'prefix'     => 'dashboard',
    'middleware' => [
        'auth',
        'disablepreventback'
    ],
], function() {

    Route::get('/', 'admin\DashboardController@index')->name('dashboard_profile');
    Route::get('/users', 'admin\UsersController@index')->name('users');
    Route::get('/user/add', 'admin\UsersController@create')->name('get_create_user');
    Route::post('/user/add', 'admin\UsersController@store')->name('create_user');
    Route::get('/user/update/{id}', 'admin\UsersController@edit')->name('edit_user');
    Route::put('/user/update/{id}' ,'admin\UsersController@update')->name('update_user');
    Route::get('/user/status/{id}/{status}', 'admin\UsersController@status')->name('status_user');
    Route::get('/self-users/{id}', 'admin\UsersController@self_users')->name('self_users');

});


Route::get('/users', 'admin\UsersController@searchTest');



//Route::get('/home', 'admin\HomeController@index')->name('home');

//Route::get('/password_create', function (){
//      echo Hash::make('salam');
//});
