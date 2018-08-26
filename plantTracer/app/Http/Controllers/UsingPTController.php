<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JavaScript;
use Auth;

class UsingPTController extends Controller
{
    public function index(){

    	if(Auth::check()){
    		$isLoggedIn = true;

    		JavaScript::put([
    			'isLoggedIn' => $isLoggedIn
    		]);
    	}
    	return view('usingplanttracer');
    }
}
