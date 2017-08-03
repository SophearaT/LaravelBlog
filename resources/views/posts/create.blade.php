@extends('layouts.master')
@section('title')
	Create	
@stop
@section('stylesheet')			
	{!! Html::style('css/parsley.css')!!}
	{!! Html::style('css/select2.css')!!}
	 <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	 <script>
	 	tinymce.init({
	 		selector:'textarea',
	 		plugins: 'link code',
	 		menubar: false
	 	});

	 	
	 </script>
@stop
@section('content')
	@include('include.header')
	<div class="container head">
		@include('include.message')	
	</div>
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create Post</h1>
			<hr>

			{!! Form::open(['route' => 'posts.store','files'=>true] ) !!}
    			{{Form::label('title','Title:')}}
    			{{Form::text('title',null,array('class'=>'form-control',
    			 'placeholder'=>'Title here'))}}

				{{ Form::label('slug','Slug:')}}
				{{ Form::text('slug',null,array('class'=>'form-control','required','minlength'=>'5','maxlength'=>'255'))}}

				{{ Form::label('category_id','Category:')}}
				<select name="category_id" class="form-control">
					@foreach ($categories as $category)
					<option value="{{ $category->id  }}">{{ $category->name }}</option>
					@endforeach
				</select>

				{{ Form::label('tags','Tags:')}}
				<select name="tags[]" class="form-control select2-multi" multiple="multiple">
					@foreach ($tags as $tag)
						<option value="{{ $tag->id  }}">{{ $tag->name }}</option>
					@endforeach
				</select>

				{{Form::label('featured_image','Upload Featured Image:')}}
				{{Form::file('featured_image')}}
				
    			{{Form::label('body','Body:')}}
    			{{Form::textarea('body',null,array('class'=>'form-control','placeholder'=>'Body Here'))}}
    			{{Form::submit('Create Post',array('class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top:20px;'))}}
			{!! Form::close() !!}
		</div>
	</div>
@stop
@section('scripts')
	{!! Html::script('js/parsley.min.js')!!}
	{!! Html::script('js/select2.min.js')!!}
	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>
@stop