<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function(){
    // user
    Route::get('user/cast','API\HexagramController@castHex');
    Route::get('user/subscribe','API\HexagramController@subscribe');
    Route::get('user/trigram','API\TrigramController@castTrigram');
    Route::post('user/transform/name','API\HexagramController@transformName');

    // admin/user
    Route::get('admin/user','API\ADMIN\UserController@index');
    Route::post('admin/store','API\ADMIN\UserController@store');
    Route::get('admin/show/{id}','API\ADMIN\UserController@show');
    Route::put('admin/update/{id}','API\ADMIN\UserController@update');
    Route::get('admin/delete/{id}','API\ADMIN\UserController@destroy');
    Route::get('admin/role','API\ADMIN\UserController@role');

    Route::post('admin/user/type','API\ADMIN\UserController@userType');


    // admin/hexagram
    Route::prefix('hexagram')->group(function(){
        Route::get('/{id}','API\HexagramYaoController@hexagram');
        Route::get('/gua/{gua}','API\HexagramYaoController@transformGua');
        Route::post('/yao','API\HexagramYaoController@hexYao');
        Route::get('/{id}/{yao}','API\HexagramYaoController@show');
    });

    Route::get('hex/index','API\HexagramController@index');
    Route::get('hex/show/{id}','API\HexagramController@show');
    Route::put('hex/update/{id}','API\HexagramController@update');
    

    // admin/trigram
    Route::get('tri/index','API\TrigramController@index');
    Route::get('tri/show/{id}','API\TrigramController@show');
    Route::put('tri/update/{id}','API\TrigramController@update');

    // admin/nature
    Route::get('nature/index','API\NatureController@index');
    Route::get('properties/property','API\NatureController@property');

    // Users
    Route::get('user/profile','API\UserController@index');
    Route::put('user/profile/update/{id}','API\UserController@update');
    Route::post('user/profile/changePassword','API\UserController@changePassword');
    Route::get('user/consultant','API\UserController@consultant');

    Route::post('user/bookNow','API\UserController@bookNow');
    
    Route::post('user/check','API\UserController@check');
    Route::get('user/schedule','API\UserController@schedule');
    Route::get('user/attribute','API\UserController@attribute');
    Route::get('user/payment','API\UserController@payment');
    Route::get('user/cancelBooking','API\UserController@cancelBooking');
    Route::get('user/cancelDelete/{id}','API\UserController@destroy');

    Route::get('user/change-status/{id}','API\UserController@userChangeStatus');

    Route::get('consultant/journal/{id}/{schedule_id}','API\JournalController@customerJournal');
    Route::get('consultant-user-diary','API\JournalController@user_consultant_diary');
    // Journal
    Route::resources([
        'journal' => 'API\JournalController',
        'announcement' => 'API\AnnouncementController'
    ]);

    // System Controller
    Route::put('update/{id}','API\SystemController@update');
    Route::get('about/management','API\SystemController@aboutUs');
    Route::post('footer/management','API\SystemController@footer');
    Route::get('footerContent','API\SystemController@footerContent');


    // Oracle
    Route::post('oracle/number','API\Oracle\NumberController@numberOracle');
    Route::post('oracle/text','API\Oracle\TextController@textOracle');

    //Diary Oracle
    Route::group(['prefix' => 'oracle'],function(){
        Route::post('/store','API\Diary\OracleDiaryController@store');
        Route::get('/show','API\Diary\OracleDiaryController@show');
        Route::get('/showText','API\Diary\OracleDiaryController@showText');

        Route::post('/store-oracle-text','API\Diary\OracleDiaryController@storeTextOracle');
    });
});

Route::get('hexagram/list','API\HexagramController@getAll');

Route::get('about','API\SystemController@aboutUs');
Route::get('footer','API\SystemController@footerContent');
Route::post('user/registration','API\RegistrationController@store');


// Route::get('hex/index','API\HexagramController@index');

Route::post('user/hexagram','API\HexagramController@dailyHex');
Route::get('hexagram','API\HexagramController@catchHex');


