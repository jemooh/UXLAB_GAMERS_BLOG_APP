<?php
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\validation;
namespace App\Http\Controllers;
use DB;
use Input;
use Redirect;
use Auth;
use Hash;
use View;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Controller;
    class Tcontroller extends BaseController
    {
    protected $layout = 'layouts.master';


			  public function viewteacher(){

				return \View::make('tview');
			}

			  public function viewform(){

				return \View::make('form');
			}

			public function EditTeacher($id){

				return \View::make('edit')->with('id',$id);
			}

			public function delete($id){

				DB::table('teachers')->where('id',$id)->delete();
				return Redirect::to('teachers');
			}

			 public function save(){

				$validation= array(
					'teacher_name' => 'required',
					'phone_no'    => 'required'
					);

				$vl = \Validator::make(Input::all(),$validation);

				if ($vl->fails())
					{
						return Redirect::to('form')->withErrors($vl);
					}else{
						$postteacher = Input::all();
						$data = array(
							'teacher_name' =>$postteacher['teacher_name'],
							'gender' =>$postteacher['gender'],
							'phone_no' =>$postteacher['phone_no'],
							'password'=>Hash::make($postteacher['password']));

						$check = 0;
						$check = DB::table('teachers')->insert($data);
						if ($check >0)
						{
							return Redirect::to('/teachers');
						}else
						{
							return Redirect::to('/form');
						}
				}
			}

    public function update(){

				$validation= array(
					'teacher_name' => 'required',
					'phone_no'    => 'required'
					);

				$vl = \Validator::make(Input::all(),$validation);

				if ($vl->fails())
					{
						return Redirect::to('edit')->withErrors($vl);
					}else{
						$postteacher = Input::all();
						$data = array(
							'teacher_name' => $postteacher['teacher_name'],
							'gender' =>$postteacher['gender'],
							'phone_no'=>$postteacher['phone_no']);

						$check = 0;
						$check = DB::table('teachers')->where('id',$postteacher['id'])->update($data);
						if ($check >0)
						{
							return Redirect::to('/teachers');
						}else
						{
							return Redirect::to('/edit');
						}
				}
			}




// app/controllers/HomeController.php
    public function create()

			{
			    return \View::make('create'); // redirect the user to the login screen
			}
// app/controllers/HomeController.php
    public function store()

			{
			    $input = Input::all();
			   //in this methd if the gredantials much laravel is going to log the user in.
			    //dd($input);
			   $attempt = Auth::attempt([
                    'teacher_name' =>$input['teacher_name'],
                    'password' =>$input['password']
			    	]);
			   if($attempt) return Redirect::intended('teachers');
			   dd('Error Message: *Wrong Email/Password');
			}

    public function doLogout()

			{
			    Auth::logout(); // log the user out of our application
			    return Redirect::to('login'); // redirect the user to the login screen
			}

   public function newPost() {

   	   return view($this->layout->content =View::make('blog.new'));
   }


}
