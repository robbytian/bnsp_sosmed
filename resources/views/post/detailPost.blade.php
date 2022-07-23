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
                    <img alt="Pic" src="{{\App\Models\User::getPicture($post->user_id) != '' ? \App\Models\User::getPicture($post->user_id) : '/img/blank.png'}}" />
                </div>
            </div>
            <div class="flex-grow-1">
                <div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
                    <div class="mr-3">
                        <a href="javascript:void(0)" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{$post->UserModel->name}}</a>
                    </div>
                    @if($post->user_id == Auth::id())
                    <div class="mr-3">
                        <div class="dropdown dropdown-inline ml-2">
                            <a href="#" class="btn btn-fixed-height btn-outline-secondary btn-text-dark-50 btn-icon-primary font-weight-bolder font-size-sm px-5 my-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="ki ki-bold-more-hor">
                                    <!--end::Svg Icon-->
                                </span></a>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right p-0 m-0">
                                <!--begin::Navigation-->
                                <ul class="navi navi-hover">
                                    <li class="navi-item">
                                        <a href="javascript:void(0)" class="navi-link editPost" data-id="{{$post->id}}" data-text="{{$post->text}}" data-file="" data-image="">
                                            <span class="navi-text">Edit</span>
                                        </a>
                                        <a href="javascript:void(0)" class="navi-link deletePost" data-id="{{$post->id}}">
                                            <span class="navi-text">Delete</span>
                                        </a>
                                    </li>

                                </ul>
                                <!--end::Navigation-->
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <a href="/post/{{$post->id}}">
                    <div class="d-flex align-items-center flex-wrap justify-content-between">
                        <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">{{$post->text}}
                        </div>
                    </div>
                    @if(!empty($post->file))
                    <div class="d-flex align-items-center flex-wrap justify-content-between">
                        <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">
                            <a href="{{asset('file/'.$post->file)}}">{{asset('file/'.$post->file)}}</a>
                        </div>
                    </div>
                    @endif
                </a>
            </div>
        </div>

        <div class="col-sm-12 mx-5 mt-5">
            @if(!empty($post->picture))
            <img src="{{asset('/img/'.$post->picture)}}" alt="" width="100%">
            @endif

            @if($post->CommentModel->count() > 0)
            @foreach($post->CommentModel as $comment)
            <div class="d-flex mt-5">
                <!--begin::Pic-->
                <div class="flex-shrink-0 mr-7">
                    <div class="symbol symbol-50 symbol-lg-40 symbol-circle symbol-primary">
                        <img alt="Pic" src="{{\App\Models\User::getPicture($comment->user_id) != '' ? \App\Models\User::getPicture($comment->user_id) : '/img/blank.png'}}" />

                    </div>
                </div>
                <div class="flex-grow-1">
                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <div class="mr-3">
                            <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{$comment->UserModel->name}}</a>
                        </div>

                        @if($comment->user_id == Auth::id())
                        <div class="mr-3">
                            <div class="dropdown dropdown-inline ml-2">
                                <a href="#" class="btn btn-fixed-height btn-outline-secondary btn-text-dark-50 btn-icon-primary font-weight-bolder font-size-sm px-5 my-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="ki ki-bold-more-hor">
                                        <!--end::Svg Icon-->
                                    </span></a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right p-0 m-0">
                                    <!--begin::Navigation-->
                                    <ul class="navi navi-hover">
                                        <li class="navi-item">
                                            <a href="javascript:void(0)" class="navi-link editComment" data-id="{{$comment->id}}" data-text="{{$comment->text}}">
                                                <span class="navi-text">Edit</span>
                                            </a>
                                            <a href="javascript:void(0)" class="navi-link deleteComment" data-id="{{$comment->id}}">
                                                <span class="navi-text">Delete</span>
                                            </a>
                                        </li>

                                    </ul>
                                    <!--end::Navigation-->
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="d-flex align-items-center flex-wrap justify-content-between">
                        <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">{{$comment->text}}
                        </div>
                    </div>
                    @if(!empty($comment->file))
                    <div class="d-flex align-items-center flex-wrap justify-content-between">
                        <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">
                            <a href="{{asset('file/'.$comment->file)}}">{{asset('file/'.$comment->file)}}</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-sm-12 mx-5 mt-5">
                @if(!empty($comment->picture))
                <img src="{{asset('/img/'.$comment->picture)}}" alt="" width="100%">
                @endif
            </div>
            @endforeach
            @endif
            <div class="col-sm-12 mx-5 mt-5">
                <form action="/post/{{$post->id}}/comment" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-3">
                        <div class="input-group">
                            <input type="text" name="comment" class="form-control" placeholder="Komentar..." required />
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="submit">Kirim</button>
                            </div>
                        </div>
                        <label for="image2" class="mt-2">
                            <i class="fa fa-image"></i>
                            <input type="file" id="image2" name="image" style="display: none" accept="image/*" data-original-title="upload photos">
                        </label>
                        <label for="file2" class="mt-2 ml-2">
                            <i class="fa fa-file"></i>
                            <input type="file" id="file2" name="file" style="display: none">
                        </label>
                    </div>
                </form>
            </div>
        </div>
        <div class="separator separator-solid my-7"></div>
    </div>
</div>
<div class="modal fade" id="deletePostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" id="formDeletePost">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Postingan</h5>
                </div>
                <div class="modal-body">
                    <p>Anda yakin akan menghapus postingan ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="deleteCommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" id="formDeleteComment">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Comment</h5>
                </div>
                <div class="modal-body">
                    <p>Anda yakin akan menghapus komentar ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="editPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" id="formEditPost" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Postingan</h5>
                </div>
                <form action="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Text</label>
                            <textarea class="form-control" name="text_post" id="textPost" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="image" accept="image/*" class="form-control"></input>
                        </div>
                        <div class="form-group">
                            <label for="">File</label>
                            <input type="file" name="file" class="form-control"></input>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="editCommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" id="formEditComment" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Komentar</h5>
                </div>
                <form action="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Text</label>
                            <textarea class="form-control" name="comment" id="textComment"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="image" accept="image/*" class="form-control"></input>
                        </div>
                        <div class="form-group">
                            <label for="">File</label>
                            <input type="file" name="file" class="form-control"></input>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).on('click', '.deletePost', function() {
        $('#formDeletePost').prop('action', `/post/${$(this).attr('data-id')}`)
        $('#deletePostModal').modal('show');
    });

    $(document).on('click', '.deleteComment', function() {
        $('#formDeleteComment').prop('action', `/comment/${$(this).attr('data-id')}`)
        $('#deleteCommentModal').modal('show');
    })

    $(document).on('click', '.editPost', function() {
        $('#formEditPost').prop('action', `/post/${$(this).attr('data-id')}`)
        $('#textPost').val($(this).attr('data-text'));
        $('#editPostModal').modal('show');
    })

    $(document).on('click', '.editComment', function() {
        $('#formEditComment').prop('action', `/comment/${$(this).attr('data-id')}`)
        $('#textComment').val($(this).attr('data-text'));
        $('#editCommentModal').modal('show');
    })

    $(document).on('click', '.editComment', function() {
        $('#editCommentModal').modal('show');
    })
</script>
@endsection