@extends('layouts.master')
@section('title')
	Blog
@stop
@section('content')
	@include('include.header')

	<div class="container head">
		<div class="row">
		<div class="col-md-12">
			<h1>Blog</h1>
		</div>
	</div>

	@foreach ($posts as $post)
	<div class="row">
		
			<div class="col-md-8 col-md-offset-2">
				<img src="{{ asset("images/". $post->image) }}" width="200" height="100" style="float:left;margin-right: 10px;" class="img-rounded"/>
				<h1>{{ $post->title}}</h1>
				<h5>Publise At: {{ date('M j, Y',strtotime($post->created_at)) }}</h5>

				<p>{{ substr(strip_tags($post->body), 0, 250) }}{{ strlen(strip_tags($post->body)) > 250 ? "..." : "" }}</p>
				<a href="{{ route('blog.single',$post->slug) }}" class='btn btn-primary'>Read More..</a>
				<hr>
			</div>

		
	</div>		
	@endforeach
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				{{
					$posts->links()
				}}
			</div>
		</div>
	</div>
	

@stop