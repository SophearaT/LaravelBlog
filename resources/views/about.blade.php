@extends('layouts.master')
@section('title')
  Welcome Laravel-about
@stop 

@section('content')
  @include('include.header')
  <div class="container large-head">
    <div class="row">   
      <div class="col-md-12">       
        <div class="jumbotron">
            <h1>Hello to Laravel about</h1>
            <p class="lead">Thank for having me tonight</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
      </div>
      </div>
    </div>
    <div class="row">
        <div class="col-md-8" >
          <div class="post">
              <h3>Post Title</h3> 
              <p>Forms are an essential part of any web application. We use them for logging in and registering users, requesting feedback, submitting comments, and many other things. However, building them and then validating the submitted data can become a nuisance. Laravel provides us with some neat classes to make things more intuitive.</p>
              <a href="#" class="btn btn-primary">Read More</a>
          </div>         
          
      </div>
      <div class="col-md-3 col-md-offset-1" >
            <h2>SideBar</h2>
         </div>
    </div>    
  </div><!-- end of container--!>
@stop