<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coronatime</title>
    @vite('resources/css/app.css')
</head>
<body class="font-inter">
    <div class="flex justify-top flex-col h-full w-screen mt-10">
        <div>
            <img src="/images/coronatime.svg" alt="coronatime-image" class=" ml-6 lg:m-auto">
        </div>
        <div class="text-center mx-auto">
            @yield('slot')
        </div>
    </div>
    
</body>
</html>