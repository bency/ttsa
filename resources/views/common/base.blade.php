<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="{{ isset($qa) ? $qa->subject : ''}}">
        <meta property="og:description" content="{{ isset($qa) ? $qa->response : '' }}">
        <script>window.Laravel = {csrfToken: '{{csrf_token()}}'};</script>

        <title>{{ env('APP_NAME', "交通安全協會") }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css">
        @yield('inhead')
    </head>
    <body>
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">{{ env('APP_NAME') }}</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="{{ route('home') }}">{{ env('APP_NAME') }}</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('traffic-predict') }}">燈號倒數</a></li>
                    <li><a href="{{ route('fight-club') }}">戰圖區</a></li>
                    @if(Auth::check())
                    <li><a href="{{ route('line.index') }}">line 群組短網址管理</a></li>
                    @endif
                </ul>
			  <ul class="nav navbar-nav navbar-right">
			    @if(!Auth::check())
				<li><a href="{{ route('login') }}">以 Facebook 登入</a></li>
                @else
				<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}<span class="caret"></span></a>
				  <ul class="dropdown-menu">
					<li role="separator" class="divider"></li>
                      @foreach($account_list as $account)
                          <li><a href="#" class="fetch" data-id="{{ $account->getProperty('id') }}">{{ $account->getProperty('name') }}</a></li>
                      @endforeach
					<li role="separator" class="divider"></li>
                    <li><a href="{{ route('logout') }}">登出</a></li>
				  </ul>
				</li>
                @endif
			  </ul>
			</div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
        <div class="container">
            @yield('container')
            <hr>
            <footer>
                <p class="text-center">台灣機車路權促進會版權所有 © 2017</p>
            </footer>
        </div>
        @yield('inbody')
        <script defer src="{{ asset('/js/app.js') }}"></script>
        <script defer src="{{ asset('/js/fetch.js') }}"></script>
    </body>
</html>
