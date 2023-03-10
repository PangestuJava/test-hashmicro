@extends('layouts.guest')

@section('slot')
@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<form method="POST" action="{{ route('password.store') }}">
    @csrf
    <!-- Password Reset Token -->
    <input type="hidden" name="token" value="{{ $request->route('token') }}">
    <div class="input-group mb-3">
        <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $request->email) }}"
            required autocomplete="email" placeholder="Email">
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
    <div class="input-group mb-3">
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required
            autocomplete="new-password" placeholder="Confirmation Password">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
        </div>
        <!-- /.col -->
        <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
        </div>
        <!-- /.col -->
    </div>
</form>
@endsection
