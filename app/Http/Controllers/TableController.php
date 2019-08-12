<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class TableController extends Controller
{
	  public function __construct()
    {
        $this->middleware('auth');
    }
      public function index()
    {
    	$arr['admin'] = User::all()->where('admin', 1);
    	$arr['user'] = User::all()->where('admin', 0);
    	return view('admins/table')->with($arr);
    }
   
}
