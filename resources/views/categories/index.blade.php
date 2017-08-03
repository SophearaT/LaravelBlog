@extends('layouts.master')
@section('title')
	| Categories		
@stop
@section('content')
	@include('include.header')
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h1>Categories</h1>
				<table class="table">
					<caption>table title and/or explanatory text</caption>
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($categories as $category)
						<tr>
							<th>{{ $category->id}}</th>
							<td>{{ $category->name}}</td>
						</tr>
					@endforeach
						
					</tbody>
				</table>
			</div>
			<div class="col-md-3">
				<div class="well">
				
					{!! Form::open(['route'=>'categories.store','method'=>'POST']) !!}
						<h2>New Category</h2>
						{{Form::label('name','Name:')}}
						{{Form::text('name',null,['class'=>'form-control'])}}

						{{ Form::submit('create new category',['class'=>'btn btn-primary btn-block form-spacing-top'])}}

					{!! Form::Close() !!}
				</div>
			</div>
		</div>

	</div>
@stop