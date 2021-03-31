<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Login;
use Session;
class RegistrationController extends Controller
{
    public function index(){
    	return view('registration.index');
    }

    public function signup(RegistrationRequest $req){
        //         echo '<script>';
        //   echo 'console.log('. json_encode( Session::all() ) .')';
        //   echo '</script>';
                if($req->hasFile('myfile')){
                    $file = $req->file('myfile');
                    $imageName = date("h-i-sa").'.'.$file->getClientOriginalName();
                    $path = $file->move('upload\image', $imageName);
                }
                
                $user = new Login();
                $user->name     = $req->first_name.' '.$req->last_name;
                $user->image         = $path;
                $user->username         = $req->username;
                $user->password        = $req->password;
                $user->email         = $req->email;
                $user->utype         = 3;
                $user->addedDate         = date('Y-m-d');
                $user->status         = 1;
                if($user->save()){
                    Session::flash('msg1', '**registration has been succeed');
                    return redirect()->route('login.index');
                }
            }
        

    public function verify(LoginRequest $req){

         $user = DB::table('users')
                    ->where('username', $req->username)
                    ->where('password', $req->password)
                    ->where('type', '2')
                    ->where('status', '1')
                    ->first();
        
    	if((!empty($user)) > 0){
            Session::put('username', $user->username);
            Session::put('userid', $user->id);
            Session::put('type', '2');
            return redirect()->route('home.index');
    	}else{
    		Session::flash('msg', 'invalid username/password');
    		return redirect('/login');
    	}
    }
}
