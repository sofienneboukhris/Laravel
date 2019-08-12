<?php

namespace App\Http\Controllers;

use Auth;
use App\User;

use Illuminate\Http\Request;

class LoginController extends Controller
{
	public function login(Request $request){
		if(Auth::attempt([
			'email'=> $request->email,
            'password' => $request->password ,
            'admin' => 1
		]))
		{
				return redirect()->route('admin');
		}

		return  redirect('/login')->with('failed', 'email or password not found ');
	}

}
