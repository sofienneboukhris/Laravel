<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotels;
use App\Ville;
use App\Arrangemnt;
use App\Price;
use App\Scarping;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('/welcome');
  }



}
