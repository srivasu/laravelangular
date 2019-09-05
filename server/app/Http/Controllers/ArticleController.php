<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models;
use DB;

class ArticleController extends Controller
{
    //
	public function check(Request $request){
		$requestid =$request->get('id');
		$student =DB::table('book_issue')->where('id',$requestid)->get();
		 return response()->json($student, 200);

		
	}
}
