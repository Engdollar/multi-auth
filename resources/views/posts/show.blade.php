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
            <div class="row ">
                <div class="col-md-12 d-flex justify-content-between mb-2">
                    <h4 > Posts </h4>
                    <a href="{{ route('posts.create') }}" class="btn btn-dark  px-4  "> Add Post </a>
                </div>
                <hr>
            </div>




                <div class="row mt-3 mb-2" >
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 ">

                                    <p class="lead"> {{ $post->body }} </p>
                                    <hr>
                                    <div class="row ">
                                        <div class="col-md-12 d-flex justify-content-between">
                                                <h6 class="" > <span>Published at: {{ $post->created_at->diffForHumans() }} </span> <br>
                                                    <span > Updated at: </span> {{ $post->updated_at->diffForHumans() }}

                                                </h6>
                                                <h6 > <span class="ml-1 mr-1"> Posted: </span> {{ $post->user->fName }} <br>
                                                     <span class="ml-1 mr-1"> Email: </span> {{ $post->user->email }}
                                                 </h6>
                                        </div>

                                    </div>
                                    {{-- <p class="lead"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum quis sit, nostrum excepturi sapiente beatae harum. Necessitatibus, dolorem dignissimos, tempore minus blanditiis qui illum voluptatem repudiandae voluptatibus tenetur quae quos? </p> --}}
                                    <div class="row ">
                                        <div class="col-md-12 d-flex justify-content-between">
                                            <a href="{{ route('posts.index') }}" class="btn btn-outline-info py-0 px-3">Back</a>

                                            <div>
                                                <form class="form-inline" action="{{ route('posts.destroy',$post->id) }}" method="post">
                                                    @can('update', $post)
                                                    <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-outline-dark py-0 px-3">Edit</a>
                                                    @endcan
                                                    @can('delete', $post)


                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-danger py-0 px-3" type="submit">Delete</button>
                                                    @endcan
                                                </form>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


        </div>
</div>

@endsection
