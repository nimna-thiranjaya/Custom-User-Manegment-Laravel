@extends('layouts.app')

@section('content')
    <h1>Home Page</h1>
@endsection

@push('css')
<style>
    h1{
    display: flex;
	min-height: 75vh;
	flex-direction: column;
	justify-content: center;
	align-items: center;
    }
</style>
@endpush
