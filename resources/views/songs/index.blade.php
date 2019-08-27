@extends('layouts.app')
@section('content')
    <div class="row">
        <main class="col-9 offset-2">
            <h1>Danh sách bài hát của bạn</h1>
            <a href="{{route('songs.create')}}">
                <button class="btn btn-success">Tạo Mới Bài Hát</button>
            </a>
            <table class="table table-striped text-center mt-2">
                <tr>
                    <th>#</th>
                    <th>Tên Bài Hát</th>
                    <th>Ảnh</th>
                    <th>Chức Năng</th>
                </tr>
                @if(count($songs) == 0)
                    <tr>
                        <td class="alert-danger">bạn chưa có bài nhạc nào</td>
                    </tr>
                @else
                    @foreach($songs as $key=>$song)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$song->name}}</td>
                            <td>
                                <img class="play-music" src="{{asset('storage/'.$song->image)}}" style="width: 80px;height: 50px; border-radius: 50px">
                            </td>
                            <td>
                                <a href="">
                                    <button class="btn btn-warning">Chỉnh sửa</button>
                                </a>
                                <a href="">
                                    <button class="btn btn-danger">Xóa</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </main>
    </div>





@endsection
