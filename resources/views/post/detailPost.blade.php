@extends('layout.main')

@section('content')
@include('sweetalert::alert')
<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
    <li class="breadcrumb-item text-muted">
        <a href="javascript:history.back()" class="text-muted">
            < Kembali</a>
    </li>
</ul>
<div class="card card-custom gutter-b">
    <div class="card-body ">
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
                @foreach($post->tags()->get() as $tag)
                <label for=""><a href="/post/explore?hashtag={{$tag->name}}">{{'#'.$tag->name}}</a></label>
                @endforeach
            </div>
        </div>

        <div class="col-sm-12 mx-5 mt-5">
            @if(!empty($post->picture))
            <img src="{{asset('/img/'.$post->picture)}}" alt="" width="100%">
            @endif

            @if($post->CommentModel->count() > 0)
            @foreach($post->CommentModel as $comment)
            <div class="d-flex mt-3">
                <!--begin::Pic-->
                <div class="flex-shrink-0 mr-7">
                    <div class="symbol symbol-50 symbol-lg-40 symbol-circle symbol-primary">
                        <span class="symbol-label font-weight-bolder font-size-h2">{{Str::substr($comment->UserModel->name,0,1)}}</span>
                    </div>
                </div>
                <div class="flex-grow-1">
                    <div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
                        <div class="mr-3">
                            <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{$comment->UserModel->name}}</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center flex-wrap justify-content-between">
                        <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">{{$comment->text}}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
            <form action="/post/{{$post->id}}/comment" method="post">
                @csrf
                <div class="form-group mt-3">
                    <div class="input-group">
                        <input type="text" name="comment" class="form-control" placeholder="Komentar..." />
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="submit">Kirim</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="separator separator-solid my-7"></div>
    </div>
</div>
@endsection