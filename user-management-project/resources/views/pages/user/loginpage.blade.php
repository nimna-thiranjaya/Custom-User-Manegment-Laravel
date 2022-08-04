@extends('layouts.appnormal')

@section('content')
<div class="login-form">
    @if(Session::has('fail'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ Session::get('fail') }}
        @php
            Session::forget('fail');
        @endphp
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form action={{ route('user.userlogin') }} method="POST">
        @csrf
        <h2 class="text-center">Log in</h2>
        <div class="form-group mt-2 mb-4">
            <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
            @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
        </div>
        <div class="form-group mt-2 mb-4">
            <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Password">
            @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
        </div>
        <div class="form-group mt-2 mb-2">
            <input type="submit" class="btn btn-primary btn-block" value="Login" />
        </div>
    </form>
    <div class="form-group  mb-2">
        <a href="/userRegister"><button class="btn btn-secondary btn-block">User Register</button></a>
    </div>

</div>
@endsection

@push('css')
<style>
.login-form {
    width: 340px;
    margin: 50px auto;
  	font-size: 15px;
    margin: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);

}
.login-form form {
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.btn {
    font-size: 15px;
    font-weight: bold;
    text-align: center;
}
</style>
@endpush

