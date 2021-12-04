@extends('layouts.app')

@section('menu')
    @include('layouts.inc.mainMenu')
@endsection

@section('content')

<div class="row d-flex justify-content-center align-items-center " style="height: 400px;" >

    <div class="col-md-3">
        <img src="{{ asset('logo.png') }}" alt="" class="img-fluid"  >
    </div>

    <div class="col-md-6 ">
        <h1 class="display-4 text-center"> Welcome to Multi-Auth System </h1>
        <p class="sm-text"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum soluta aliquam, doloremque excepturi provident neque quas optio laudantium id placeat minima repellendus dolore? Ea soluta necessitatibus numquam vero officiis expedita! </p>
        <a href="" class="btn btn-outline-primary "> Read More </a>
    </div>
</div>

@endsection
