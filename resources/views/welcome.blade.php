@extends('layouts.master')
@section('title')
  Welcome Laravel
@endsection
@section('stylesheet')
  {{ Html::style('css/style.css') }}
  <link href="https://fonts.googleapis.com/css?family=Covered+By+Your+Grace|Raleway:100,500,600,800" rel="stylesheet">
@endsection
@section('content')
  @include('include.header')
  {{-- <div class="container-fluid">
    <div class="row">   
      <div class="col-md-12">       
        <div class="jumbotron" id="BackGr">
            <h1 class="stylefont">Hello to Laravel</h1>
            <p class="lead">Thank for having me tonight</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
      </div>
      </div>
    </div> --}}
    {{-- Slideshow
  
    
  </div> --}}

  
 {{--  <div class="container-fluid">
    <div class="row">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <div class="col-md-8">
        <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <img src={{ asset("images/1499506403.jpg") }} alt="Los Angeles" style="width:75%;">
             
            </div>

            <div class="item">
              <img src={{ asset("images/1499507329.jpg")}} alt="Chicago" style="width:75%;">
              <div class="carousel-caption">
              <h3>Mr Frog</h3>
              <p>Thank you, Mr Frog!</p>
              </div>
            </div>
          
            <div class="item">
              <img src={{ asset("images/1499506909.jpg")}} alt="New york" style="width:75%;">
              <div class="carousel-caption">
              <h3>Natural Landscape</h3>
              <p>Thank you, Natural Landscape!</p>
              </div>
            </div>
          </div>
      </div>
       
      <div class="col-md-4">
         <div class="carousel-caption" >
              <h3>Mr Bear</h3>
              <p>Thank you, Bear!</p>
              </div>
            <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
           <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>          
      </div>
         
          

         
    </div>     
  </div>
  </div>

 --}}


  <div class="container-fluid slideshow head">
    <div class="row BackColor">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <div class="col-md-12">
          <div class="carosel-panel carousel-cycle">
              <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            @foreach ($slides as $slide)
                <div class="item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ asset('images/'.$slide->image) }}" />        
                    <div class="carousel-caption">
                      <h3>{{ $slide->title }}</h3>                    
                    </div>
                </div>
            @endforeach
            {{-- <div class="col-md-9 col-md-offset-3">
                           
            </div> --}}
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>            
            </a>  
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>            
            </a>  
            {{-- <div class="col-md-7 col-md-offset-5">
                 
            </div> --}}
            <ol class="carousel-indicators">
                    @foreach( $slides as $slide )
                        <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                    @endforeach
            </ol>
            
          </div>
          </div>
          </div>
            
      </div>
      {{-- <div class="col-md-4">
          <div class="car_body row">            
            <div class="col-md-12" style="background-color: red;">
                <h1>HI we are here!</h1>
            </div>
            
                   
          </div>
      </div> --}}
    </div>
  </div>
  </div>
  {{-- <div class="container-fluid">    
          <div class="row">
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            
              <div class="col-md-8 padding-0" id="RCarosel">                   
                    <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                  
                  <div class="item active">
                    <img src={{ asset("images/1499506403.jpg") }} alt="Los Angeles" style="width:100%;" >
                   
                  </div>

                  <div class="item">
                    <img src={{ asset("images/1499507329.jpg")}} alt="Chicago" style="width:100%;" >
                    <div class="carousel-caption">
                    <h3>Mr Frog</h3>
                    <p>Thank you, Mr Frog!</p>
                    </div>
                  </div>
                
                  <div class="item">
                    <img src={{ asset("images/1499506909.jpg")}} alt="New york" style="width:100%;" >
                    
                  </div>
                </div> {{-- inner --}}

            {{-- </div>  id class                       --}}
            {{-- <div class="col-md-4 padding-0">
              <h1>Hi this is me to save you from obstacle</h1>
              <div class="carousel-caption">
                    <h3>Natural Landscape</h3>
                    <p>Thank you, Natural Landscape!</p>
              </div>
            </div>

          </div> {{-- end of row 
       </div>
  </div> --}} 
  
  



<div class="container">
     <div class="row justify-content-center">
     
     <div class="col-10">
       
     

    
      {{-- @foreach($cats as $C)

      @endforeach  --}}     
        {{-- @foreach ($categories as $categor)
              {{ $category->id }}
        @endforeach --}}
        {{-- <h1>{{ $categories->post->name }}</h1> --}}
        @php
            $c=0;
        @endphp
        @foreach($categories as $category)
            @if($category->id)
                  @php
                    $c++
                  @endphp
            @endif
        @endforeach
        {{-- <h1>{{$c}}</h1> --}}
        @foreach($categories as $category)
          <H1>{{ $category->name }}</H1>
              @foreach($posts as $post)         
                @if($post->category_id == $category->id)
                        <div class="col-md-3 BackThumbnail">
                          <div class="thumbnail">         
                                  <a href="#">
                                     <img src="{{ asset('images/'. $post->image) }}"/>
                                     {{-- <img src="{{ asset('images/'. $post->image) }}" width="320" height="180" style="float:left;margin-right: 10px;" class="img-rounded" /> --}}
                                  </a>
                                  <div class="caption">
                                    <h4 class="stylefont"><span class="label label-default">{{ $post->category->name}}<span></h4>
                                    <a href="{{ route('blog.single',$post->slug) }}"><h3>{{$post->title}}</h3></a>
                                    <p>{{substr(strip_tags($post->body),0,56)}}

                                    @if (strlen(strip_tags($post->body))>10) 
                                     ...<a href="{{route('blog.single',$post->slug)}}">read more</a>
                                    @else
                                      ""
                                    @endif
                                    </p>                                 
                                    <hr>
                                    <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> {{ ($post->comments()->count() > 1 ? $post->comments()->count()." Comments" : $post->comments()->count()." Comment") }}
                                    
                                    {{-- <a href="#" class="btn btn-link">View</a> --}}
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"> </span> 1000 View 
                                    <a href="#"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Share</a>
                                    
                                   
                                    {{-- <h1>{{ $post->category->id }}</h1>   --}}

                                  </div>               
                          </div>         
                          {{-- <hr>     --}}
                      </div>
                  @endif
            @endforeach
          @endforeach
      {{-- <div class="row">
        <div class="col-md-12">
          <div class="text-center">
             {{

              $posts->Links()

              }}
          </div>
        </div>
      </div>
         --}}
      {{-- <div class="col-md-3 col-md-offset-1" >
            <h2>SideBar</h2>
         </div> --}}
    </div>    
     </div> 
    </div>
</div>
   <img src="{{ asset('images/Background.jpg') }}" style="width:100%;"/>
@endsection
@section('scripts')
  <script >
  // confirm('I load some js!');
  </script>
  
@endsection