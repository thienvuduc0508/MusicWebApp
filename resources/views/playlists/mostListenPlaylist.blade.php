@extends("layouts.app")
@section("content")
    <h1 class="text-center text-capitalize ">Playlist Được Nghe Nhiều Nhất</h1>
    @if(count($mostListenPlaylists ) == 0)
        <p class="alert alert-warning">Không có playlist trong hệ thống</p>
    @else
        <table class="table table-striped text-center mt-4  ">
            <tr>
                <th>#</th>
                <th>Tên Playlist</th>
                <th>Lượt Nghe</th>
            </tr>
            @foreach($mostListenPlaylists as $key=>$mostListenPlaylist)
                <tr style="font-size: 20px">
                    <td>{{++$key}}</td>
                    <td><a href="{{route("playlists.detail",$mostListenPlaylist->id)}}" >{{$mostListenPlaylist->name}}</a>
                    </td>

                    <td>
                        <i class="fa fa-btn fa-headphones"> {{$mostListenPlaylist->view}}</i>
                    </td>
                </tr>
            @endforeach
            @endif
        </table>
        </div>
@endsection
