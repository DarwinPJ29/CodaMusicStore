<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .black-bg {
            background-color: #000000;
        }
        .navbar-brand {
            display: flex;
            align-items: center;
            margin-bottom: 100px;
            height: 100px;
        }
      
    </style>
</head>
<body>
    <div class="container-fluid black-bg">
        <a class="navbar-brand mx-3" href="{{ route('index') }}">
            <img src="{{ asset('assets/images/logo.png') }}" width="500" height="58">
        </a>
    </div>
</body>
</html>
