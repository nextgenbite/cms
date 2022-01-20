<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
          <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" href="../../../../favicon.ico">
        <title>{{ config('app.name', 'CMS') }}</title>



        <!-- Bootstrap core CSS -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        

        <!-- Place your stylesheet here-->
        <link href="{{ asset('assets/css/stylesheet.css') }}" rel="stylesheet">
        
    </head>


    <body>

        <nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top shadow-sm">
            <a class="navbar-brand" href="{{ url('/') }}"> {{ config('app.name', 'CMS') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                   
                    <li class="nav-item active">
                        <a class="nav-link" href="#">About <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Contact <span class="sr-only">(current)</span></a>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="{{ URL::to('/admin') }}">Admin</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                </form>
                <ul class="navbar-nav my-2 my-lg-0">
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
        <hr>
        <main role="main" class="container">

            <!-- <div class="text-center mt-5 pt-5">
<h1>Bootstrap starter template</h1>
<p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
</div>-->

        </main><!-- /.container -->
        <br>
        <br>

        <!-- Page content-->
        <div class="container-fluid">
            <div class="row">
                <!-- Side widgets-->
                <div class="col-lg-3">
                    <!-- Categories widget-->
                    <div class="card mb-3 shadow-sm">
                        <div class="card-header text-white bg-primary">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        @php
                                            $categories= App\Category::all();
                                       
                                        @endphp
                                       @foreach ( $categories as $cat)
                                    <li><a href="#!">{{ $cat->name }}</a></li>
                                       @endforeach
                                      
                                       
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div> 
                <!-- Blog entries-->
                @yield('content')
                <!-- Side widgets-->
                <div class="col-lg-3">

                    <!-- Side widget-->
                    <div class="card mb-3 shadow-sm">
                        <div class="card-header text-white bg-primary">Recent Blog</div>
                        <div class="card-body">
                        @php
                             $latest_post = App\Post::latest()->take(3)->get();
                        @endphp
                        @foreach ($latest_post as $post)
                        <div class="media">
                            <img class="mr-3" style=" width: 64px; height: 64px;" src=" https://dummyimage.com/640x4:3" alt="image">
                            <div class="media-body">
                                <strong class="mt-0">{{ $post->title }}</strong><br>
                                <small> {{ $post->body }}</small>
                            </div>
                        </div>
                        <hr>
                        @endforeach

                           
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>






        <!-- Footer-->
        <footer class="py-3 bg-primary">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; CMS Laravel 2021</p></div>
        </footer>




        <!-- Bootstrap core JavaScript
================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="{{asset('js/libs.js')}}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}" defer></script>
       
            @yield('scripts')




    </body>
</html>
