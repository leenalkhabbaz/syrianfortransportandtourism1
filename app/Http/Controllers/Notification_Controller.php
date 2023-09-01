<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Notification_Controller extends Controller
{

    public static function send_notification($title,$body,$user)
    {
        Notification::create([
            'title'=>$title,
            'body'=>$body,
            'user_id'=>$user->id
        ]);
        
        $response = Http::withOptions(['verify' => false])->withHeaders([
            "Content-Type" => "application/json",
            "Authorization" => "key=AAAAf8Q0BDE:APA91bGf8alSlD-Uc0WJNQ_h3H9MpEMfTRXyApR0SzrjT9qSvklrvO1N90z5vyZkb8xktMT9vIcpeyGO0v8wGpDjdBNMYIwTNKzAIfKl38vWh57uR4GL8tENOE5ZX1_06bDlh0jrG_zW"//server key
        ])->post('https://fcm.googleapis.com/fcm/send',[
            "to" => $user->fcm_token ,
            "notification" =>
            [
                "title" => $title ,
                "body" => $body ,
                "sound" => "Tri-tone"
            ],
            "priority" => "high",
            "contentAvailable" => true,
        ]);

        return $response->body() ;
    }

    public static function send_notification_to_all($title,$body)
    {
        $tokens = User::all()->pluck('fcm_token') ;
        $response = Http::withOptions(['verify' => false])->withHeaders([
            "Content-Type" => "application/json",
            "Authorization" => "key=AAAAf8Q0BDE:APA91bGf8alSlD-Uc0WJNQ_h3H9MpEMfTRXyApR0SzrjT9qSvklrvO1N90z5vyZkb8xktMT9vIcpeyGO0v8wGpDjdBNMYIwTNKzAIfKl38vWh57uR4GL8tENOE5ZX1_06bDlh0jrG_zW"//server key
        ])->post('https://fcm.googleapis.com/fcm/send',[
            "registration_ids" => $tokens,
            "notification" =>
            [
                "title" => $title ,
                "body" => $body ,
                "sound" => "Tri-tone"
            ],
            "priority" => "high",
            "contentAvailable" => true,
        ]);

        return $response->body() ;
    }
}
