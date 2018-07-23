<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{

    public function store(){

    	    $this->validate(request(), [

    		'email' => 'bail|required|unique:users|max:255',
    		
    		'password'=> 'bail|required|min:6|confirmed',

    		'password_confirmation' => 'bail|required|min:6'

    	]);

    	    //auth()->attempt(request)

    	if(!auth())->attempt(request(['email'])){
    		return back();
    	}

    	$user = User::create(request(['email','password']));

    	//Sign user in
    	auth()->login($user);

    	return redirect('database');
    }
}
