@extends('layouts.app')
@section('content')
    <div class="row container mt-5 row justify-content-center">
        <form action="{{route('songs.update',$song->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <h1 class="text-center">Chỉnh Sửa Bài Viết</h1>

            <div class="form-group">
                <label class="form-group">Tên Bài Hát</label>
                <input type="text" name="name" class="form-control" value="{{$song->name}}">
                                @if($errors->has('name'))
                                    <p class="alert-danger">
                                        {{$errors->first('name')}}
                                    </p>
                                @endif
            </div>
            <div class="form-group">
                <label class="form-group">Lời Bài Hát</label>
                <textarea rows="4" cols="50" type="text" name="description" class="form-control" >{{$song->description}}</textarea>
            </div>
            <div class="form-group">
                <label class="form-group">Ảnh</label>
                                 @if($errors->has('image'))
                                    <p class="alert-danger">
                                        {{$errors->first('image')}}
                                    </p>
                                @endif
                <div class="form-group">
                    <input type="file"
                           onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                           class="form-control-file"
                           id="inputFile"
                           name="image"
                    >
                </div>
                <div class="form-group">
                    <img src="{{asset("storage/".$song->image)}}"  class="rounded-circle"
                         width="100px" height="100 px" id="image">
                </div>

            </div>

            <div class="form-group">

                <label class="form-group">File Nhạc</label>
                                @if($errors->has('audio'))
                                    <p class="alert-danger">
                                        {{$errors->first('audio')}}
                                    </p>
                                @endif
                <div class="form-group">
                    <input type="file"
                           onchange="document.getElementById('audio').src = window.URL.createObjectURL(this.files[0])"
                           class="form-control-file"
                           id="inputFile"
                           name="audio"
                    >
                </div>
                <div>
                    <audio src="{{asset("storage/".$song->audio)}}" controls id="audio"></audio>
                </div>
            </div>
            <div>
                <input type="submit" class="btn btn-success" value="Chỉnh Sửa">
                <a href="{{route('songs.index')}}">
                    <input type="button" class="btn btn-secondary" value="Quay Lại">
                </a>
            </div>
        </form>
    </div>
@endsection
