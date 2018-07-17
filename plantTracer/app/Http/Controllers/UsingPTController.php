<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsingPTController extends Controller
{
    public function index(){
    	return view('usingplanttracer');
    }
}
