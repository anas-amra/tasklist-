<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('about', function () {
    $name='anas';
    // return view('about',['name' => $name]);
    // return view('about')->with('name',$name);
    return view('/about',compact('name'));
});
Route::get('tasks', function () {
   $tasks= DB::table('tasks')->get();
return view('tasks',compact('tasks'));
});
Route::post('create',function (){
    $task_name = $_POST['name'];
    DB::table('tasks')->insert(['name' => $task_name]);
    return redirect()->back();

});

Route::post('delete/{id}',function ($id){
    DB::table('tasks')->where('id',$id)->delete();
    return redirect()->back();
}
);
Route::post('edit/{id}',function ($id){

   $task= DB::table('tasks')->where('id',$id)->first();
   $tasks= DB::table('tasks')->get();
   return view('tasks',compact('task','tasks'));

}
);
Route::post('update',function (){
    $id = $_POST['id'];
     $task_name = $_POST['name'];
    DB::table('tasks')->where('id',$id)->update(['name' => $task_name]);
    return redirect('tasks');

}
);
