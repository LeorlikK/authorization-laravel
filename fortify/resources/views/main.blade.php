<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body>
<h1>Hello App</h1>
<div class="container">
    @auth()
        <p>{{\Illuminate\Support\Facades\Auth::user()->email}}</p>
    @endauth

    <a href="/" class="link">Home</a>
    <a href="/register" class="link">Registration</a>
    <a href="/login" class="link">Login</a>
    <a class="link">refresh</a>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit" class="link">logout</button>
    </form>
    <a class="link">me</a>
    <a href="{{route('protected.one')}}" class="link">protected</a>
</div>
@yield('content')
</body>
</html>
