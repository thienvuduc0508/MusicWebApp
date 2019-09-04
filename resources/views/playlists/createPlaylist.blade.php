@extends('layouts.app')
@section('content')
    <div class="container offset-0 col-10">
        <form action="{{route('playlists.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h1 class="text-center">Tạo Playlist Mới</h1>
            <div class="form-group">
                <div class="form-group">
                    <input type="text" hidden name="user_id" value="{{Auth::id()}}" class="form-control">
                </div>
                <div>
                    <label class="form-group">Tên Playlist</label>
                    <input type="text" name="name" class="form-control">
                    @if($errors->has('name'))
                        <p class="alert-danger">
                            {{$errors->first('name')}}
                        </p>
                    @endif
                </div>
                <div>
                    <label class="form-group">Mô tả</label>
                    <textarea type="text" name="description" class="form-control"></textarea>
                </div>
                <br>
               <div>
                   <input type="submit" class="btn btn-success" value="Tạo Mới">
                   <a href="{{route('playlists.showPlaylists')}}">
                       <input type="button" class="btn btn-secondary" value="Quay Lại">
                   </a>
               </div>

            </div>
        </form>
    </div>
@endsection
