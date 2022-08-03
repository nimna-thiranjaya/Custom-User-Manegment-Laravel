@extends('layouts.app')

@section('content')


<div class="card mb-2 mt-5 container">
    <div class="card-body">
        <h3 class="card-title fw-bold mb-0">User Account Update</h3>
        <hr class='mt-3 mb-3' id="hr"/>
            <p class="card-text">
                <form action={{ route('user.userUpdate') }} method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label   class="form-label">First Name</label>
                            <input name="fname" value="{{ $userInfor['fname'] }}" type="text" class="form-control" >
                            @if ($errors->has('fname'))
                                <span class="text-danger">{{ $errors->first('fname') }}</span>
                            @endif
                          </div>
                          <div class="col-md-6">
                            <label  class="form-label">Last Name</label>
                            <input name="lname" type="text" value="{{ $userInfor['lname'] }}" class="form-control" >
                            @if ($errors->has('lname'))
                                <span class="text-danger">{{ $errors->first('lname') }}</span>
                            @endif
                          </div>
                      </div>

                      <div class="row g-3 mt-0">
                        <div class="col-md-12">
                            <label   class="form-label">Email</label>
                            <input name="email" type="text" value="{{ $userInfor['email'] }}" class="form-control" readonly>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                      </div>

                      <div class="row g-3 mt-0">
                        <div class="col-md-6">
                            <label   class="form-label">Date Of Birth</label>
                            <input name="dob" type="date" value="{{ $userInfor['dob'] }}" class="form-control" >
                            @if ($errors->has('dob'))
                                <span class="text-danger">{{ $errors->first('dob') }}</span>
                            @endif
                          </div>
                          <div class="col-md-6">
                            <label   class="form-label">Gender</label>
                            <select name="Gender" value="{{ $userInfor['Gender'] }}" class="form-control" >
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            @if ($errors->has('Gender'))
                                <span class="text-danger">{{ $errors->first('Gender') }}</span>
                            @endif
                          </div>
                      </div>
                      <div class=" d-flex justify-content-center mt-5 " >
                          <input type="submit" class="btn btn-primary" value="Update Account" id="regbtn"/>  &nbsp; &nbsp;
                           <a  href="/userProfile" class="btn btn-secondary" id="regbtn"> Back</a>
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
