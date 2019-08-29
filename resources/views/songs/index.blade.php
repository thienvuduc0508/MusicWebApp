@extends('layouts.app')
@section('content')
    <div class="container mt-5 row justify-content-center align-middle">
        <main class="col-12">

            <h1>Danh sách bài hát của bạn</h1>
            <a href="{{route('songs.create')}}">
                <button class="btn btn-success">Tạo Mới Bài Hát</button>
            </a>
            @if(count($songs) == 0)
                <div class="alert-danger" style="text-align: center">bạn chưa có bài nhạc nào</div>
            @else
                <table class="table table-striped text-center mt-2">
                    <tr>
                        <th>#</th>
                        <th>Tên Bài Hát</th>
                        <th>Ảnh</th>
                        <th>Nghe</th>
                        <th>Lượt Nghe</th>
                        <th>Chức Năng</th>
                    </tr>
                    @foreach($songs as $key=>$song)
                        <tr style="font-size: 20px">
                            <td>{{++$key}}</td>
                            <td><a href="{{route("songs.play",$song->id)}}" style="text-decoration: none">{{$song->name}}</a></td>
                            <td>
                                <img class="play-music" src="{{asset('storage/'.$song->image)}}"
                                     style="width: 50px;height: 50px; border-radius: 50px">
                            </td>
                            <td>
                                <audio src="{{asset("storage/".$song->audio)}}" controls></audio>
                            </td>
                            <td>
                                <i class="fa fa-btn fa-headphones"> {{$song->view}}</i>
                            </td>
                            <td>
                                <a href="{{route('songs.edit',$song->id)}}"><button class="btn btn-outline-primary">
                                        <i class="fa fa-btn fa-edit"></i>
                                    </button>
                                </a>
                                <a href="{{route("songs.delete",$song->id)}}"><button class="btn btn-outline-danger"
                                                    onclick="return confirm('Bạn chắc chắn muốn xóa bài hát này?');">
                                        <i class="fa fa-btn fa-ban" ></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    @endif
                </table>
        </main>
    </div>
@endsection

