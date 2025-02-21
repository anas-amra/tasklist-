<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index(){
        $users= DB::table('users')->get();
        return view('users',compact('users'));
    }
    public function create(){
        $user_name = $_POST['username'];
        DB::table('users')->insert(['username' => $user_name]);
        return redirect()->back();
    }
    public function destroy($id){
        DB::table('users')->where('id',$id)->delete();
        return redirect()->back();
    }
    public function edit($id){
        $user= DB::table('users')->where('id',$id)->first();
        $users= DB::table('users')->get();
        return view('users',compact('user','users'));

     }
    public function update(){
        $id = $_POST['id'];
        $user_name = $_POST['username'];
       DB::table('users')->where('id',$id)->update(['username' => $user_name]);
       return redirect('users');

   }
}
