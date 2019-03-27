
	<link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
		<link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">
	<script type="text/javascript" src="{{url('js/jquery-3.3.1.js')}}"></script>
		<script type="text/javascript" src="{{url('js/bootstrap.js')}}"></script>
        
<style type="text/css">
       .navbar-inverse{
        background:#ff0000;
    }
    li{
      color: black;
    }
</style>

 <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/dashboard') }}">
                       Online Application Portal
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                          @if(Auth::guest()) 
                        <li><a href="#">Home</a></li>
  <li><a href="#">About</a></li>
     <li><a href="#">Job Vacancies</a></li>
      <li><a href="{{url('/contactPage')}}">How to register and apply</a></li>
      
                         </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                     
                            <li style="color: Black; font-style: Poppins"><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                           <li style="color: black"><a href="{{url('/personal')}}">Personal Information</a></li>
                             <li><a href="{{url('/qualifications')}}">Qualifications</a></li>
                              <li><a href="{{url('/experience')}}">Experience</a></li>
                                   <li><a href="{{url('/publication')}}">Publications</a></li>
                                    <li><a href="{{url('/referees')}}">Referees</a></li>
                                     <li><a href="{{url('/terms')}}">Terms and Conditions</a></li>
                         <li class="dropdown" style="color: white">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->first_name }} <span class="caret"></span>
                                </a>
                                  <ul class="dropdown-menu">
                                       @if(Auth::id() ==1)
                        <li ><a href="{{url('/profile')}}"><span class="glyphicon glyphicon-cog"></span>Profile</a></li>
                         <li><a href="{{url('/school')}}"><span class="glyphicon glyphicon-open"></span>Add School/Dept/Sec</a></li>
                          <li><a href="{{url('/jobcode')}}"><span class="glyphicon glyphicon-open"></span>Add Job Code</a></li>
                           <li><a href="{{url('/post')}}"><span class="glyphicon glyphicon-open"></span>Add Post</a></li>
                            <li><a href="{{url('/candidates')}}"><span class="glyphicon glyphicon-open"></span>All Applicants</a></li>
                               <li><a href="{{url('/allpersonalfiles')}}"><span class="glyphicon glyphicon-download"></span>Personal Files</a></li>
                                 <li><a href="{{url('/loading')}}"><span class="glyphicon glyphicon-download"></span>Personal</a></li>
                                  
                           
                               @endif
                                    <li >
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <span class="glyphicon glyphicon-off"></span>
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            
                                                         </li>

                        @endguest
                    </ul>
                </div>
                <div class="container">

        @yield('layouts.partials._alert')
 
    </div>
            </div>
        </nav>