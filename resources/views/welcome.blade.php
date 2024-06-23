<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        .banner {
            width: 100%;
            height: 100vh;
            background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url(background.jpeg);
            background-size: cover;
            background-position: center;
        }

        .header {
            position: absolute;
            top: 20px;
            right: 25px;
            color: #fff;
            font-size: 20px;
        }

        .content {
            position: absolute;
            width: 100%;
            top: 50%;
            transform: translateY(-50%);
            text-align: center;
            color: #fff;
        }

        .content h1 {
            font-size: 70px;
            margin-top: 80px;
        }

        .content p {
            margin: 20px auto;
            font-weight: 100;
            line-height: 25px;
        }

        button {
            width: 200px;
            padding: 15px 0;
            text-align: center;
            margin: 20px 10px;
            border-radius: 25px;
            font-weight: bold;
            border: 2px solid #b06756ac;
            background: transparent;
            color: #fff;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        span {
            background: #b06756ac;
            height: 100%;
            width: 0%;
            border-radius: 25px;
            position: absolute;
            left: 0;
            bottom: 0;
            z-index: -1;
            transition: 0.5s;
        }

        button:hover span {
            width: 100%;
        }

        button:hover {
            border: none;
        }
    </style>
</head>

<body>
    <div class="banner">
        <div class="content">
            <h1>Welcome to Cat's Website</h1>
            <p>Welcome to the world of cats. Here you can manage and learn more about different breeds of cats.</p>
            <div>
                @guest
                    <a href="{{ route('login') }}"><button type="button"><span></span>Login</button></a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"><button type="button"><span></span>Register</button></a>
                    @endif
                @else
                    <a href="{{ route('kucing.index') }}"><button type="button"><span></span>Explore Cats</button></a>
                @endguest
            </div>
        </div>
    </div>
</body>

</html>
