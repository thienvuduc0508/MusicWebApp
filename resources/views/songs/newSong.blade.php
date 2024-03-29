@extends("layouts.app")
@section("content")
<h1 class="text-center text-capitalize">Bài Hát Mới Nhất</h1>
@if(count($newSongs ) == 0)
<p class="alert alert-warning">Không có bài hát trong hệ thống</p>
@else
<table class="table table-striped text-center mt-2">
    <tr>
        <th>#</th>
        <th>Tên Bài Hát</th>
        <th>Ảnh</th>
        <th>Lượt Nghe</th>
    </tr>
    @foreach($newSongs as $key=>$newSong)
    <tr style="font-size: 20px">
        <td>{{++$key}}</td>
        <td><a href="{{route("songs.play",$newSong->id)}}" style="text-decoration: none">{{$newSong->name}}</a>
        </td>
        <td>
            <img class="play-music" src="{{asset('storage/'.$newSong->image)}}"
                 style="width: 50px;height: 50px; border-radius: 50px">
        </td>

        <td>
            <i class="fa fa-btn fa-headphones"> {{$newSong->view}}</i>
        </td>
    </tr>
    @endforeach
    @endif
</table>
</div>
@endsection
