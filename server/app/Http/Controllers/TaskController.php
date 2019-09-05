<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use DB;

class TaskController extends Controller
{
	public function index(){
		return Task::all();
	}
    //
	public function show(){
		return Task::find($id);
	}
	public function store(Request $request){
		$postdata = file_get_contents("php://input");
		$jsonpost     =json_decode($postdata);
		
		$id = DB::table('tasks')->insertGetId(
    ['model' => $jsonpost->data->model, 'price' => $jsonpost->data->price]
);
$data = array();
$data['data'] = array('id'=>$id,'price' => $jsonpost->data->price,'model' => $jsonpost->data->model);
return json_encode($data);
	}
	public function update(Request $request){
		$postdata = file_get_contents("php://input");
		$jsonpost     =json_decode($postdata);
		$model         =$jsonpost->data->model;
		$price         =$jsonpost->data->price;
		$id            =$jsonpost->data->id;
        DB::table('tasks')
            ->where('id', $id)
            ->update(['price' => $price,'model' => $model]);
			return $id;
		
	}
	public function delete(){
		$postdata = file_get_contents("php://input");
		$id       =json_decode($postdata)->data;
		DB::table('tasks')->where('id', $id)->delete();
		return 204;

		
		
	}
	
}
