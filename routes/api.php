<?php

use App\Http\Controllers\Notification_Controller;
use App\Http\Controllers\User\Ads_Controller;
use App\Http\Controllers\User\Tours_Controller;
use App\Http\Controllers\User\Tours_Reservations_Controller;
use App\Http\Controllers\User\Transport_Lines_Controller;
use App\Http\Controllers\User\Transport_Tours_Controller;
use App\Http\Controllers\User\Auth_Controller;
use App\Http\Controllers\User\Beach_Controller;
use App\Http\Controllers\User\Hotel_Controller;
use App\Http\Controllers\User\Recommendation_Controller;
use App\Http\Controllers\User\Room_Controller;
use App\Http\Controllers\User\Room_Reservations_Controller;
use App\Http\Controllers\User\Tourism_Tours_Reservations_Controller;
use App\Http\Controllers\User\Votes_Controller;
use App\Models\Recommended_Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Auth::routes([
//     'verify' => true 
// ]);
Route::get('/unregistered', [Auth_Controller::class, 'unregistered'])->name('unregistered');

//////////////////////TEST///////////////////////

Route::get('/email',[Auth_Controller::class,'hash']);
Route::get('/map',[Beach_Controller::class,'myfunction']);

//////////////////////Auth///////////////////////////

Route::post('/sign_up',[Auth_Controller::class,'sign_up']);
Route::post('/login',[Auth_Controller::class,'login']);

///////////////////////API///////////////////////////

Route::group(['middleware' => 'auth:api'],function(){
    
Route::get('/notifications',[Auth_Controller::class,'my_notifications']);
Route::get('/clear_my_notifications',[Auth_Controller::class,'clear_my_notifications']);
Route::get('/get_my_profile',[Auth_Controller::class,'get_my_profile']);
Route::post('/logout',[Auth_Controller::class,'logout']);

Route::group(['prefix' => 'note'], function(){
    Route::get('/show_recommendations',[Recommendation_Controller::class,'show_recommendations']);   
    Route::post('/save_items',[Recommendation_Controller::class,'save_items']);  
    Route::get('/clear_my_itmes',[Recommendation_Controller::class,'clear_my_items']);
    Route::post('/delete_items',[Recommendation_Controller::class,'delete_items']);
});

Route::group(['prefix' => 'beaches'], function(){
    Route::get('/',[Beach_Controller::class,'show']);
    Route::get('/{id}',[Beach_Controller::class,'all_rooms']);
    // Route::post('/filter_rooms_by_capacity/{id}',[Beach_Controller::class,'filter_rooms_by_capacity'])->middleware('auth:api');
    // Route::post('/filter_rooms_by_type/{id}',[Beach_Controller::class,'filter_rooms_by_type'])->middleware('auth:api');
    // Route::post('/filter_rooms_by_price_range/{id}',[Beach_Controller::class,'filter_rooms_by_price_range'])->middleware('auth:api');
    Route::post('/filter_rooms/{id}',[Beach_Controller::class,'filter_rooms']);
    // Route::get('/{id}/rooms',[Beach_Controller::class,'rooms']);
});


Route::group(['prefix' => 'hotels'], function(){
    Route::get('/',[Hotel_Controller::class,'show']);
    Route::get('/{id}',[Hotel_Controller::class,'all_rooms']);
    //Route::post('/filter_rooms_by_capacity/{id}',[Hotel_Controller::class,'filter_rooms_by_capacity'])->middleware('auth:api');
    //Route::post('/filter_rooms_by_type/{id}',[Hotel_Controller::class,'filter_rooms_by_type'])->middleware('auth:api');
    //Route::post('/filter_rooms_by_price_range/{id}',[Hotel_Controller::class,'filter_rooms_by_price_range'])->middleware('auth:api');
    Route::post('/filter_rooms/{id}',[Hotel_Controller::class,'filter_rooms']);
});


Route::group(['prefix' => 'room'], function(){
    Route::get('/{id}',[Room_Controller::class,'details']);
    Route::get('/{id}/calendar',[Room_Controller::class,'calendar']);
});


Route::group(['prefix' => 'room_reservation'], function(){
    Route::post('/{id}',[Room_Reservations_Controller::class,'reserve']);
    Route::get('/',[Room_Reservations_Controller::class,'my_reservations']);
    Route::post('delete/{id}',[Room_Reservations_Controller::class,'delete_reservation']);
});


Route::group(['prefix' => 'transport'], function(){
    Route::get('/my_reservations',[Tours_Reservations_Controller::class,'my_reservations']);
    Route::get('/lines',[Transport_Lines_Controller::class,'show']);
    Route::post('/lines/search',[Transport_Lines_Controller::class,'search']);
    Route::get('/line_tours/{id}',[Transport_Tours_Controller::class,'line_tours']);
    Route::post('/reserve_tour',[Tours_Reservations_Controller::class,'reserve']);
    Route::post('/delete_reservation/{id}',[Tours_Reservations_Controller::class,'delete_reservation']);
});


Route::group(['prefix' => '/tours'], function(){
    Route::get('/',[Tours_Controller::class,'all']);
    Route::get('/my_reservations',[Tourism_Tours_Reservations_Controller::class,'my_reservations']);
    Route::get('/{id}',[Tours_Controller::class,'details']);
    Route::post('/reserve_tour',[Tourism_Tours_Reservations_Controller::class,'reserve']);
    Route::post('/delete_reservation/{id}',[Tourism_Tours_Reservations_Controller::class,'delete_reservation']);
});


Route::group(['prefix' => 'votes'], function(){
    Route::get('/',[Votes_Controller::class,'all']);
    Route::get('/paths/{id}',[Votes_Controller::class,'vote_paths']);
    Route::get('/vote/{id}',[Votes_Controller::class,'vote']);
});

Route::group(['prefix' => 'ads'], function(){
    Route::get('/',[Ads_Controller::class,'all']);
});

});
