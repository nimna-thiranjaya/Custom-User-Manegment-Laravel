@extends('layouts.app')

@section('content')
<div class="card mb-2 mt-4 container">
    <div class="card-body">
        <h3 class="card-title fw-bold mb-0">All Registered Users</h3>
        <div class="mt-3 mb-3">
            <a href="/userRegister"><button class="btn btn-primary"><span><i class="fa-solid fa-user-plus"></i> Add New User</span></button></a> &nbsp; <button onclick="history.go(0);" class="btn btn-secondary"><span><i class="fa-solid fa-arrows-rotate"></i> Refresh</span>  </button>
        </div>
        <hr class='mt-2 mb-2' id="hr"/>
            <p class="card-text">
                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <table class="table table-bordered table-striped mb-0">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">First Name</th>
                          <th scope="col">Last Name</th>
                          <th scope="col">DOB</th>
                          <th scope="col">Email</th>
                          <th scope="col">Gender</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($allusers as $key => $user )
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $user->fname }}</td>
                                <td>{{ $user->lname }}</td>
                                <td>{{ $user->dob }}</td>
                                <td>{{ $user->email }}</td>
                                {{-- <td>{{ $user->Gender }}</td> --}}
                                <td>
                                    @if ($user->Gender === 'Male')
                                        <span class="badge badge-success">Male</span>
                                    @else
                                        <span class="badge badge-warning">Female</span>

                                @endif
                            </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
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

    tr {
        text-align: center
    }

    .my-custom-scrollbar {
    position: relative;
    height: 400px;
    overflow: auto;
    }
    .table-wrapper-scroll-y {
    display: block;
    }
    .table-wrapper-scroll-x {
    display: block;
    }

</style>
@endpush
