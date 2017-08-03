<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Post;
use App\Category;


class PageController extends Controller
{
   
    public function getIndex()
        {
            // retrieve data form table posts from database
            $posts = Post::OrderBy('created_at','desc')->limit(12)->get();
            // $cats = Category::all();
            // $category = compact($posts,$cats);
            $category = Category::all();
            //data for slideshow
            $slides = Post::OrderBy('created_at','desc')->limit(3)->get();
            return view("welcome")->withPosts($posts)->withCategories($category)->withSlides($slides);
        }
    public function getAbout()
        {
        $last ="Alex";
        $name= "Sok";
        $fullname= $last . " " . $name;
        $email= "Sopheara.toem@gmail.com";
        return view('about')->withFullname($fullname)->withEmail($email);
        }
    public function getContact(){
    	return view('contact');
    }

}
