<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlantLiteracyController extends Controller
{
    
    public function index(){
    	return view('plantLiteracy');
    }
}
