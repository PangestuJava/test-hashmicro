@extends('layouts.guest')

@section('slot')
<p class="login-box-msg">Sign in to start your session</p>
@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show">
    <strong>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </strong>
</div>
@endif
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="input-group mb-3">
        <input type="email" id="email" name="email" class="form-control" :value="old('email')" required autofocus
            autocomplete="username" placeholder="Email">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="password" id="password" name="password" class="form-control" required
            autocomplete="current-password" placeholder="Password">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
        </div>
        <!-- /.col -->
        <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </div>
        <!-- /.col -->
    </div>
</form>

<div class="social-auth-links text-center mt-2 mb-3">
    <a href="/auth/google/redirect" class="btn btn-block btn-danger">
        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
    </a>
</div>
<!-- /.social-auth-links -->

<p class="mb-1">
    <a href="{{ route('password.request') }}">I forgot my password</a>
</p>
<p class="mb-0">
    <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
</p>
@endsection