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
                            <a href="{{ route('posts.index') }}" class="btn btn-outline-info py-0 px-3">Back</a>
                            <h5> Welcome to posts page, what is in your mind? </h5>
                            <hr>
                            <form action="{{ route('posts.update',$post->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card shadow">
                                    <div class="form-floating mb-2 p-2">
                                        <textarea  name="body" class="form-control py-2 px-2  @error('body') is-invalid  @enderror" style="height: 150px" id="floatingTextarea">{{ $post->body }}
                                        </textarea>
                                        @error('body')
                                            <span class="text-danger p-2 m-2"> <small> {{ $message }} </small> </span>
                                        @enderror
                                      </div>

                                    <div class="col-12">
                                         <button class="btn btn-outline-primary px-4 m-1"  type="submit" > Update </button>
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
