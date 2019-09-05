<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Studentw;
use DB;


class MainController extends Controller
{
    function index(){
		return view('login');
	}
	function checklogin(Request $request){
	//$this->validate($request,['email'=>'required|email','password'=>'required|alphaNum|min:3']);
	$user_data =array('email'=>$request->get('email'),'password'=>$request->get('password'));
	if(Auth::attempt($user_data)){
	     return redirect('main/successlogin');
	  }else{
		  return back()->with('error','Wrong login details');
	  }
	}
	function successlogin(){
		return view('successlogin');
	}		
	function getrecords(){
		$student =DB::table('users')->get();
		print_r($student);
	}
}
