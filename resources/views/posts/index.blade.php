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
            @if (session('success'))
            <div class="row">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Woooow!</strong> {{ session('success') }}.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif

            <div class="row ">
                <div class="col-md-12 d-flex justify-content-between mb-2">
                    <h4 > Posts </h4>
                    @can('create', \App\Models\post::class)
                         <a href="{{ route('posts.create') }}" class="btn btn-dark  px-4  "> New Post </a>
                    @endcan
                </div>
                <hr>
            </div>



            @if ($posts->count())

                @foreach ($posts as $post)
                <div class="row mt-3 mb-2" >
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="row ">
                                        <div class="col-md-12 d-flex justify-content-between">
                                                <h6 class="" > <span>Published at: {{ $post->created_at->diffForHumans() }} </span> </h6>
                                                <h6 class="text-right"> <span> Posted: {{ $post->user->fName }} </span>  </h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h6 class="" > <span>Updated at: {{ $post->updated_at->diffForHumans() }} </span> </h6>
                                        </div>
                                    </div>
                                    <p class="lead"> {{ $post->body }} </p>
                                    <hr>
                                    {{-- <p class="lead"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum quis sit, nostrum excepturi sapiente beatae harum. Necessitatibus, dolorem dignissimos, tempore minus blanditiis qui illum voluptatem repudiandae voluptatibus tenetur quae quos? </p> --}}
                                    <div class="col-md-12 d-flex justify-content-between">
                                        <div class="">
                                            <a href="{{ route('posts.show',$post->id) }}" class="btn btn-primary py-0 px-3"> Read more</a>
                                        </div>
                                        <div class=" text-right">


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
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

                <br>
                <hr>
                {{  $posts->links('pagination::bootstrap-4')  }}
                <hr>


            @else
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">
                            <h4 class="text-center text-primary"> Sorry there are no posts </h4>
                        </div>
                    </div>
                </div>
            @endif


        </div>
</div>

@endsection
