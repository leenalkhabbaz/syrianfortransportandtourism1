<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Notification_Controller;
use App\Mail\LoginEmail;
use App\Mail\verifyMail;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;

class Auth_Controller extends Controller
{
    public function sign_up(Request $request)
    {

        $input['name'] = $request->name;
        $input['email'] = $request->email;
        $input['password'] = $request->password;
        $input['confirm_password'] = $request->confirm_password;
        $input['fcm_token'] = $request->fcm_token;

        $rules = [
            'name' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'confirm_password' => ['required', Rule::in($input['password'])],
            'fcm_token' => ['required', 'string'],
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json([
                'msg' => $validator->errors()->all()[0]
            ], 401);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'fcm_token' => $request->fcm_token
        ]);

        Mail::to($request->email)->send(new LoginEmail($request->email));

        return response()->json([
            'msg' => "User is created successfully :) , please verify your email and login",
        ], 433);
    }

    public function verify_email(Request $request)
    {
        $users = User::all();
        $verified = false;
        foreach ($users as $user) {
            if (Hash::check($user->email, $request->get('oc'))) {
                $user->verified = 1;
                $user->save();
                $verified = true;
                break;
            }
        }
        if ($verified == true)
            return view('verified');
        else {
            return view('error');
        }
    }

    public function login(Request $request)
    {

        $input['email'] = $request->email;
        $input['password'] = $request->password;
        $input['fcm_token'] = $request->fcm_token;

        $rules = [
            'email' => ['required', 'email', 'exists:users'],
            'password' => ['required', 'string'],
            'fcm_token' => ['required', 'string'],
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json([
                'msg' => $validator->errors()->all()[0]
            ], 401);
        }

        $info = request(['email', 'password']);
        if (!Auth::attempt($info)) {
            $user = User::where('email',$request->email)->first() ;
            if($user)
            {
                if($user->loginAttempts >= 4 && $user->verified == 1 )
                {
                    $user->verified = 0 ;
                    $user->save();
                    Mail::to($request->email)->send(new LoginEmail($request->email));
                    return response()->json([
                        'msg' => "Too many login attempts . We sent an email to you , please reactivate your account"
                    ], 403);
                }
                else if($user->loginAttempts >= 4 && $user->verified == 0)
                {
                    return response()->json([
                        'msg' => "Too many login attempts . We sent an email to you , please reactivate your account"
                    ], 403);
                }
                else
                {
                    $user->loginAttempts++ ;
                    $user->save() ;
                }
            }
            return response()->json([
                'msg' => "Email or password is wrong"
            ], 401);
        }

        $user = $request->user();
        $user_ = User::find($user->id);

        if ($user_->verified == 0) {
            return response()->json([
                'msg' => "please verify your email first",
            ], 433);
        }

        $user_->loginAttempts = 0 ;
        $user_->save();

        if ($request->fcm_token != $user_->fcm_token) {
            Notification_Controller::send_notification("تنبيه", "تم تسجيل الدخول إلى حسابك من جهاز اّخر", $user_);
            $user_->fcm_token = $request->fcm_token;
            $user_->save();
        }

        $token = $user->createToken('My App');

        return response()->json([
            'msg' => "Successful login :)",
            'token' => "Bearer $token->accessToken"
        ], 200);
    }

    public function logout(Request $request)
    {

        $request->user()->token()->revoke();

        return response()->json([
            'msg' => "Successful logout :)",
        ], 200);
    }

    public function my_notifications()
    {

        $user = User::find(auth()->user()->id);
        $notifications = Notification::select('title', 'body', 'opened', 'created_at', 'updated_at')->where('user_id', $user->id); //$user->notifications ;
        $notifications_before_open = new Collection($notifications->get());
        $notifications->update(['opened' => 1]);
        return response()->json([
            'notifications' => $notifications_before_open,
        ], 200);
    }

    public function clear_my_notifications()
    {
        $user = User::find(auth()->user()->id);
        Notification::where('user_id', $user->id)->delete();

        return response()->json([
            'msg' => "Deleted successfully",
        ], 200);
    }

    public function get_my_profile()
    {
        $user = User::find(auth()->user()->id);
        $profile['id'] = $user->id;
        $profile['name'] = $user->name;
        $profile['email'] = $user->email;
        return response()->json([
            'profile' => $profile,
        ], 200);
    }

    public function unregistered()
    {
        return response()->json([
            'msg' => "please login first",
        ], 411);
    }
}
