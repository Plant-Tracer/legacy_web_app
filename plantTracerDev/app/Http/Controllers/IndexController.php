<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;
use JavaScript;

class IndexController extends Controller
{

    public function index(){

    	if(Auth::check()){
    		$isLoggedIn = true;

    		JavaScript::put([
    			'isLoggedIn' => $isLoggedIn
    		]);
    	}

    	return view('index');
    }
}
