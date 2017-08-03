<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //tell model to use this table
    protected $table= 'categories';

    public function posts(){
    	//has many posts
    	//relationship that category has many posts
    	return $this->hasMany('App\Post');
    }
    

}
