<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

    public function store(){

    }

    public function destroy(){
    	auth()->logout();
    	return redirect()->home();
    }
}
