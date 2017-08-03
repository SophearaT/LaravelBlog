@extends('layouts.master')

@section('title','| Edit Blog Post')

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
		<div class="row">

			{!! Form::Model($post, [ 'route' => ['posts.update',$post->id] , 'method' =>'PUT','files'=>true] ) !!}
			{{-- form model retrieve data from db to update --}}
			<div class="col-md-8">
				{!! Form::label('title','Text:') !!}
				{!! Form::text('title',null,['class'=> 'form-control input-lg']) !!}

				{!! Form::label('slug','Slug:', ['class' => 'form-spacing-top'] )!!}
				{!! Form::text('slug',null,['class'=> 'form-control']) !!}
				
				{{  Form::label('category_id','Categories:')}}
				{{  Form::select('category_id',$categories,null,['class'=>'form-control'])}}
				
				{{  Form::label('tags','Tags:',['class' => 'form-spacing-top'])}}
				{{  Form::select('tags[]',$tags,null,['class'=>'form-control select2-multi','multiple'=>'multiple'])}}
				
				{{ Form::label('featured_image','Update Featured Image:')}}
				{{ Form::file('featured_image')}}

				{!! Form::label('body','Body:' ,['class' => 'form-spacing-top']) !!}
				{!! Form::textarea('body',null,['class'=> 'form-control']) !!}
			</div>
			<div class="col-md-4">
				<div class="well">
					<dl class="dl-horizontal">
					  <dt>Create At:</dt>
					  <dd>{{date('M j, Y h:ia',strtotime('$post->created_at'))}}</dd>
					</dl>	
					<dl class="dl-horizontal">
					  <dt>Last Updated At:</dt>
					  <dd>{{date('M j, Y h:ia',strtotime('$post->updated_at'))}}</dd>
					</dl>	
					<dl class='dl-horizontal'>
						<dt>Categories</dt>
						<dd>{{ $post->category->name }}</dd>
					</dl>
			<hr>
					<div class="row">
						<div class="col-sm-6">
							{!! Html::linkRoute('posts.show','Cancel',array($post->id),array('class'=>'btn btn-danger btn-block'))   !!}
							
						</div>
						<div class="col-sm-6">
							{!! Form::submit('Save Changes',['class' => 'btn btn-success btn-block' ] )!!}
						
						</div>
					</div>
					
			{!! Form::Close() !!}
			</div>
		</div>
		

		</div>
	</div>

@endsection
@section('scripts')
	{!! Html::script('js/parsley.min.js')!!}
	{!! Html::script('js/select2.min.js')!!}
	<script type="text/javascript">
		$('.select2-multi').select2();
		$('.select2-multi').select2().val({{ json_encode($post->tags()->getRelatedIds()) }}).trigger('change');
	</script>
@stop
