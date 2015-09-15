<?php
use Illuminate\Support\Facades\View;
namespace App\Http\Controllers;
use DB;
use App\Http\Controllers\Controller;
class Dbcontroller extends Controller
 {
  
  public function testcontroller(){
	$data = DB::table('users')->where('uid','3')->first();
	return \View::make('dbview',['data'=>$data->info]); 
}
}
