@extends('layout.main')

@section('content')
@include('sweetalert::alert')
<div class="card card-custom gutter-b">
    <div class="card-body ">
        <div class="d-flex">
            <!--begin::Pic-->
            <div class="flex-grow-1">
                <form action="" method="get">
                    <div class="form-group mt-3">
                        <div class="input-group">
                            <input type="text" name="hashtag" class="form-control" placeholder="Cari Hashtag #" value="{{\Request::get('hashtag')}}" />
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="submit">Cari Hashtag</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@if((count($posts) <= 0 && count($comments) <=0) && Request::get('hashtag') !='' ) 
<div class="card card-custom gutter-b">
    <div class="card-body ">
        <p class="text-center">Hasil tidak ditemukan</p>
    </div>
</div>
@endif
@if(count($posts) > 0 || count($comments) > 0)
    <div class="card card-custom gutter-b">
        <div class="card-body ">
            <ul class="nav nav-tabs nav-tabs-line nav-tabs-danger font-weight-bolder">
                <li class="nav-item">
                    <a class="nav-link active " data-toggle="tab" href="#kt_tab_pane_1">Postingan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2">Komentar</a>
                </li>
            </ul>
            <div class="tab-content mt-5" id="myTabContent">
                <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel" aria-labelledby="kt_tab_pane_1">
                    @foreach($posts as $post)
                    <div class="d-flex">
                        <!--begin::Pic-->
                        <div class="flex-shrink-0 mr-7">
                            <div class="symbol symbol-50 symbol-lg-60 symbol-circle symbol-primary">
                                <span class="symbol-label font-weight-bolder font-size-h2">{{$post->UserModel->initialName()}}</span>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
                                <div class="mr-3">
                                    <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{$post->UserModel->name}}</a>
                                </div>
                            </div>
                            <a href="/post/{{$post->id}}">
                                <div class="d-flex align-items-center flex-wrap justify-content-between">
                                    <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">{{$post->text}}
                                    </div>

                                </div>

                            </a>
                        </div>
                    </div>

                    <div class="col-sm-12 mx-5 mt-5">
                        @if(!empty($post->picture))
                        <img src="{{asset('/img/'.$post->picture)}}" alt="" width="100%">
                        @endif
                    </div>
                    <div class="separator separator-solid my-7"></div>
                    @endforeach
                </div>

                <div class="tab-pane fade show" id="kt_tab_pane_2" role="tabpanel" aria-labelledby="kt_tab_pane_1">
                    @foreach($comments as $comment)
                    <div class="d-flex">
                        <!--begin::Pic-->
                        <div class="flex-shrink-0 mr-7">
                            <div class="symbol symbol-50 symbol-lg-60 symbol-circle symbol-primary">
                                <span class="symbol-label font-weight-bolder font-size-h2">{{$comment->UserModel->initialName()}}</span>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
                                <div class="mr-3">
                                    <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{$comment->UserModel->name}}</a>
                                    <p href="#" class="d-flex align-items-center text-dark font-size-sm font-weight-bold mr-3 text-muted">Komentar dari Postingan &nbsp; <a href="/post/{{$comment->PostModel->id}}">{{$comment->PostModel->UserModel->name}}</a></p>
                                </div>
                            </div>
                            <a href="/post/{{$comment->PostModel->id}}">
                                <div class="d-flex align-items-center flex-wrap justify-content-between">
                                    <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">{{$comment->text}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-12 mx-5 mt-5">
                        @if(!empty($comment->picture))
                        <img src="{{asset('/img/'.$post->picture)}}" alt="" width="100%">
                        @endif
                    </div>
                    <div class="separator separator-solid my-7"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @endif
    @endsection