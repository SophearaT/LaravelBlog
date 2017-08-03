@extends('layouts.master')

@section('title')
	Edit
@endsection
@section('content')	
	@include('include.header')	
	<div class="col-md-8 col-md-offset-2">
		<h1>Edit Comment</h1>
		{{Form::model($comment,['route'=>['comments.update',$comment->id],'method'=>'PUT'])}}
			{{Form::Label('name','Name:')}}
			{{Form::Text('name',null,['class'=>'form-control','disabled'=>''])}}

			{{Form::Label('email','Email:')}}
			{{Form::Text('email',null, ['class'=>'form-control','disabled'=>''])}}

			{{Form::Label('comment','Comment:')}}
			{{Form::Textarea('comment',null , ['class'=>'form-control'])}}

			{{Form::Submit('Update Comment', ['class'=>'btn btn-block btn-success', 'style'=>'margin-top:15px'])}}

		{{Form::Close()}}
	</div>
	
@endsection