<?php

/*namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Database\;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Controllers\Auth;
//use Auth;
*/
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use Hash;
use App\User;

class EditUserController extends Controller
{

	public function index(){
		$user = Auth::user();		
		return view('auth/editcadastro')->with('userdados', $user);
	}

    protected function validator(array $data)
    {
    	$user = Auth::user();
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user['id'],
            'passwordnew' => 'required|min:6|confirmed',
        ]);
    }

	public function edituserLogged(Request $request){
		$validator = $this->validator($request->all());


        if ($validator->fails()) {  
			return response()->json( ['error' => $validator->errors()->all()]);
		}else{
			$user = Auth::user();


			if(!Hash::check($request->input('password'), $user['password'])){
				return response()->json( ['error' => 'Senha atual informado é incorreta!']);	
			}else{
				$user->password = bcrypt($request->input('passwordnew'));
				$user->name = $request->input('name');
				$user->save();	
				return response()->json( ['success' => 'dados salvos com sucesso!']);	
			}
		}

	}


}
