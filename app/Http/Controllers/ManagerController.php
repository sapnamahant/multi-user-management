<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Auth;

class ManagerController extends Controller
{
    //

    function index(){
        $this->data['manager'] = User::where('role',2)->get();
      return view('manager.index',$this->data);
    }

    function addManager(){
      return view('manager.add-manager');
    }

    function insert(Request $req){
        $req->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'mobile'=>'required',
        ]);

        if(empty($req->id)){
       
          $manager = new User();
          $manager->name = $req->name;
          $manager->email = $req->email;
          $manager->password = Hash::make($req->password);
          $manager->mobile = $req->mobile;
          $manager->added_by = Auth::user()->id;
          $manager->role = 2;
      }else{
        $manager = User::firstwhere('id',$req->id);
        $manager->name = $req->name;
        $manager->email = $req->email;
        $manager->password = Hash::make($req->password);
        $manager->mobile = $req->mobile;
        $manager->added_by = Auth::user()->id;
        $manager->role = 2;
      }
      if($manager->save()){
        return redirect()->route('manager')->with('success', 'Manager Updated Successfully');
      }else{
        return redirect()->back()->with('error', 'Failed to Update Manager');
      }
    }

      function edit($id){
        $this->data['manager'] = User::where('id', $id)->first();
        return view('manager.add-manager',$this->data);

    }
    function delete($id){
        
      User::where('id',$id)->delete();
      return redirect()->route('manager')->with('success', 'Manager Deleted Successfully');
  }
}
