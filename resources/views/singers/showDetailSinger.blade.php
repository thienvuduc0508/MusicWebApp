@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
        <span class="col-4 mt-4">
            <img src="{{asset("storage/".$singer->image)}}" alt="" height="250px" width="250px"
                 style="border-radius: 50%">
        </span>
            <div class="col-8 mt-4">
                <span style="font-size: 30px;font-weight: bold;color: red">{{$singer->name}}</span>
                <div>{!!$singer->information!!}</div>
            </div>
        </div>
        <hr>
        <h3 style="text-align: center">Các bài hát của {{$singer->name}}</h3>
        @if(count($songs) == 0)
            <p class="alert alert-warning">Ca sĩ này chưa có bài hát nào</p>
        @else
            <table class="table table-striped text-center mt-2">
                <tr>
                    <th>#</th>
                    <th>Tên Bài Hát</th>
                    <th>Ảnh</th>
                    <th>Lượt Nghe</th>
                    @if(Auth::id() == $singer->user->id)
                        <th>Lượt Nghe</th>
                    @endif
                </tr>
                @foreach($songs as $key=>$song)
                    <tr style="font-size: 20px">
                        <td>{{++$key}}</td>
                        <td><a href="{{route("songs.play",$song->id)}}"
                               style="text-decoration: none">{{$song->name}}</a>
                        </td>
                        <td>
                            <img class="play-music" src="{{asset('storage/'.$song->image)}}"
                                 style="width: 50px;height: 50px; border-radius: 50px">
                        </td>

                        <td>
                            <i class="fa fa-btn fa-headphones"> {{$song->view}}</i>
                        </td>
                        @if(Auth::id() == $singer->user->id)
                            <td>
                                <button>Delete</button>
                            </td>
                        @endif
                    </tr>
                @endforeach
                @endif
            </table>
    </div>
@endsection
