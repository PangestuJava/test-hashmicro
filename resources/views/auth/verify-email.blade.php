@extends('layouts.guest')

@section('slot')
<p class="login-box-msg">
    Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just
    emailed to you? If you didn\'t receive the email, we will gladly send you another.
</p>

@if (session('status') == 'verification-link-sent')
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
</div>
@endif

<form method="POST" action="{{ route('verification.send') }}">
    @csrf

    <div class="row">
        <div class="col-8">
            <button type="submit" class="btn btn-primary btn-block">Resend Verification Email</button>
        </div>
</form>
<!-- /.col -->
<div class="col-4">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-secondary btn-block">
            Log Out
        </button>
    </form>
</div>
<!-- /.col -->
</div>
@endsection