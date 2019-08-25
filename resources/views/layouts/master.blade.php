<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>@yield('title')</title>
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/master.css')}}">
        @yield('style')
    </head>
    <body>
        <div class="topNav">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">Assignment 1</a>
                    </div>
                    <ul style="display: inline;" class="nav navbar-nav">
                        <li style="margin: 10px;"><a class="nav-link">Signed in as Joe</a></li>
                        <li style="margin: 10px;"><a class="nav-link">Sign Out</a></li>
                    </ul>   
                </div>
            </nav>
        </div>

        <div class="row">
            <div class="col-md-3">
            <div class="sideNav">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <ul class="nav navbar-nav">
                            <li style="margin: 10px;"><a href="/" class="nav-link">Home</a></li>
                            <li style="margin: 10px;"><a href="/recent" class="nav-link">Recent Posts</a></li>
                            <li style="margin: 10px;"><a href="/users" class="nav-link">Users</a></li>
                        </ul>   
                    </div>
                </nav>
            </div>
            </div>
            <div class="col-md-6">
                @yield('content')
            </div>
            <div class="col-md-3"></div>
        </div>
    </body>
</html>