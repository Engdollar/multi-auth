@extends('layouts.app')

@section('menu')
    @include('layouts.inc.dashboarMenus')
@endsection

@section('content')
<div class="row d-flex justify-content-center mt-4">
    <div class="col-md-8">
        @if (Session::get('success'))
        <div class="alert alert-success sm p-1 m-1" role="alert">
            <small>  {{ Session::get('success') }} </small>
        </div>
        @else
        <h1 class="display-4 text-center"> Hi user {{ auth()->user()->fName }}! Welcome to your Dashboard </h1>
        @endif
        <hr>
        <h1 class="fw-normal text-center">Dashboard </h1>
    </div>
</div>
@endsection
