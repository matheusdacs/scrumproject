<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EditUserController extends Controller
{
    
	public function index(){
		//if (Auth::check()) {
		//  echo 'logadowwwwww';	
	//	}
		return view('auth/editcadastro');
	}


}
