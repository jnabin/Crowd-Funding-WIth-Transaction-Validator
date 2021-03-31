<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
class logoutController extends Controller
{
    public function index(Request $req){

    	Session::flush();
    	return redirect('/login');
    }
}
