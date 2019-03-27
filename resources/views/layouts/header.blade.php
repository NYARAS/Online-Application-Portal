<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">


{!!Html::style('public/css/bootstrap.min.css')!!}
{!!Html::style('public/css/bootstrap-theme.css')!!}
{!!Html::style('public/css/elegant-icons-style.css')!!}
{!!Html::style('public/css/font-awesome.min.css')!!}
{!!Html::style('public/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet')!!}
{!!Html::style('public/assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet')!!}
{!!Html::style('public/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet')!!}
{!!Html::style('public/css/owl.carousel.css')!!}
{!!Html::style('public/css/jquery-jvectormap-1.2.2.css')!!}
{!!Html::style('public/css/fullcalendar.css')!!}
{!!Html::style('public/css/widgets.css')!!}
{!!Html::style('public/css/style.css')!!}
{!!Html::style('public/css/style-responsive.css')!!}
{!!Html::style('public/css/xcharts.min.css')!!}
{!!Html::style('public/css/jquery-ui-1.10.4.min.css')!!}

{{-----------------css datatable----------------}}
{!!Html::style('public/css/jquery.dataTables.min.css')!!}
{!!Html::style('public/css/buttons.dataTables.min.css')!!}

{!!Html::style('public/css/sweetalert2.min.css')!!}
{!!Html::style('public/css/sweetalert2.css')!!}
{!!Html::style('public/css/flags.css')!!}

{!!Html::style('public/css/jquery-countryselector.css')!!}
{!!Html::style('public/css/jquery-countryselector.css.map')!!}
{!!Html::style('public/css/jquery-countryselector.less')!!}
{!!Html::style('public/css/jquery-countryselector.min.css')!!}


{!!Html::style('public/css/materialize.css')!!}
{!!Html::style('public/css/materialize.min.css')!!}

{!!Html::style('public/css/prism.css')!!}
{!!Html::style('public/css/intlTelInput.css')!!}
{!!Html::style('public/css/demo.css')!!}
{!!Html::style('public/css/disValidNumber.css')!!}




@yield('style')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
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
                    <a class="navbar-brand" href="{{ url('/') }}">
                    Job Application Portal
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                        <li><a href="{{url('/dashboard')}}">All new vacancies</a></li>
                        <li><a href="{{url('/show-course')}}">All Courses(Master Degree)</a></li>



                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>

                            <li><a href="#">How to Apply</a></li>

                              <li><a href="{{url('show-course')}}">Show all Course</a></li>
                        @else

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->first_name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>



                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li>
                                      @can('isAdmin')
                                      <a href="{{route('getManagePosts')}}">Your Dashboard</a>

                                  @endcan
                                @if(Gate::check('isManager') || Gate::check('isSchoolOfScience') || Gate::check('isSchoolOfArts') || Gate::check('isSchoolOfTourism') || Gate::check('isSchoolOfBusiness') || Gate::check('isSchoolOfEducation'))
                                  <a href="{{route('adminview')}}">Your Dashboard</a>

                              @endif
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">

          @include('layouts.partials._alert')

        </div>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>



  {!!Html::script('public/js/jquery.js')!!}
  {!!Html::script('public/js/jquery-ui-1.10.4.min.js')!!}
  {!!Html::script('public/js/jquery-1.8.3.min.js')!!}
  {!!Html::script('public/js/jquery-ui-1.9.2.custom.min.js')!!}
  {!!Html::script('public/js/bootstrap.min.js')!!}
  {!!Html::script('public/js/jquery.scrollTo.min.js')!!}
  {!!Html::script('public/js/jquery.nicescroll.js')!!}
  {!!Html::script('public/assets/jquery-knob/js/jquery.knob.js')!!}
  {!!Html::script('public/js/jquery.sparkline.js')!!}
  {!!Html::script('public/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js')!!}
  {!!Html::script('public/js/owl.carousel.js')!!}
  {!!Html::script('public/js/fullcalendar.min.js')!!}
  {!!Html::script('public/assets/fullcalendar/fullcalendar/fullcalendar.js')!!}
  {!!Html::script('public/js/calendar-custom.js')!!}
  {!!Html::script('public/js/jquery.rateit.min.js')!!}
  {!!Html::script('public/js/jquery.customSelect.min.js')!!}
  {!!Html::script('public/assets/chart-master/Chart.js')!!}

  {!!Html::script('public/js/scripts.js')!!}
  {!!Html::script('public/js/sparkline-chart.js')!!}
  {!!Html::script('public/js/easy-pie-chart.js')!!}
  {!!Html::script('public/js/jquery-jvectormap-1.2.2.min.js')!!}
  {!!Html::script('public/js/jquery-jvectormap-world-mill-en.js')!!}
  {!!Html::script('public/js/xcharts.min.js')!!}
  {!!Html::script('public/js/jquery.autosize.min.js')!!}
  {!!Html::script('public/js/jquery.placeholder.min.js')!!}
  {!!Html::script('public/js/gdp-data.js')!!}
  {!!Html::script('public/js/morris.min.js')!!}
  {!!Html::script('public/js/sparklines.js')!!}
  {!!Html::script('public/js/charts.js')!!}
  {!!Html::script('public/js/jquery.slimscroll.min.js')!!}

  {!!Html::script('public/js/jquery.validate.min.js')!!}
  {!!Html::script('public/js/jquery.flagstrap.js')!!}
  {!!Html::script('public/js/jquery.flagstrap.min.js')!!}






  {{-------------js datatables---------------------}}
   {!!Html::script('public/js/jquery.dataTables.min.js')!!}
   {!!Html::script('public/js/dataTables.buttons.min.js')!!}
   {!!Html::script('public/js/jszip.min.js')!!}
   {!!Html::script('public/js/pdfmake.min.js')!!}
   {!!Html::script('public/js/vfs_fonts.js')!!}
   {!!Html::script('public/js/buttons.html5.min.js')!!}


  {!!Html::script('public/js/sweetalert2.min.js')!!}
  {!!Html::script('public/js/sweetalert2.all.min.js')!!}
  {!!Html::script('public/js/sweetalert2.all.js')!!}
  {!!Html::script('public/js/sweetalert2.all.js')!!}
         {!!Html::script('public/js/sweetalert2.js')!!}



{!!Html::script('public/js/jquery.countryselector.es5.js')!!}
{!!Html::script('public/js/jquery.countryselector.es5.min.js')!!}
 {!!Html::script('public/js/jquery.countrySelector.js')!!}



 {!!Html::script('public/js/materialize.js')!!}
 {!!Html::script('public/js/materialize.min.js')!!}


 {!!Html::script('public/js/prism.js')!!}
 {!!Html::script('public/js/intlTelInput.js')!!}
  {!!Html::script('public/js/isValidNumber.js')!!}

  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


  @yield('script')
    <script>
    $(document).ready(function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
      }
    });
    });
     CKEDITOR.replace( 'article-ckeditor' );
    </script>
</body>
</html>
