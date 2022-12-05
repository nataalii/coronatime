<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{asset('images/corona-favicon.png') }}">
    @vite('resources/css/app.css')
    <title>Statistics</title>
</head>
<body class="font-inter">
    <header class="bg-white border-b border-border h-20">
        <div class="flex w-96 lg:w-1600px lg:m-auto space-x-6 justify-between p-5">
            <div>
                <img src="{{ asset('images/coronatime-2.svg') }}" alt="coronatime">
            </div>

            <div class="flex space-x-14 p-2">
                <x-lang-buttons english="{{ route(Route::currentRouteName(),[ 'en']) }}"
                georgian="{{ route(Route::currentRouteName(),[ 'ka'])}}"/>

                <div class="hidden lg:grid max-w-sm grid-cols-2 mx-auto text-center divide-x">
                    <h4 class="font-bold mr-2">{{ auth()->user()->username }}</h4>    
                    <form method="POST" action="{{ route('logout', app()->getLocale()) }}" class="pl-5 outline-none bg-transparent font-medium">
                        @csrf
                        <button type="submit">{{ __('text.logout') }}</button>
                     </form>  
                </div>
            </div>
 
        </div>
        <body>
            @yield('slot')
        </body>
    </header>
    
 
</body>
</html>

