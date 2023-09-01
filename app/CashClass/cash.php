<?php
namespace App\CashClass;
use App\Models\Beach;
use App\Models\Hotel;
use Illuminate\Support\Facades\Cache;
class cash
{
     public static function cash()

    {
        Cache::forget('key_1');
        $beaches=Beach::all();
        Cache::forever('key_1', $beaches);

    }
    public static function showfromcash()

    {
        $data = Cache::get('key_1');
        return    $data;
    }
    public static function cash_hotel()

    {
        Cache::forget('key_2');
        $hotels=Hotel::all();
        Cache::forever('key_2', $hotels);

    }
    public static function showhotelfromcash()

    {
        $data = Cache::get('key_2');
        return    $data;
    }


}