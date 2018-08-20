<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JavaScript;
use Auth;

class PlantLiteracyController extends Controller
{
    
    public function index(){

    	if(Auth::check()){
    		$isLoggedIn = true;

    		JavaScript::put([
    			'isLoggedIn' => $isLoggedIn
    		]);
    	}
    	return view('plantLiteracy');
    }
}
