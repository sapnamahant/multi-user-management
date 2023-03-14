<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::user()->role == 3){
            $this->data['task'] = Task::select('task.id','task.title','a.name as assign_by')->leftJoin('users as a','a.id','=','task.assign_by')->where('employee', Auth::user()->id)->get();
        }else{
            $this->data['task'] = Task::select('task.id','task.title','e.name as emp_name','a.name as assign_by')->leftJoin('users as e','e.id','=','task.employee')->leftJoin('users as a','a.id','=','task.assign_by')->get();
        }
        return view('home',$this->data);
    }
}
