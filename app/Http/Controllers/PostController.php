<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Html\HtmlFacade;
use App\Http\Requests;
use App\Post;
use App\Category;
use App\Tag;
use Session;
use Purifier;
use Image;
use Storage;

class PostController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::OrderBy('id','desc')->paginate(5);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request); this is the function using to show all in request
        //validate
        $this->validate($request, [
            'title'      =>'required|max:255',
            'slug'       =>'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id'=> 'required|integer',
            'body'       =>'required|',
            'featured_image' => 'sometimes|image'

            ]);

        //insert
        $post= new Post;
        $post->title= $request->title;
        $post->slug= $request->slug;
        $post->category_id = $request->category_id;
        $post->body= Purifier::clean($request->body);
        //save images

        if($request->hasFile('featured_image')){
            
            $image = $request->file("featured_image");
            $filename = time() . "." . $image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800, 400)->save($location);

            //put the name to store in database
            $post->image = $filename;


        }
        

        $post->save();




        $post->tags()->sync($request->tags,false);
        
        Session::flash('success','The blog post was successfully save!');
        
        //echo Session::get('A');
        //Session::flash('Hi',"You can see me now");
        
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::find($id);

        
        
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         // find post in the database and save to var
        $post = Post::find($id);
        $categories = Category::all();
        $cats = array();
        foreach ($categories as $category) {
            $cats[$category->id]=$category->name;
        }
        $tags = Tag::all();
        $tags2 = array();
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }
        //return it to the view and pass in the var we priviousley created 
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $post =Post::find($id);

        //validate 
        // if ($request->input('slug')== $post->slug){
        //     $this->validate($request, [
        //     'title'=>'required|max:255',
        //     'category_id' => 'required|integer',
        //     'body'=>'required|'
        //     ]);
        // }else{
            $this->validate($request, [
            'title'=>'required|max:255',
            'slug'=>"required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
            'category_id' => 'required|integer',
            'body'=>'required|',
            'featured_image'=>'image'
            ]); 
        // }
        //validate data
        
        //save data to database

        $post = Post::Find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = Purifier::Clean($request -> input('body'));

        if($request->hasFile('featured_image')){

            //add new photo
            $image = $request->file("featured_image");
            $filename = time() . "." . $image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800, 400)->save($location);
            $oldFilename = $post->image;
            //put the name to store in database
            
            //update the photo
            $post->image = $filename;
            //delete the old photo
            Storage::delete($oldFilename);
        }


        
        $post->save();

        if (isset($request->tags)) {
            $post->tags()->sync($request->tags);
        }else
        {
            $post->tags()->sync(array());
        }

        

        //set flash message
        Session::flash('success','This post was successfully saved.');
        //Session::flash('success','The blog post was successfully save!');

        //redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find the id of post
        $post = Post::Find($id);
        // detach the relationship of post and tag

        $post->tags()->detach();

        //delete photo from storage
        Storage::delete($post->image);

        //delete item from database
        $post->delete();

        //flash the message to be sure everything have been delete
        Session::flash('success','This post has been successsfully deleted.');
        return redirect()->route('posts.index');
    }
}
