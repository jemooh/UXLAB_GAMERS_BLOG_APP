<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model {

	//posts table in database
	protected $guarded = [];
	public function comments()
	{
		return $this->hasMany('App\Comments','on_post');
	}
	
	public function author()
	{
		return $this->belongsTo('App\User','author_id');
	}

}

/*Posts class is associated with post table in database.
 $guarded variable is used to prevent inserting/ updating some columns of the table. 
 We want to use all columns so $guarded array is empty. 
 comments() function is associating comments with posts via one-many relation. 
 author() function is returning the author of the post.
  This association is many to one relation.*/