<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('users', compact('users'));
    }
    public function create()
    {
        $user = new User();
        $user->username = $_POST['username'];
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        $user->save();
        return redirect()->back();
    }
    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
        }
        return redirect()->back();
    }
    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        $users = DB::table('users')->get();
        return view('users', compact('user', 'users'));
    }
    public function update()
    {
        $id = $_POST['id'];
        $user = User::find($id);
        if ($user) {
            $user->username = $_POST['username'];
            $user->email = $_POST['email'];
            $user->password = $_POST['password'];
            $user->save();
        }
        return redirect('users');
    }
}
