<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FiLo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
			html {
				overflow: hidden;
			}
        </style>
    </head>
	
@extends('layouts.app')
@section('content')
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
						@if (Auth::user()->is_admin)
								<a class="flex" href="{{ route('requesttable') }}">View Requests</a>
						@else
								<a class="flex" href="{{ route('add') }}">Add a found Item</a>
						@endif
                    @else
					
                    @endauth
					<a class="flex" href="{{ route('view') }}">View Found Items</a>
                </div>
            @endif

            <div class="content">
			               			
				<div class="flex-center m-b-md">
					@if(date("H") >= "12") 
							<h2>Good Afternoon!</h2>
						@else 
							<h2>Good Morning!</h2>
					@endif


				</div>
                <div class="title flex-center m-b-md">
					@if(Route::has('login')) 
						@auth								
							<h2>Welcome back to FiLo! - {{Auth::User()->name}}</h2>
						@else	
							<h2>Welcome to FiLO!</h2>
						@endauth
					@endif
                </div>
				<footer> Created by Inder Panesar | 180039762 | Aston University </footer>

            </div>
        </div>
    </body>
@endsection
</html>
