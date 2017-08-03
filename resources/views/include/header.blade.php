<header>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid" id="BackH">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
      data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Laravel Blog</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">        
               <li class="{{ Request::is('/') ? "active" : ""}}"><a href="/">Home</span></a>
                </li>
                <li class="{{ Request::is('about') ? "active" : ""}}"><a href="/about">About </a></li>
                <li class="{{ Request::is('contact') ? "active" : ""}}"><a href="/contact">Contact <span class="sr-only">(current)</a></li>
                <li class="{{ Request::is('blog') ? "active" : "" }}"> <a href="/blog">Blog</a></li>
                
      </ul>
      <ul class="nav navbar-nav navbar-right">      
       @if (Auth::check())
         <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
            aria-haspopup="true" aria-expanded="true">Hello {{ Auth::User()->name }} <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('posts.index') }}">Posts</a></li>
              <li><a href="{{ route('categories.index') }}">Categories</a></li>
              <li><a href="{{ route('tags.index') }}">Tags</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="{{ url('logout') }}" 
                     onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();"
                     >Logout</a></li>
              <form id="logout-form" action="{{ url('logout') }}" method="POST"
                    style="display: none;">
                    {{ csrf_field() }}
              </form>
            </ul>
          </li>
          @else
            <ul  class="nav navbar-nav navbar-right">
              <li>
                  <a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Login</a>
              </li>
            </ul>
             

      @endif     
        
                  <!-- Single button -->
         
      </ul>


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

</header>