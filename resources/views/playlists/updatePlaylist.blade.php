@extends('layouts.app')
@section('content')
    <div class="row container offset-3">
        <form action="{{route('playlists.update', $playlist->id)}}" method="post"
              enctype="multipart/form-data">
            @csrf
            <h1 class="text-center">Cập nhật Playlist</h1>
            <div class="form-group">
                <label class="form-group">Tên Playlist</label>
                <input type="text" name="name" class="form-control" value="{{$playlist->name}}">
                @if($errors->has('name'))
                    <p class="alert-danger">
                        {{$errors->first('name')}}
                    </p>
                @endif
            </div>
            <div class="form-group">
                <label class="form-group">Mô tả</label>
                <textarea type="text" name="description" class="form-control">{{$playlist->description}}</textarea>

            </div>
                <div>
                    <input type="submit" class="btn btn-success" value="Cập nhật">
                    <a href="{{route('playlists.showPlaylists')}}">
                        <button class="btn btn-dark">
                            Quay Lại
                        </button>
                    </a>
                </div>

        </form>
    </div>
@endsection
