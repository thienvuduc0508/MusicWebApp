@extends('layouts.app')
@section('content')
    <h1 class="text-center text-capitalize">Danh sách bài hát trong playlist</h1>
    @if(count($songs)==0)
        <p class="alert alert-warning">Chưa có bài hát nào</p>
    @else
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('done'))
            <div class="alert alert-success">
                {{ session('done') }}
            </div>
        @endif
        @if (session('failed'))
            <div class="alert alert-success">
                {{ session('failed') }}
            </div>
        @endif
        <table class="table table-striped text-center mt-2  ">
            <tr>
                <th>#</th>
                <th>Tên Bài Hát</th>
                <th>Ảnh</th>
                <th>Lượt Nghe</th>
                <th>Xóa</th>
            </tr>
            @foreach($songs as $key=>$song)
                <tr style="font-size: 20px">
                    <td>{{++$key}}</td>
                    <td><a href="{{route("songs.play",$song->id)}}" style="text-decoration: none">{{$song->name}}</a>
                    </td>
                    <td>
                        <img class="play-music" src="{{asset('storage/'.$song->image)}}"
                             style="width: 50px;height: 50px; border-radius: 50px">
                    </td>

                    <td>
                        <i class="fa fa-btn fa-headphones"> {{$song->view}}</i>
                    </td>
                    <td>
                        <a href="{{route('playlists.deleteSong',[$playlist->id,$song->id])}}">
                            <button class="btn btn-outline-danger"
                                    onclick="return confirm('Bạn chắc chắn muốn xóa bài hát này?');">
                                <i class="fa fa-btn fa-ban" ></i>
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
            @endif
        </table>
        </div>

@endsection

