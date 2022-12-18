@vite('resources/css/app.css')
<!DOCTYPE html>
<html lang="en">
<title>Coronatime</title>
<link rel="icon" type="image/png" href="{{asset('images/corona-favicon.png') }}">

<body class="font-inter">
    <img src="/images/coronatime.svg" alt="coronatime-image" class="absolute lg:mx-24 mt-9 mx-5">
      <div class=" absolute mt-11 ml-64 lg:ml-96">
        <x-lang-buttons english="{{ route(Route::currentRouteName(),[ 'en']) }}"
        georgian="{{ route(Route::currentRouteName(),[ 'ka'])}}" />
      </div>

    <div class="flex">
        <div class=" mt-3 flex flex-1 flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24 h-full">
          <div class="mx-auto w-full">
            @yield('content')

          </div>
        </div>
        <div class="hidden flex-1 lg:block relative ">
          <img class="object-cover h-screen right-0 absolute" src="/images/background.png" alt="background-image" >
        </div>
      </div>
    
</body>
</html>