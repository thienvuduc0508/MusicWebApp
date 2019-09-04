@extends('layouts.app')
@section('content')

    <h1 class="text-center text-capitalize">Những bài hát trong playlist {{$playlist->name}}</h1>
    @if(count($songs)==0)
        <div class="container alert alert-warning">Playlist {{$playlist->name}} chưa có bài hát nào</div>
    @endif
    <div class="container">
        <button class="btn btn-success mb-3" id="listen-all-playlist">Nghe Toàn Bộ PlayList</button>
        <div class="row">
            <div class="col-md-9 content_left ">
                <div class="row text-center">
                    @foreach($songs as $song)
                        <div class="col-3 mb-5" id="song">
                            <div class="container-img">
                                @if(Auth::id() == $playlist->user_id)
                                    <div>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-outline-primary btn-lg btn-block btn-sm"
                                                data-toggle="modal"
                                                data-id="{{ $song->id }}" data-target="#exampleModal{{$song->id}}">
                                            Xóa
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$song->id}}" tabindex="-1"
                                             role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h6>Bạn có chắc chắn muốn xóa bài hát: {{$song->name}}</h6>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="">
                                                            <button type="button" class="btn btn-danger">Xóa</button>
                                                        </a>
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Đóng
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                        {{$songs->links()}}
                </div>
            </div>
        </div>
    </div>
    @endsection
