<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index(){
    	return view('main');
    }
}
