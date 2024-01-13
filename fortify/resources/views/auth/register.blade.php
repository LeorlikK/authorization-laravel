@extends('main')
@section('content')
    <div class="fields">
        <form action="/register" method="POST">
            @csrf
            <div class="email">
                <input name="name" placeholder="Name">
            </div>
            <div class="email">
                <input name="email" placeholder="Email">
            </div>
            <div class="password">
                <input name="password" placeholder="Password">
            </div>
            <div class="password">
                <input name="password_confirmation" placeholder="Password Confirmation">
            </div>
            <div class="button">
                <button type="submit">Registration</button>
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
