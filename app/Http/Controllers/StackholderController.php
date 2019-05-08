<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
class StackholderController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    } //func

    public function getStudents(){
  
    	$lists = User::where('role', 2)->get();
    	//dd($lists);

    	return view('stackholder.student_list')->withLists($lists);
    } //func
} // class
