@extends('layouts.app')

@section('menu')

@guest
    @include('layouts.inc.mainMenu')
@else
    @include('layouts.inc.dashboarMenus')
@endguest

@endsection

@section('content')

<div class="row d-flex justify-content-center align-items-center "  >
        <div class="col-md-8 mt-4 mb-4">

            @auth

            @if (auth())
                <div class="row " style="margin-bottom: 100px;">
                        <div class="col-md-12">
                            <h5> Welcome to posts page, what is in your mind? </h5>
                            <hr>
                            <form action="{{ route('posts.store') }}" method="POST">
                                @csrf
                                <div class="card shadow">
                                    <div class="form-floating mb-2 p-2">
                                        <textarea  name="body" class="form-control py-2 px-2  @error('body') is-invalid  @enderror" style="height: 150px" value="{{ old('body') }}"  placeholder="What is in your mind" id="floatingTextarea"></textarea>
                                        <label for="floatingTextarea">What is in your mind</label>
                                        @error('body')
                                            <span class="text-danger p-2 m-2"> <small> {{ $message }} </small> </span>
                                        @enderror
                                      </div>

                                    <div class="col-12">
                                         <button class="btn btn-outline-primary px-4 m-1"  type="submit" > post </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                </div>
            @endif
            @endauth



        </div>
</div>

@endsection
