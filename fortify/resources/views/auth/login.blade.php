@extends('main')
@section('content')
    <div class="fields">
        <form action="/login" method="POST">
            @csrf
            <div class="email">
                <input name="email" placeholder="Email">
            </div>
            <div class="password">
                <input name="password" placeholder="Password">
            </div>
            <div class="button">
                <button type="submit">Login</button>
            </div>
            @error('email')
                <p>{{$message}}</p>
            @enderror
            @error('password')
                <p>{{$message}}</p>
            @enderror
        </form>

    </div>
@endsection
