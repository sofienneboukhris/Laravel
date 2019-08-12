<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Carbon\Carbon;
class Admin_modController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::all();
        return view('users' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admins/add_admin') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $now = Carbon::now()->toDateTimeString();
        $user = [
            'name' => $request->name ,
            'email' => $request->email ,
            'password' => hash::make($request->password ) ,
            'admin' => 1 ,
            'created_at'=> $now ,
        ];
        $save = User::insert($user) ;
        if($save)
             return redirect('table');
         else
            return redirect()->back()->withInput() ; 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data['user'] = User::find($id);
        return view('admins/edit_admin' , $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $user = [
            'name' => $request->name ,
            'email' => $request->email ,
            'password' => hash::make($request->password ) ,
            
        ];
        $update = User::find($id)->update($user) ;
        if($update)
             return redirect('table');
         else
            return redirect()->back()->withInput() ; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $user = User::find($id) ;
        if($user){
            $user->destroy($id);
            $msg =" user delete " ;
             
        }else{
         $msg =" erreur! "    ;     
        }return redirect()
         ->back()
          ->withSuccess($msg) ;
}
}
