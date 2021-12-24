@extends('auth.layouts.app')

@section('title', 'Registration Area')

@push('css')
<style>
    body {
        background: #d2d6de;
        font-family: 'Source Sans Pro', 'Helvetica Neue', Arial, sans-serif,  Open Sans;
        font-size: 14px;
        line-height: 1.42857;
        height: 350px;
        padding: 0;
        margin: 0;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        font-weight: 400;
        overflow-x: hidden;
        overflow-y: auto;
    }

.login-box, .register-box {
    width: 360px;
    margin: 7% auto;
}

</style>
@endpush

@section('content')
<div class="row text-center justify-content-center">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="login-logo">
            <a href="{{ route('dashboard') }}">
                <h3>Royal Hotel</h3>
            </a>
        {{-- <a class="navbar-brand logo_h" href="index.html"><img src="image/Logo.png" alt="" width="200px"></a> --}}
        </div>
        <div class="card">
        <div class="card-body login-card-body">
            <h3>Sign Up Account</h3>
            <p class="login-box-msg">
                @if (session()->has('error.alert'))
                    <div class="alert alert-danger alert-dismissible text-left">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ session('error.alert') }}
                    </div>
                @endif
            </p>
            
            <form action="{{ route('registration') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Nama" autofocus="on" autocomplete="off" required>
                </div>
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" autofocus="on" autocomplete="off" required>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>                        
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmation password" required>                        
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="phone" class="form-control" placeholder="Phone" autofocus="on" autocomplete="off" required>
                </div>
                <div class="row mb-3">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Register Now!</button>
                    </div>
                <!-- /.col -->
                </div>
            </form>
            <!-- /.social-auth-links -->
            <div class="login mb-0">
                Already have an account? ? <a href="{{ route('login') }}">Sign In <span class="fa fa-arrow-right"></span></a>
            </div>
        </div>
<!-- /.login-card-body -->
        </div>
    </div>
</div>
@endsection