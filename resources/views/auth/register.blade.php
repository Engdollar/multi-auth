@extends('layouts.app')

@section('menu')
    @include('layouts.inc.mainMenu')
@endsection

@section('content')

<div class="row d-flex justify-content-center align-items-center mt-4"  >
    <div class="col-md-6 ">
        @if (Session::get('error'))
        <div class="alert alert-danger sm p-1 m-1" role="alert">
            <small>  {{ Session::get('error') }} </small>
        </div>
        @endif
        <div class="card shadow">
            <div class="card-header bg-dark text-light">
                <p class="pl-2 m-0"> Register with valid email  </p>
            </div>
            <div class="card-body">
                <h3 class="text-center p-3 pb-0"> User registration </h3 class="text-center p-3">
                    <p class="lh-sm text-muted text-center"> Try to access unlimited content
                        Discover new ideas </p>
                <form action="{{ route('register') }}" method="post">
                    @csrf

                    <div class="row mt-2">
                        <div class="col">
                            <div class="form-group">
                                <label for=""> First Name: </label>
                                <input type="text" name="FirstName" value="{{ old('FirstName') }}" id="" class="form-control  @error('FirstName')  is-invalid @enderror">
                               @error('FirstName')
                                   <span class="text-danger">  <small>{{ $message }}</small> </span>
                               @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for=""> Last Name: </label>
                                <input type="text" name="lastName" value="{{ old('lastName') }}" id="" class="form-control @error('lastName')  is-invalid   @enderror">
                                @error('lastName')
                                <span class="text-danger">  <small>{{ $message }}</small> </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="form-group">
                            <label for=""> Username or Email: </label>
                            <input type="email" name="email" value="{{ old('email') }}" id="" class="form-control @error('email')  is-invalid   @enderror">
                            @error('email')
                                <span class="text-danger">  <small>{{ $message }}</small> </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col">
                            <div class="form-group">
                                <label for=""> Password: </label>
                                <input type="password" name="password"  id="" class="form-control @error('password')  is-invalid   @enderror">
                                @error('password')
                                        <span class="text-danger">  <small>{{ $message }}</small> </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for=""> Confirm Password: </label>
                                <input type="password" name="confirmpassword"  id="" class="form-control @error('confirmpassword')  is-invalid   @enderror">
                                @error('confirmpassword')
                                     <span class="text-danger">  <small>{{ $message }}</small> </span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="row mt-2 p-4">
                            <input type="submit" value="register" class="btn btn-outline-primary btn-block ">
                    </div>


                    <div class="row mt-2 text-center">
                       <p>   you have account  <a href="{{ route('login') }}" class="link"> Sign-in</a> here </p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
