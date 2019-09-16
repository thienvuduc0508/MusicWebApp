@extends("layouts.app")
@section("content")
<h1 class="text-center text-capitalize ">Playlist Được Like Nhiều Nhất</h1>
@if(count($playlists ) == 0)
<p class="alert alert-warning">Chưa có playlist nào được like trong hệ thống</p>
@else
<table class="table table-striped text-center mt-4  ">
    <tr>
        <th>#</th>
        <th>Tên Playlist</th>
        <th>Lượt Like</th>
    </tr>
    @foreach($playlists as $key=>$playlist)
    <tr style="font-size: 20px">
        <td>{{++$key}}</td>
        <td><a href="{{route("playlists.detail",$playlist->id)}}" >{{$playlist->name}}</a>
        </td>

        <td>
            <i class="fa fa-thumbs-o-up"> {{$playlist->like}}</i>
        </td>
    </tr>
    @endforeach
    @endif
</table>
</div>
@endsection
