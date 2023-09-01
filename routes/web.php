<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Dashboard\createUser;
use App\Http\Controllers\Dashboard\Beaches;
use App\Http\Controllers\Dashboard\BookBeachController;
use App\Http\Controllers\Dashboard\ChartJSController;
use App\Http\Controllers\Dashboard\ReportBeachController;
use App\Http\Controllers\Dashboard\HotelController;
use App\Http\Controllers\Dashboard\Rooms;
use App\Http\Controllers\Dashboard\TransportController;
use App\Http\Controllers\Dashboard\TripController;
use App\Http\Controllers\Dashboard\HotelCount;
use App\Http\Controllers\Notification_Controller;
use App\Http\Controllers\Secondry_Dashboard\Home_Controller;
use App\Http\Controllers\User\Auth_Controller;
use App\ImageClass\images;
use App\Models\Transport_line;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Mailer\Transport;
use App\Http\Controllers\AdminController;

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

Route::get('/notification', function () {
    return Notification_Controller::send_notification("Test","Hi Riham","dEs4lzLLjErhB8g5wS_dHM:APA91bF7p6l_UIy67ZJxrAAoZdniPdcOQGn_bd8POJuJfJHLjazimSYlAzr4AsRaQQZZSBZVxoO8-v2D4SigT1k9rJxB0-W7gwTW1r4elZC66DmhmXi9WLJ-sfeqzLFpB2T9321pV6zp");

});

Route::get('/verify_email', [Auth_Controller::class, 'verify_email']);

Route::group(['prefix' => '/secondry_dashboard'], function(){

    Route::get('/login2', [Home_Controller::class, 'login2'])->name('login2');
    Route::post('/submit_login', [Home_Controller::class, 'login'])->name('submit_login');
    Route::get('/', [Home_Controller::class, 'home'])->name('home_');
    Route::get('/reservations', [Home_Controller::class, 'reservations'])->name('reservations');
    Route::get('/room_reservations/{id}', [Home_Controller::class, 'room_reservations'])->name('room_reservations');

});

Route::get('/', function () {


});
Route::get('/logout', [createUser::class, 'logout']);
Route::post('/totorole', [createUser::class, 'createrole']);
Route::get('/totoper', [createUser::class, 'createper']);
Route::get('/to',[createUser::class, 'toto']);
Route::get('/showaddrole', [createUser::class, 'showaddrole']);
Route::post('createroleemployee', [createUser::class, 'createroleemployee']);

//map
Route::get('/map', [Beaches::class, 'map']);
//beachs
Route::get('/show_add_beach', [Beaches::class, 'ShowBeach']);
Route::post('createBeach', [Beaches::class,'createBeach']);
Route::get('/ShowAllBeach', [Beaches::class, 'ShowAllBeach']);
Route::get('/ShowSpecificBeach', [Beaches::class, 'ShowSpecificBeach']);
Route::get('/showview/{id}', [Beaches::class, 'showcreateroom']);
Route::post('createRoom/{id}', [Beaches::class,'createRoom']);
Route::get('showaddroom/{id}', [Beaches::class,'showaddroom']);
Route::get('/calander/{id}', [Rooms::class, 'Show_reservation']);
Route ::delete('/room/{roomID}/Delete',[Rooms :: class ,'DeleteRoom']);//DeleteRoom room
Route::get('showeditroom/{id}', [Beaches::class, 'showeditroom']);//تعديل معلومات شاطئ
Route::post('editBeach/{id}', [Beaches::class, 'editBeach']);
Route::get('showeditroomm/{id}', [Rooms::class, 'showeditroomm']);//تعديل معلومات غرفة
Route::post('editRoom/{id}', [Rooms::class, 'editRoom']);
Route::get('/deleteroom/{id}', [Rooms::class, 'deleteroom']);//حذف غرفة
Route::get('/available/{id}', [Rooms::class, 'available']);// اتاحة الغرفة
Route::get('/notavailable/{id}', [Rooms::class, 'notavailable']);//عدم اتاحة الغرفة للمستخدم


//hotel
Route::get('/show_form_hotel', [HotelController::class, 'show_form_hotel']);
Route::post('createHotel', [HotelController::class,'createHotel']);
Route::get('/ShowAllHotel', [HotelController::class, 'ShowAllHotel']);
Route::get('/ShowInfoHotel/{id}', [HotelController::class, 'ShowInfoHotel']);
Route::get('/ShowSpecificHotel', [HotelController::class, 'ShowSpecificHotel']);
Route::get('ShowAddRoomHotel/{id}', [HotelController::class,'ShowAddRoomHotel']);
Route::post('createRoomHotel/{id}', [HotelController::class,'createRoomHotel']);
Route::get('showedithotel/{id}', [HotelController::class, 'showedithotel']);
Route::post('editHotel/{id}', [HotelController::class, 'editHotel']);


// employeeee
Route::get('/ShowInfoBeachEmp/{id}', [Beaches::class, 'ShowInfoBeachEmp']);
Route::get('/ShowBeachBook/{id}', [BookBeachController::class, 'show_book_beach']);
Route::get('/reservationRoomdelete/{id}', [BookBeachController::class, 'fail_book']);
Route::get('/reservationacceptedRoom/{id}',[BookBeachController :: class ,'accept_book']);
Route::get('/searchBeach', [BookBeachController::class, 'searchBeach']);
Route::get('/showallbook', [BookBeachController::class, 'showallbook']);
Route::post('create_book/{id}', [BookBeachController::class, 'create_book']);
Route::get('/AddBook/{id}', [BookBeachController::class, 'ShowCreateBook']);


