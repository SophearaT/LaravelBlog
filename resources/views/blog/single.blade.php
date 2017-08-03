 	@extends('layouts.master')
@section('title')
	{{$post->title}}
@stop
@section('content')
	@include('include.header')
	<div class="container large-head">
		
	
	<div class="row">
		
		<div class="col-md-8 col-md-offset-2">
			<img src="{{ asset("images/" . $post->image) }}" width="800" height="400"/>
			<h1>{{ $post->title }}</h1>
			<p>{!! $post->body!!}</p>
			<hr>
			<p>Posted In:{{ $post->category->name}}</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">			
			<h4 class="comment-title"><span class='glyphicon glyphicon-comment'></span>  {{ $post->comments()->count()}} Comments</h4>
			@foreach ($post->comments as $comment)
					<div class='comment'>
						<div class="author-info">
							<img src="{{ "https://www.gravatar.com/avatar/". md5(strtolower(trim($comment->email))) ."?s=50&d=monsterid"

}}" class="author-image">
							<div class="author-name">
								<h4>{{ $comment->name }}</h4>
								<p class="author-time">{{ date("F nS, Y - g:iA",strtotime($comment->created_at))}}</p>
							</div>
							
							
						</div>
						<div class="comment-content">
							{{ $comment->comment }}
						</div>		
					</div>

			@endforeach
		</div>
	</div>
	<div class="row">
		<div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;"	>
			{{ Form::open(['route'=>['comments.store',$post->id], 'method'=>'POST']) }}
				<div class="row">
					
					<div class="col-md-6">
						{{Form::Label('name','Name:')}}
						{{Form::Text('name',null,['class'=>'form-control'])}}
					</div>
					<div class="col-md-6">
						{{Form::Label('email','Email:')}}
						{{Form::Text('email',null,['class'=>'form-control'])}}
					</div>
					<div class="col-md-12">
						{{Form::Label('comment','Comment:')}}
						{{Form::Textarea('comment',null,['class'=>'form-control','rows'=>'5'])}}

						{{Form::Submit('Add Comment',['class'=>'btn btn-success btn-block', 'style'=>'margin-top: 15px;'])}}

					</div>




				</div>


			{{ Form::Close()}}
		</div>
	</div>
</div>
@stop