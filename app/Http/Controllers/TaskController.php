<?php
 namespace App\Http\Controllers;
 use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTaskRequest;
use Validator;
use App\Http\Controllers\Controller;
 class TasksController extends Controller
{
    
public function index(){
     $tasks = DB::table('tasks')->get();
    return view('welcome',compact('tasks'));
 }

 public function store(request $request){
    Validator::make($request->all(), [
        'name' => 'required|unique:posts|max:255',
      
    ]);
    
     DB::table('tasks')->insert([
        'name' => $request->name,
        'created_at'=>now(),
        'updated_at'=>now()
        
        ]);
        
        return redirect('/');
 }
public function destory($id){
    DB::table('tasks')->where('id',$id)->delete();
    return redirect('/');
 }
} 