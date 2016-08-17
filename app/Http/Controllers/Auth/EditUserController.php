<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Controllers\Auth;

class EditUserController extends Controller
{
    
	public function index(){
		

		//$user = User::find(1);
		$user = Auth::user();
		return view('auth/editcadastro')->with('userdados', $user);
	}


}
