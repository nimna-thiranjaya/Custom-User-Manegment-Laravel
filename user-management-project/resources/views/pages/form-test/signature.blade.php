@extends('layouts.app')

@section('content')

<div class="mt-3">
    <div class="card mb-2 mt-5 container">
        <div class="card-body">
            <h3 class="card-title fw-bold mb-0">Add Your Digital Signature Here</h3>
            <hr class='mt-3 mb-3' id="hr"/>
                <p class="card-text">
                    <form method="POST" action="{{ route('formtest.saveSignature') }}">
                        @csrf


                            <div class="col-md-12 mb-3">
                                <label   class="form-label">Full Name</label>
                                <input name="name" type="text" value="{{ old('name') }}" class="form-control" >
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>


                        <div class="col-md-12">
                            <label class="" for="">Draw Signature:</label>
                            <br/>
                            <div id="sig"></div>
                            <br>
                            <button class="btn btn-success">Save Signature</button> &nbsp; <button id="clear" class="btn btn-danger">Clear Signature</button>

                            <textarea id="signature" name="signed" style="display: none"></textarea>
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

    .kbw-signature {
        width: 40%;
        height: 200px;
    }
    #sig canvas{
        width: 100% !important;
        height: auto;
        border: black solid 3px;
    }
</style>
@endpush

@push('js')
<script type="text/javascript">
    var sig = $('#sig').signature({syncField: '#signature', syncFormat: 'PNG'});
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature").val('');
    });
</script>

@endpush
