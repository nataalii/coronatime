<!DOCTYPE html>
<html lang="en">
  
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
   <title>Reset Pssword</title>
</head>
 
<body style="font-family: Inter">
   <section>
       <div class="wrapper" style="height: 100%; max-width:500px; margin: 50px auto; text-align:center">
           <img src="{{ asset('/images/landing-screen.png') }}" alt="landing screen" style="max-width: 95%">
          
           <div class="container">
               <h1 style="color: #010414; font-size: 25px; font-weight: 900; font-weight: bold; text-align: center; margin-top: 40px;">{{ __('notification.recover_password') }}</h1>
               <h2 style="color: #010414; font-size: 16px; font-weight: bold; font-weight: 400; margin-top: 30px;">{{ __('notification.recover_click') }}</h2>
               <a href="{{ $url }}" >
                   <button style="border-radius: 8px; max-width: 380px; width: 100%; height: 55px; color: #fff; background-color: #0FBA68; font-size: 16px; font-weight: 900; overflow: hidden; text-decoration: none; border: none;
                       padding: 10px; margin: 40px auto; cursor: pointer;">
                       {{ __('notification.recover_button') }}
                   </button>               
               </a>          
           </div>
       </div>
   </section>
 
  
</body>
</html>
