<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="icon" type="image/png" href="{{asset('images/corona-favicon.png') }}">
   <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>
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
           <div x-data="{show: false}" @click.away="show =false" class="relative my-auto">
               <button @click="show = ! show" >
                   <img src="{{ asset('images/dropdown.svg') }}" alt="menu">
               </button>
             
               <div x-show="show" class="absolute -left-10 h-10 z-10 bg-gray-200 rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                   <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                       <li>
                           <h4>{{ auth()->user()->username }}</h4>   
                       </li>
                       <li>
                           <form method="POST" action="{{ route('logout', app()->getLocale()) }}" class=" bg-transparent pb-1 font-medium hover:bg-blue-500">
                               @csrf
                               <button type="submit">{{ __('text.logout') }}</button>
                           </form>                     
                       </li>
                   </ul>
               </div>   
           </div>
          
       </div>
       <section>
           @yield('slot')
       </section>
   </header>
 
</body>
</html>