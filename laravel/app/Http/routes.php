<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	//$greeting =  'Heey!'
    return view('welcome');
});

/*Route::get('about0',function(){
	$greeting =  'Heey!';
	$from = 'Hames';
	return View::make('about')->with(array(
		'greeting' => $greeting,
		 'from' => $from));
});*/

Route::get('about1', function(){

	return View::make('about')->with(array('items' => array('Mangoes','Bananas','Oranges')));
});

//testcontroller it loads awa index view using controller
//array tells laravel which value to use
//@ which method from controller
Route::get('testController',array('uses'=>'HomeController@testcontroller'));
//fetch data from db
Route::get('dbdata',array('uses'=>'dbcontroller@testcontroller'));

//route to display teachers data from lacalhost
Route::get('teachers','Tcontroller@viewteacher');
//display form
Route::get('form','Tcontroller@viewform');
//correct it should be post.
Route::any('/save','Tcontroller@save');
Route::get('/EditTeacher/{id}','Tcontroller@EditTeacher');

Route::any('/update','Tcontroller@update');

Route::get('/DeleteTeacher/{id}','Tcontroller@delete');

/*
Route::get('login', function(){
	echo '<form method="POST" action="' URL::to('login') '">';
	echo '<p><input type="text" id="email" placeholder="email"></p>';
	echo  '<p><input type="password" id="password" name="password"></p>';
    echo '<p><input type="submit" value="signup"></p>';
    echo '</form>';
});

Route::post('login',function(){
	$userdata  = array(
		'email' = Input::get('email'),
		 'password' = Input::get('password'));
	    if(Auth::attempt($userdata)){
	    	echo 'successful'
	    }else{
	    	echo 'Try again'
	    }
});
*/

// route to show the login form
//test authentication
//testing the use of login and logout
Route::get('login', array('uses' => 'Tcontroller@create'));

// route to process the form
//Route::post('login', array('uses' => 'Tcontroller@doLogin'));

Route::get('logout', array('uses' => 'Tcontroller@doLogout'));


Route::resource('sessions','Tcontroller');

Route::get('/post/new',array(
	'uses'=>'Tcontroller@newPost',
	//alias
	'as' => 'newPost'


	));
/*
Route::any('/post/new', array(
	'uses' => '	Tcontroller@createPost',
	'as' => 'createPost'
	));
*/
Route::get('bootstrap','Tcontroller@bootstrap');

 //blog app routes
Route::get('blog','HomeController@index');

Route::get('/home',['as' => 'home', 'uses' => 'HomeController@index']);

//authentication
Route::controllers([
 'auth' => 'Auth\AuthController',
 'password' => 'Auth\PasswordController',
]);

// check for logged in user
Route::group(['middleware' => ['auth']], function()

     {
            // show new post form
			 Route::get('new-post','HomeController@create');

			 // save new post
			 Route::post('new-post','HomeController@store');

			 // edit post form
			 Route::get('edit/blog{slug}','HomeController@edit');

			 // update post
			 Route::post('update','HomeController@update');

			 // delete post
			 Route::get('delete/{id}','HomeController@destroy');

			 // display user's all posts
			 Route::get('my-all-posts','UserController@user_posts_all');

			 // display user's drafts
			 Route::get('my-drafts','UserController@user_posts_draft');

			 // add comment
			 Route::post('comment/add','CommentController@store');

			 // delete comment
			 Route::post('comment/delete/{id}','CommentController@distroy');
     });

//users profile
Route::get('user/{id}','UserController@profile')->where('id', '[0-9]+');

// display list of posts
Route::get('user/{id}/posts','UserController@user_posts')->where('id', '[0-9]+');

// display single post
Route::get('blog{slug}',['as' => 'post', 'uses' => 'HomeController@show'])->where('slug', '[A-Za-z0-9-_]+');
