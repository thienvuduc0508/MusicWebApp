@extends('layouts.app')
@section('content')
    <div class="container justify-content-center col-md-10">
        <form action="{{route('songs.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h1 class="text-center">Tạo Bài Nhạc Mới</h1>
            <div class="form-group">
                <input type="text" hidden name="user_id" value="{{$userId}}" class="form-control">
            </div>
            <div class="form-group">
                <label class="form-group">Tên Bài Hát</label>
                <input type="text" name="name" class="form-control">
                {{--                @if($errors->has('name'))--}}
                {{--                    <p class="alert-danger">--}}
                {{--                        {{$errors->first('name')}}--}}
                {{--                    </p>--}}
                {{--                @endif--}}
            </div>
            <div class="form-group">
                <label class="form-group">Lời Bài Hát</label>
                <textarea rows="4" cols="50" type="text" name="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label class="form-group">Ảnh</label>
{{--                <input type="file" name="image" class="form-control-file">--}}
                {{--                @if($errors->has('image'))--}}
                {{--                    <p class="alert-danger">--}}
                {{--                        {{$errors->first('image')}}--}}
                {{--                    </p>--}}
                {{--                @endif--}}
                <div class="form-group">
                    <input type="file"
                           onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                           class="form-control-file"
                           id="inputFile"
                           name="image"
                    >
                </div>
                <div class="form-group">
                    <img src="{{asset("storage/images/logomusic.jpg")}}"  class="rounded-circle"
                         width="100px" height="100 px" id="image">
                </div>

            </div>

            <div class="form-group">

                <label class="form-group">File Nhạc</label>
                {{--                <input type="file" name="audio" class="form-control-file">--}}
                {{--                @if($errors->has('audio'))--}}
                {{--                    <p class="alert-danger">--}}
                {{--                        {{$errors->first('audio')}}--}}
                {{--                    </p>--}}
                {{--                @endif--}}
                <div class="form-group">
                    <input type="file"
                           onchange="document.getElementById('audio').src = window.URL.createObjectURL(this.files[0])"
                           class="form-control-file"
                           id="inputFile"
                           name="audio"
                    >
                </div>
                <div>
                    <audio src="" controls="controls" id="audio"></audio>
                </div>
            </div>
            <div>
                <input type="submit" class="btn btn-success" value="Tạo Mới">
                <a href="{{route('songs.index')}}">
                    <input type="button" class="btn btn-secondary" value="Quay Lại">
                </a>
            </div>
        </form>
    </div>





@endsection
