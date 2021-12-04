@extends('layouts.app')

@section('menu')
    @include('layouts.inc.mainMenu')
@endsection

@section('content')

<div class="row d-flex justify-content-center align-items-center mt-4"  >
    <div class="col-md-4 ">
        <div class="row">
            @if (Session::get('error'))
                <div class="alert alert-danger sm p-1 m-1" role="alert">
                    <small>  {{ Session::get('error') }} </small>
                </div>
            @endif

        </div>
        <div class="card shadow">
            <div class="card-header">
                <p class="pl-2 m-0"> Login with valid email and password </p>
            </div>
            <div class="card-body">
                <h3 class="text-center p-3 pb-0"> login to see more </h3 class="text-center p-3">
                    <p class="lh-sm text-muted text-center"> Try to access unlimited content
                        Discover new ideas </p>

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="row mt-2">
                        <div class="form-group">
                            <label for=""> Username or Email: </label>
                            <input type="email" name="email"  class="form-control @error('email')  is-invalid  @enderror">
                            @error('email')
                                 <span class="text-danger">  <small>{{ $message }}</small> </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="form-group">
                            <label for=""> Password: </label>
                            <input type="password" name="password"  id="" class="form-control @error('password')  is-invalid  @enderror  ">
                            @error('password')
                                    <span class="text-danger">  <small>{{ $message }}</small> </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-2 p-4">
                            <input type="submit" value="login" class="btn btn-outline-primary btn-block ">
                    </div>


                    <div class="row mt-2 text-center">
                       <p>  Don't you have account  <a href="{{ route('register') }}" class="link"> Sign-up</a> here </p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
