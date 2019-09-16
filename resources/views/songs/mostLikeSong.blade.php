@extends("layouts.app")
@section("content")
    <h1 class="text-center text-capitalize ">Bài Hát Được Like Nhiều Nhất</h1>
    @if(count($songs ) == 0)
        <p class="alert alert-warning">Chưa có bài hát nào được like trong hệ thống</p>
    @else
        <table class="table table-striped text-center mt-4  ">
            <tr>
                <th>#</th>
                <th>Tên Bài Hát</th>
                <th>Ảnh</th>
                <th>Lượt Like</th>
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
                        <i class="fa fa-thumbs-o-up"> {{$song->like}}</i>
                    </td>
                </tr>
            @endforeach
            @endif
        </table>
        </div>
@endsection
