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
    return view('layouts/master');
});

Auth::routes();

Route::group(['middleware' => ['auth']],function(){
    // Admin middleware
    Route::group(['middleware' => ['auth' => 'admin']], function(){
        Route::prefix('/hexagram')->group(function(){
            Route::get('/', 'HexagramController@hexagram');
            Route::get('/{id}', 'HexagramController@hexagramInfo');
            Route::get('/{id}/{yao}', 'HexagramController@hexagramYao');
        });
        Route::get('/trigram', function(){
            return view('tri/index');
        });

        Route::get('/announcement', function(){
            return view('announcement');
        });

        Route::get('user/users',function(){
            return view('user-management/user/index');
        });
    });
    // admin


Route::get('/home', 'HomeController@index')->name('home');


Route::get('/profile' , function(){
    if(Gate::denies('manage-users')){
        return view('user-profile');
    };   
    return view('profile');
});

Route::get('/book', function(){
    return view('book');
});


Route::get('/hex', function(){
    return view('hex/hexagram');
});

Route::get('/tri', function(){
    return view('tri/trigram');
});
    // User Subscriber middleware
    Route::group(['middleware' => ['auth' => 'subscribe']], function(){
        Route::get('/diaries', function(){
            return view('diary');
        });

        Route::get('/oracle/number', function(){
            return view('oracle.index-number');
        });
        
        Route::get('/oracle/text', function(){
            return view('oracle.index-text');
        });
    });
    // subscriber

Route::get('/consult/user/{id}/{schedule_id}', 'ConsultantController@consultUser');


Route::get('/schedule', function(){
    return view('schedule');
});

Route::get('/scheduleConsultant', function(){
    return view('scheduleConsultant');
});

Route::get('/aboutUs', function(){
    return view('about');
});


Route::get('/dailyHex', 'DailyHexHistoryController@index');

Route::get('/hex/{id}', 'ConsultantController@hex');

Route::get('/consultan/{id}','ConsultantController@consultants');

});

Route::get('email/verify/{id}','EmailVerificationController@verify');

Route::get('privacy',function(){
    return view('privacy');
});

Route::get('copyright',function(){
    return view('copyright');
});
// Commands

Route::get('/db-seed', function() {
    $output = [];
    \Artisan::call('db:seed', $output);
    dd($output);
});

Route::get('/schedule-run', function() {
    $output = [];
    \Artisan::call('schedule:run', $output);
    dd($output);
});

Route::get('/upload-hex', function() {
    $output = [];
    \Artisan::call('upload:hex', $output);
    dd($output);
});

Route::get('/migrate-fresh', function() {
    $output = [];
    \Artisan::call('migrate:fresh', $output);
    dd($output);
});

Route::get('/migrate', function() {
    $output = [];
    \Artisan::call('migrate', $output);
    dd($output);
});

Route::get('/config-clear', function() {
    $output = [];
    \Artisan::call('config:clear', $output);
    dd($output);
});

Route::get('/cache-clear', function() {
    $output = [];
    \Artisan::call('cache:clear', $output);
    dd($output);
});

Route::get('/queue-work', function() {
    $output = [];
    \Artisan::call('queue:work', $output);
    dd($output);
});

Route::get('/storage-link', function() {
    $output = [];
    \Artisan::call('storage:link', $output);
    dd($output);
});

Route::get('sample', function(){
    return view('sample');
});








