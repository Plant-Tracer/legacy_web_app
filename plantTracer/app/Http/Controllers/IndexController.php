<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class IndexController extends Controller
{

    public function index(){
    	return view('index');
    }

    public function store(){

    	$this->validate(request(), [

    		'email' => 'bail|required|unique:users|max:255',
    		
    		'password'=> 'bail|required|min:6|confirmed',

    		'password_confirmation' => 'bail|required|min:6'

    	]);

    	User::create(request(['email','password']));

    	return redirect('database');
    }
}
