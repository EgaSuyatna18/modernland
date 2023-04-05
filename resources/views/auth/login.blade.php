@extends('layouts.master1')
@section('content')
<div class="container-fluid d-flex align-content-around flex-wrap" style="height: 780px;">
    <div class="container text-center">
        <h1>Login</h1>
        Sebagai {{ $login }}
    </div>

    <div class="container w-50">
        <form action="/login" method="post">
            @csrf
            <div class="mb-3">
                <label><h3>Email</h3></label>
                <input type="email" name="email" class="form-control" style="height: 80px;">
            </div>
            <div class="mb-3">
                <label><h3>Password</h3></label>
                <input type="password" name="password" class="form-control" style="height: 80px;">
            </div>
            <div class="text-center">
                <button type="submit" class="btn w-25"  style="background-color: #748cdc;"><h3>Login</h3></button>
            </div>
        </form>
    </div>

    <div class="container d-flex justify-content-evenly">
        <h4>do not have account?</h4>
        <a href="/register/{{ strtolower($login) }}"><h4>create account</h4></a>

    </div>
</div>
@endsection