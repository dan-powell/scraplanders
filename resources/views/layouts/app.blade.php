@include('partials.header')


<body class="hold-transition skin-black sidebar-mini">
    <div class="wrapper">

        <header class="main-header">

            <!-- Logo -->
            <a href="{{ url('/') }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">SL</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">{{ config('app.name') }}</span>
            </a>

            @include('partials.navigation.top')

        </header>
        <!-- Left side column. contains the logo and sidebar -->

        @include('partials.navigation.side')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    @yield('title')
                </h1>
                <!--
                <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        -->
    </section>

    @yield('body')

</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        {{ config('app.version') }}
    </div>
    <strong>Developed by <a href="http://dan-powell.uk">Dan Powell</a>.</strong>
</footer>

@include('partials.controls')

<!-- Add the sidebar's background. This div must be placed
immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>

</div>


@include('partials.footer')


{{--


<body>
<div id="app">
<nav class="navbar navbar-default navbar-static-top">
<div class="container">
<div class="navbar-header">

<!-- Collapsed Hamburger -->
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
<span class="sr-only">Toggle Navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>

<!-- Branding Image -->
<a class="navbar-brand" href="{{ url('/') }}">
{{ config('app.name', 'Laravel') }}
</a>
</div>

<div class="collapse navbar-collapse" id="app-navbar-collapse">
<!-- Left Side Of Navbar -->
<ul class="nav navbar-nav">

<!-- Right Side Of Navbar -->
<ul class="nav navbar-nav navbar-right">

@if (!Auth::guest())

@endif

<!-- Authentication Links -->
@if (Auth::guest())
<li><a href="{{ route('login') }}">Login</a></li>
<li><a href="{{ route('register') }}">Register</a></li>
@else

@include('layouts.resources')

<li>Year: {{ app('time')->getYear() }} Day: {{ app('time')->getDay() }}, Hour: {{ app('time')->getHour() }}</li>

<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
{{ Auth::user()->name }} <span class="caret"></span>
</a>

<ul class="dropdown-menu" role="menu">
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
</ul>
</li>
@endif
</ul>
</div>
</div>
</nav>

<div class="container" style="max-height: 300px; overflow: scroll;">
{!! Notification::showAll() !!}
</div>

@yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

--}}
