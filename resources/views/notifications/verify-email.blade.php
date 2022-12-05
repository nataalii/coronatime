<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet"> 
    <title>Verify Email</title>
    <style>
        body {
            font-family:  'Inter', sans-serif;
        }
        @media only screen and (max-width: 400px) {
            h1{
                font-size: 18px;
            }
        }
        .wrapper{
            max-width: 500px;
            margin: 50px auto;
            text-align: center;

        }
        img {
            max-width: 95%;
        }
        button {
            border-radius: 8px;
            max-width: 380px;
            width: 100%;
            height: 55px;
            color: #fff;
            background-color: #0FBA68;
            font-size: 16px;
            font-weight: 900;
            overflow: hidden;
            text-decoration: none;
            border: none;
            padding: 10px;
            margin: 40px auto;
            cursor: pointer;
        },
        h1 {
            color: #010414;
            font-size: 25px;
            font-weight: 900;
            font-weight: bold;
            text-align: center;
            margin-top: 40px;
        }

        h2 {
            color: #010414;
            font-size: 16px;
            font-weight: bold;
            font-weight: 400;
            margin-top: 30px;
        }
        
    </style>
</head>

<body>
    <section>
        <div class="wrapper">
            <img src="{{ asset('images/landing-screen.svg') }}" alt="landing screen">
            
            <div class="container">
                <h1>{{ __('notification.confirm_email') }}</h1>
                <h2>{{ __('notification.confirm_click') }}</h2>
          
                <a href="{{ $url }}" >
                    <button>
                        {{ __('notification.verify_email') }}
                    </button>                
                </a>           
            </div>
        </div>
    </section>

    
</body>
</html>