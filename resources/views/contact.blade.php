@extends('layouts.master')
@section('title')
	Contact
@stop
@section('content')
	@include('include.header')
	<div class="container head">
	<div class="row">		
			<div class="col-md-12">
				<h1>Contact Me</h1>
				<hr>
				<form>
					<div class="form-group">						
						<label>Email</label>
						<input class='form-control' type="text" name="email" placeholder="Email">
					</div>
				</form>
				<form>
					<div class="form-group">						
						<label>Subject</label>
						<input class='form-control' type="text" name="subject" placeholder="subject">
					</div>
				</form>
				<form>
					<div class="form-group">						
						<label>Message:</label>
						<textarea class='form-control' type="text" name="message"
						placeholder="Type your message here..." 
						></textarea>
					</div>
				</form>
				<input type="submit" value="send message" class="btn btn-success">
			</div>
		</div>
	</div>
@stop