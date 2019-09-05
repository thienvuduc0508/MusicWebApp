@extends('layouts.app')
@section('content')
    <div class=" container offset-0 col-10">
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
            <fieldset class="form-group">
                <label class="form-group">Trạng thái</label>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="public" checked>
                            <label class="form-check-label" for="gridRadios1">
                                Công khai
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="private">
                            <label class="form-check-label" for="gridRadios2">
                                Riêng tư
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>
                <div>
                    <button type="submit" class="btn btn-success">Cap nhat</button>
                    <a href="{{route('playlists.showPlaylists')}}">
                        <button type="button" class="btn btn-dark">
                            Quay Lại
                        </button>
                    </a>
                </div>

        </form>
    </div>
@endsection
