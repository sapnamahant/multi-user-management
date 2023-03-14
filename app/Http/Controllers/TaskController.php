<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    //

    function index(){
     $this->data['task'] = Task::select('task.id','task.title','e.name as emp_name','a.name as assign_by')->leftJoin('users as e','e.id','=','task.employee')->leftJoin('users as a','a.id','=','task.assign_by')->get();
      return view('task.index',$this->data);
    }

    function addtask(){
      $this->data['employee'] = User::where('role',3)->get();
      return view('task.add-task',$this->data);
    }

    function insert(Request $req){

      if(empty($req->id)){
        $task = new Task();
        $task->title = $req->title;
        $task->employee = $req->employee;
        $task->assign_by = Auth::user()->id;
      }else{
        $task = Task::firstwhere('id',$req->id);
        $task->title = $req->title;
        $task->employee = $req->employee;
        $task->assign_by = Auth::user()->id;
      }
       if($task->save()){
         return redirect()->route('task')->with('success', 'Task Updated Successfully');
       }else{
        return redirect()->back()->with('error', 'Failed to Update Task');
       }
    }

    function edit($id){
      $this->data['task'] = Task::where('id', $id)->first();
      $this->data['employee'] = User::where('role', 3)->get();
      return view('task.add-task',$this->data);
  }

  function delete($id){
        
    Task::where('id',$id)->delete();
    return redirect()->route('task')->with('success', 'Employee Deleted Successfully');
  }
}
