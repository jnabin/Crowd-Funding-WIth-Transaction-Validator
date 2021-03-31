<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Login;
use Session;
class loginController extends Controller
{


    // Google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Google callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $this->_registerOrLoginUser($user);

        // Return home after login
        return redirect()->route('donate.index');
    }

    // Facebook login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // Facebook callback
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $this->_registerOrLoginUser($user);

        // Return home after login
        return redirect()->route('donate.index');
    }

    public function index(){
    	return view('login.index');
    }

    public function verify(LoginRequest $req){

         $user = DB::table('users')
                    ->where('username', $req->username)
                    ->where('password', $req->password)
                    ->where('status', '1')
                    ->first();
        
    	if((!empty($user)) > 0){
            if($user->utype == 2){
            Session::put('username', $user->username);
            Session::put('userid', $user->id);
            Session::put('type', 2);
            return redirect()->route('home.index');}elseif($user->utype == 3){
            Session::put('username', $user->username);
            Session::put('userid', $user->id);
            Session::put('type', 3);
            return redirect()->route('donate.index');
            }
    	}else{
    		Session::flash('msg', 'invalid username/password');
    		return redirect('/login');
    	}
    }

    protected function _registerOrLoginUser($data)
    {
        $user = Login::where('email', '=', $data->email)->first();
        if (!$user) {
            $user = new Login();
            $user->name = $data->name;
            $user->username = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->image = $data->avatar;
            $user->password = '00000';
            $user->addedDate = date('Y-m-d');
            $user->utype = 3;
            $user->save();
        }

        Session::put('username', $user->username);
            Session::put('userid', $user->id);
            Session::put('type', 3);
    }
}
