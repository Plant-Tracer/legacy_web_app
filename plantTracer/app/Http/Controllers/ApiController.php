<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
 
public function getIndex()
{
    include(app_path() . '/api/index.php');
}

public function getUpload()
{
    include(app_path() . '/api/upload.php');
}
}
