@extends('layouts.app')

@section('content')

<div class="mt-3">
    <div class="card mb-2 mt-5 container">
        <div class="card-body">
            <h3 class="card-title fw-bold mb-0">Send Email</h3>
            <hr class='mt-3 mb-3' id="hr"/>
                <p class="card-text">
                    <form action={{ route("formtest.emailSend")}} method="Get">
                        <input type="submit" class="btn btn-primary" name="submit" value="Send Email" />
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


</style>
@endpush

@push('js')

@endpush
