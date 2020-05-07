<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="{{asset('logo/zlogo.png')}}" type="image/gif">

    <!-- CSRF Token -->
    <meta name="_token" content="{{ csrf_token() }}"/>

    <title>ZenRolle</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">


    <!-- Scripts -->
    
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{asset('js/master.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/searchproduct.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    @yield('style')
</head>
<body>
    <div id="app">
        <div class="header">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#"><img src="{{asset('logo/zlogo.png')}}"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
                 </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item pos">
                            <a href="{{url()->previous()}}">
                               <button class="btn btn-success my-2 my-sm-0" type="submit">Go Back</button> 
                            </a>
                        </li>
                        <li class="nav-item pos">
                           <a href="{{url('/pos')}}">
                                <button class="btn btn-success" type="submit"><i class="fa fa-lock-alt"></i>POS</button>
                            </a> 
                        </li>
                        <li class="nav-item search">
                            <input class="form-control mr-sm-6" type="search" placeholder="Search Customer" aria-label="Search">
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="navbar-nav notify">
                            <img src="{{asset('image/location.png')}}" >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link company_name">Company Name</a>
                        </li>
                        <li class="navbar-nav notify">
                            <img src="{{asset('image/notify.png')}}" >
                        </li>
                        <li class="navbar-nav msg">
                            <img src="{{asset('image/msg.png')}}">
                        </li>
                         @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </div>

        <main class="py-4" style="margin-top: -24px !important;">
            @yield('content')
        </main>
    </div>
    @yield('script')
</body>
</html>
