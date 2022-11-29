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
            -webkit-text-size-adjust: none;
            background-color: #ffffff;
            height: 100%;
            line-height: 1.4;
            width: 100%;
            margin: 0;
            padding: 0;
            font-family:  'Inter', sans-serif;
        }
        h1 {
            color: #010414;
            font-size: 25px;
            font-weight: 900;
            font-weight: bold;
            margin-top: 0;
            text-align: center;
            margin-top: 40px;
        }

        h2 {
            color: #010414;
            font-size: 18px;
            font-weight: bold;
            margin-top: 0;
            text-align: center;
            font-weight: 400;
            margin-top: 30px;

        }

        button {
            -webkit-text-size-adjust: none;
            border-radius: 8px;
            max-width: 95%;
            width: 380px;
            height: 55px;
            color: #fff;
            background-color: #0FBA68;
            font-size: 16px;
            font-weight: 900;
            display: inline-block;
            overflow: hidden;
            text-decoration: none;
            border: none;
            padding: 10px;
            margin: 40px auto;
            font-weight: 900px;
            cursor: pointer;
            margin-left: 12%;
        }
        img {
            max-width: 95%;
            margin: auto
        }

        .wrapper{
            max-width: 520px;
            width: 90%;
            margin: 100px auto;
            
        }


    </style>
</head>

<body>
    <section>
        <div class="wrapper">
            <img src="{{ asset('images/landing-screen.svg') }}" alt="landing screen">
            
            <div>
                <h1>Recover password</h1>
                <h2>click this button to recover a password</h2>
                <a href="{{ $url }}">
                    <button>
                        RECOVER PASSWORD
                    </button>                
                </a>

            </div>
        </div>
    </section>

    
</body>
</html>