// hotel
Route::get('/ShowInfoHotelEmp/{id}', [HotelController::class, 'ShowInfoHotelEmp']);
Route::get('/ShowHotelBook/{id}', [HotelController::class, 'show_book_hotel']);
Route::get('/showallbookHotel', [HotelController::class, 'showallbookHotel']);
Route::get('/searchHotel', [HotelController::class, 'searchHotel']);
Route::get('/AddBookHotel/{id}', [HotelController::class, 'ShowCreateBookH']);
Route::post('create_book_hotel/{id}', [HotelController::class, 'create_book_hotel']);



//transport

Route::get('/show_info_Transtrip/{id}', [TransportController::class, 'show_info_Transtrip']);
Route::post('line/{id}', [TransportController::class,'create_book']);
Route::get('/showaddbookline/{id}', [TransportController::class, 'showaddbookline']);
Route::get('/show_form_trans_trip/{id}', [TransportController::class, 'show_form_trans_trip']);
Route::post('create_transtrip/{id}', [TransportController::class, 'createTransTrip']);
Route::get('/show_form_edit_trans_trip/{id}', [TransportController::class, 'show_form_edit_trans_trip']);
Route::post('editTransTrip/{id}', [TransportController::class, 'editTransTrip']);
Route::get('delete_trans_trip/{id}', [TransportController::class, 'delete_trans_trip']);
Route::get('/show_reservation_tour/{id}', [TransportController::class, 'show_reservation_tour']);
Route::get('/search', [TransportController::class, 'searchTripTrans']);
Route::get('/reservationdelete/{id}', [TransportController::class, 'fail_book']);
Route::get('/reservationaccepted/{id}',[TransportController :: class ,'accept_book']);
Route::get('/street',function(){
    $lines=Transport_line::all();
   return view('showstreet',['lines'=>$lines]);
});

Route::post('createline',function(Request $request){
    $line=new Transport_line();
    $line->start=$request->input('start');;
    $line->end=$request->input('end');;
    $line->save();
    $uni='lines';
    $idd=$line->id;
    images::uplodimage($request,$idd,$uni);

    return back()->withInput();

 });



//trip
Route::post('createTrip', [TripController::class,'createTripe']);
Route::get('/show_form_trip', [TripController::class, 'show_form_trip']);
Route::get('/show_trip', [TripController::class, 'show_trips']);
Route::get('/show_info_trip/{id}', [TripController::class, 'show_info_trip']);
Route::post('create_BookTrip/{id}', [TripController::class,'create_BookTrip']);
Route::get('/search', [TripController::class, 'searchTrip']);
Route::get('delete_trip/{id}', [TripController::class,'delete_trip']);
Route::get('/show_EditTrip/{id}', [TripController::class, 'show_EditTrip']);
Route::post('editTrip/{id}', [TripController::class, 'editTrip']);
Route::get('/showtrip', [TripController::class, 'show_trip']);
//vote
Route::get('/show_form_vote', [TripController::class, 'show_form_vote']);
Route::post('createpath',[TripController::class, 'CreateVote']);
Route::get('/ShowVotes',[TripController::class, 'ShowVotes']);
Route::get('/delete_vote/{id}',[TripController::class, 'DeleteVote']);
Route::get('chart-js/{id}', [ChartJSController ::class, 'index']);
Route::get('/show_form_Updatevote/{id}', [TripController::class, 'show_form_Updatevote']);
Route::post('UpdateVote/{id}',[TripController::class, 'UpdateVote']);


//Ads
Route::get('/show_form_Ads', [TripController::class, 'show_form_Ads']);
Route::post('CreateAds', [TripController::class,'CreateAds']);
Route::get('/ShowAllADS', [TripController::class, 'ShowAllADS']);
Route::get('/show_info_Ad/{id}', [TripController::class, 'show_info_Ad']);
Route::get('delete_Ad/{id}', [TripController::class,'delete_Ad']);
Route::get('/show_EditAd/{id}', [TripController::class, 'show_EditAd']);
Route::post('EditAds/{id}', [TripController::class, 'EditAds']);


//
Route::get('hotelcount', [HotelCount::class, 'index']);
Route::get('chart-js', [ReportBeachController ::class, 'index']);

Route::get('room-js', [ReportBeachController ::class, 'countroom']);


Route::group(['middleware'=>['auth','role:superadministrator,create']],function(){



    }
);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/save-token', [App\Http\Controllers\HomeController::class, 'saveToken'])->name('save-token');
Route::post('/send-notification', [App\Http\Controllers\HomeController::class, 'sendNotification'])->name('send.notification');



Route::post('approveitem', [createUser::class, 'approveitem']);
Route::post('createAccount', [createUser::class, 'createaccount']);
Route::get('/showEmployee',[AdminController::class,'showEmployee']);
Route::get('/delete_employee/{id}',[AdminController::class,'delete_employee']);
Route::get('/edit_employee/{id}',[AdminController::class,'edit_employee']);
Route::post('/editEmployee/{id}',[AdminController::class,'editEmployee']);
