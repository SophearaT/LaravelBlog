<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" 
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
	integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto+Slab:300,400,600,700&amp;lang=en" />
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Sofia:300,400,600,700&amp;lang=en" />
	<title>@yield('title')</title>
	{{ Html::style('css/style.css') }}
	{{ Html::style('css/select2.min.css') }}

	@yield('stylesheet')
</head>
<body id="body">
	
	@yield('content')
	{{-- <div class="row footer">
      
    </div>	 --}}
    <section class="footer">
		<div class="row">
			<div class="col-md-12">
          		<div class="text-center">
              
              	<h6>CopyRight of Hi Iknow</h6>
              	<h1> The spectacle before us was indeed sublime.</h1>
          		</div>
      		</div>
		</div>
    </section>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    @yield('scripts')
 </body>
    

</html>