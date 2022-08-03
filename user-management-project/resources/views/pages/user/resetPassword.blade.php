@extends('layouts.app')

@section('content')
<div class="login-form">
    @if(Session::has('fail'))
    <div class="alert alert-danger container">
    {{ Session::get('fail') }}
    @php
        Session::forget('fail');
    @endphp
    </div>
    @endif
    <form action={{ route('user.passwordReset') }} method="POST">
        @csrf
        <h4 class="text-center">Password Reset</h4>
        <hr/>
        <div class="form-group mt-2 mb-2">
            <label   class="form-label">Current Password</label>
            <input type="password" name="currentPassword" value="{{ old('currentPassword') }}" class="form-control" >

            @if ($errors->has('currentPassword'))
            <span class="text-danger">{{ $errors->first('currentPassword') }}</span>
        @endif
        </div>
        <div class="form-group mt-2 mb-2">
            <label   class="form-label">New Password</label>
            <input type="password" name="password" value="{{ old('password') }}" class="form-control">
            @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
        </div>
        <div class="form-group mt-2 mb-2">
            <label   class="form-label">Current Password</label>
            <input type="password" name="cpassword" value="{{ old('cpassword') }}" class="form-control">
            @if ($errors->has('cpassword'))
            <span class="text-danger">{{ $errors->first('cpassword') }}</span>
        @endif
        </div>
        <div class="form-group mt-3 mb-2">
            <input type="submit" class="btn btn-primary btn-block" value="Reset Password"/>
        </div>

        <div class="form-group  mt-3 mb-2">
            <a href="/userProfile"><input type="button" class="btn btn-secondary btn-block " value="Back"></a>
        </div>
    </form>


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

