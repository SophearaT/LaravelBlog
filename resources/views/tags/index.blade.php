@extends('layouts.master')
@section('title')
	| Tags		
@stop
@section('content')
	@include('include.header')
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h1>Categories</h1>
				<table class="table">
					
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($tags as $tag)
						<tr>
							<th>{{ $tag->id}}</th>
							<td><a href="{{ route('tags.show',$tag->id) }}">{{ $tag->name}}</a></td>
						</tr>
					@endforeach
						
					</tbody>
				</table>
			</div>
			<div class="col-md-3">
				<div class="well">
				
					{!! Form::open(['route'=>'tags.store','method'=>'POST']) !!}
						<h2>New Tag</h2>
						{{Form::label('name','Name:')}}
						{{Form::text('name',null,['class'=>'form-control'])}}

						{{ Form::submit('create new tag',['class'=>'btn btn-primary btn-block form-spacing-top'])}}

					{!! Form::Close() !!}
				</div>
			</div>
		</div>

	</div>
@stop