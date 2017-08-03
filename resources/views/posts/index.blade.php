@extends('layouts.master')
@section('title')
	post view	
@stop	
@section('content')
	@include('include.header', ['para' => 'data'])
	<div class="container head">
		<div class="row">
			<div class="col-md-10">
				<h1>All posts</h1>
			</div>
			<div class="col-md-2">
				<a href={{ route('posts.create')}} class='btn btn-lg btn-block btn-primary 
				btn-h1-spacing'>Create New Post</a>
			</div>
			<div class="col-md-12">
				<hr>
			</div>

		</div>
		<div class="roww">
			<table class='table'>
				<thead>
					<th>#</th>
					<th>title</th>
					<th>body</th>
					<th>Created At</th>
				</thead>
				<tbody>
					@foreach ($posts as $post)
						<tr>
							<th>{{ $post->id }}</th>
							<td>{{ $post->title}}</td>
							<td>{{ substr(strip_tags($post->body),0,20)}}{{ strlen(strip_tags($post->body))>20 ? '...' : '' }}</td>	
							<td>{{ Date('M j, Y',strtotime($post->created_at))}}</td>
							<td><a href={{ route('posts.show',$post->id)}} class='btn btn-default btn-sm'>View</a> <a href={{ route('posts.edit',$post->id)}} class='btn btn-default btn-sm'>Edit</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
				{!! $posts->links();  !!}
			</div>
		</div>

	</div>
		

@stop
