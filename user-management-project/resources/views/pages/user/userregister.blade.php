@extends('layouts.appnormal')

@section('content')


<div class="card mb-2 mt-5 container">
    <div class="card-body">
        <h3 class="card-title fw-bold mb-0">User Registration</h3>
        <hr class='mt-3 mb-3' id="hr"/>
            <p class="card-text">
                @if(Session::has('success'))
                <div class="alert alert-success container">
                    {{ Session::get('success') }}
                    @php
                        Session::forget('success');
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
                <form action={{ route('user.register') }} method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label   class="form-label">First Name</label>
                            <input name="fname" value="{{ old('fname') }}" type="text" class="form-control" >
                            @if ($errors->has('fname'))
                                <span class="text-danger">{{ $errors->first('fname') }}</span>
                            @endif
                          </div>
                          <div class="col-md-6">
                            <label  class="form-label">Last Name</label>
                            <input name="lname" type="text" value="{{ old('lname') }}" class="form-control" >
                            @if ($errors->has('lname'))
                                <span class="text-danger">{{ $errors->first('lname') }}</span>
                            @endif
                          </div>
                      </div>

                      <div class="row g-3 mt-0">
                        <div class="col-md-12">
                            <label   class="form-label">Email</label>
                            <input name="email" type="text" value="{{ old('email') }}" class="form-control" >
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                      </div>

                      <div class="row g-3 mt-0">
                        <div class="col-md-6">
                            <label   class="form-label">Date Of Birth</label>
                            <input name="dob" type="date" value="{{ old('dob') }}" class="form-control" >
                            @if ($errors->has('dob'))
                                <span class="text-danger">{{ $errors->first('dob') }}</span>
                            @endif
                          </div>
                          <div class="col-md-6">
                            <label   class="form-label">Gender</label>
                            <select name="Gender" value="{{ old('Gender') }}" class="form-control" >
                                <option disabled selected>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            @if ($errors->has('Gender'))
                                <span class="text-danger">{{ $errors->first('Gender') }}</span>
                            @endif
                          </div>
                      </div>

                      <div class="row g-3 mt-0">
                        <div class="col-md-6">
                            <label  class="form-label" >Password</label>
                            <input name="password"  type="Password" class="form-control" >
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                          </div>
                          <div class="col-md-6">
                            <label  class="form-label">Confirm Pasword</label>
                            <input type="password"  name="cpassword" class="form-control" >
                            @if ($errors->has('cpassword'))
                                <span class="text-danger">{{ $errors->first('cpassword') }}</span>
                            @endif
                          </div>
                      </div>
                      <div class=" d-flex justify-content-center mt-4 " >
                          <input type="submit" class="btn btn-primary" value="Submit" id="regbtn"/>  &nbsp; &nbsp; <input type="button"  class="btn btn-secondary" value="Back" id="regbtn"/>
                      </div>

                </form>
            </p>
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

    #regbtn{
        width:40%
    }
</style>
@endpush
