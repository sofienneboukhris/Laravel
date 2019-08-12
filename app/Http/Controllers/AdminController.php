<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Carbon\Carbon;
use DB;
class AdminController extends Controller
{
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
        $count = \DB::table('users')->where('admin', 0)->count();
        session_start(); // DEMARRE LA SESSION
// SAUVGARDE LA VARIABLE hits DANS LE FICHIER DE SESSION
$hits =0;

// TRAITEMENT SUR LE FICHIER TEXTE
if(empty($hits)){
$fp=fopen("compteur.txt","a+"); //OUVRE LE FICHIER compteur.txt
$num=fgets($fp,4096); // RECUPERE LE CONTENUE DU COMPTEUR
fclose($fp); // FERME LE FICHIER
$hits=is_numeric($num) - -1; // TRAITEMENT
$fp=fopen("compteur.txt","w"); // OUVRE DE NOUVEAU LE FICHIER
fputs($fp,$hits); // MET LA NOUVELLE VALEUR
fclose($fp); // FERME LE FICHIER
}
        return view('admins/admin', [
        'count' => $count,
        'hits' =>$hits,
    ]);
  }


      public function add_admin()
    {

     return view('admins/add_admin');
    }



}
