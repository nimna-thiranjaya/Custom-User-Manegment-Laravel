@extends('layouts.app')

@section('content')

<div class="mt-3">
    @if(Session::has('success'))
                <div class="alert alert-success container">
                    {{ Session::get('success') }}
                    @php
                        Session::forget('success');
                    @endphp
                </div>
        @endif


        @if(Session::has('passSuccess'))
            <div class="alert alert-success container">
                {{ Session::get('passSuccess') }}
                @php
                    Session::forget('passSuccess');
                    session()->remove("Authorization");
                    header("refresh:2;url=/");
                @endphp
            </div>
        @endif

        @if(Session::has('fail'))
        <div class="alert alert-danger container">
            {{ Session::get('fail') }}
            @php
                Session::forget('fail');
            @endphp
        </div>
        @endif
</div>
<div class="card mb-2 mt-4 container">
    <div class="card-body">
        <h3 class="card-title fw-bold mb-0">User Profile</h3>
        <hr class='mt-2 mb-2' id="hr"/>
            <p class="card-text">
                <p>First Name : {{ $userInfor['fname'] }}</p>
                <p>Last Name : {{ $userInfor['lname'] }}</p>
                <p>Date Of Birth : {{ $userInfor['dob'] }}</p>
                <p>Email : {{ $userInfor['email'] }}</p>
                <p>Gender : {{ $userInfor['Gender'] }}</p>
            </p>
            <div class=" d-flex justify-content-center mt-4 " >
                <button class="btn btn-secondary" onclick="window.location = '{{ route('updateUser') }}'">Update Account</button> &nbsp;
                <button class="btn btn-danger" onclick="window.location = '{{ route('user.userdelete') }}'">Delete Account</button> &nbsp;
                <button class="btn btn-warning" onclick="window.location = '{{ route('resetPassword') }}'">Password Reset</button>
            </div>
        </div>
</div>
@endsection

@push('css')
<style>
    .card {
    width: 90%;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

    #hr {
        height: 4px;
    }
</style>
@endpush
