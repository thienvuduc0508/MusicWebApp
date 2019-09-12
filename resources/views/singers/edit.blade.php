@extends('layouts.app')
@section('content')
    <div class=" container mt-5 col-12">
        <form action="{{route('singer.update',$singer->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <h1 class="text-center">Chỉnh Sửa Ca Sỹ</h1>

            <div class="form-group">
                <label class="form-group">Tên Ca Sỹ</label>
                <input type="text" name="name" class="form-control" value="{{$singer->name}}">
                @if($errors->has('name'))
                    <p class="alert-danger">
                        {{$errors->first('name')}}
                    </p>
                @endif
            </div>
            <div class="form-group">
                <label class="form-group">Thông tin ca sỹ</label>
                <textarea  id="ckeditor" rows="4" cols="50" name="information" class="form-control" >{{$singer->information}}</textarea>
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
                    <img src="{{asset("storage/".$singer->image)}}"  class="rounded-circle"
                         width="100px" height="100 px" id="image">
                </div>

            </div>

                  <div>
                <input type="submit" class="btn btn-success" value="Chỉnh Sửa">
                <a href="{{route('singer.index')}}">
                    <input type="button" class="btn btn-secondary" value="Quay Lại">
                </a>
            </div>
        </form>
    </div>
@endsection
