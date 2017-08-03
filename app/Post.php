<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
class Post extends Model
{
    //this is the relationship of post with category
    public function category(){
    	
    	return $this->belongsTo('App\Category');
    }
    public function tags(){
    	return $this->belongsToMany('App\Tag');
    }
    public function comments(){
    	return $this->hasMany('App\Comment');
    }
    public function categorie(){
        return $this->hasOne('App\Category');
    }
}
