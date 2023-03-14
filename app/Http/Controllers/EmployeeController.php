<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    //

    function index(){
      $this->data['employee'] = User::where('role',3)->get();
    return view('employee.index',$this->data);
  }
  
      function add(){
  
        return view('employee.add');
      }

      function insert(Request $req){
        $req->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'mobile'=>'required',
        ]);

        if(empty($req->id)){
       
          $employee = new User();
          $employee->name = $req->name;
          $employee->email = $req->email;
          $employee->password = Hash::make($req->password);
          $employee->mobile = $req->mobile;
          $employee->added_by = Auth::user()->id;
          $employee->role = 3;
      }else{
        $employee = User::firstwhere('id',$req->id);
        $employee->name = $req->name;
        $employee->email = $req->email;
        $employee->password = Hash::make($req->password);
        $employee->mobile = $req->mobile;
      }
      if($employee->save()){
        return redirect()->route('employee')->with('success', 'Employee Updated Successfully');
      }else{
        return redirect()->back()->with('error', 'Failed to Update Employee');
      }
    }

    function edit($id){
      $this->data['employee'] = User::where('id', $id)->first();
      return view('employee.add',$this->data);
  }

  function delete($id){
        
    User::where('id',$id)->delete();
    return redirect()->route('employee')->with('success', 'Employee Deleted Successfully');
  }
}
