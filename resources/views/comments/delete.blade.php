@extends('layouts.master')
@section('title')
	delete		
@endsection
@section('content')
	@include('include.header')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>DELETE THIS COMMENT</h1>
			<p>
				<strong>Name:</strong>{{ $comment->name }}<br>
				<strong>Email:</strong>{{ $comment->email}}<br>
				<strong>Comment:</strong>{{ $comment->comment}}
			</p>

			{{ Form::open(['route'=>['comments.destroy',$comment->id],'method'=>'DELETE'])}}
				{{Form::submit('Yes Delete this comment', ['class'=>'btn btn-block btn-danger'])}}
			
			{{ Form::close()}}
		</div>
	</div>
@endsection