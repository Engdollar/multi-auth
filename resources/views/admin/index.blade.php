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
        <h6 class="display-4 text-center"> Hi Admin {{ auth()->user()->fName }}! <br> Welcome to your Dashboard </h6>

        @endif
        <hr>
        <h6 class="fw-normal text-left">Dashboard </h6>
    </div>
</div>
@endsection
