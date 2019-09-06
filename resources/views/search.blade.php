@extends("layouts.app")
@section("content")
    <h1 class="text-center text-capitalize">Kết Quả Tìm Kiếm</h1>
    @if(count($songs) == 0)
        <p class="alert alert-warning">Không tìm thấy bài hát trong hệ thống phù hợp với từ khóa: <span
                style="color:red">{{$keyword}}</span></p>
    @else
        <p style="font-weight: bold;color: blue;font-size: 20px">Tìm được {{count($songs)}} bài hát với từ khóa: <span
                style="color:red">{{$keyword}}</span></p>
        <table class="table table-striped text-center mt-2">
            <tr>
                <th>#</th>
                <th>Tên Bài Hát</th>
                <th>Ảnh</th>
                <th>Lượt Nghe</th>
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
                </tr>
            @endforeach
            @endif
        </table>
        <hr>
        @if(count($playlists)==0)
            <p class="alert alert-warning">Không tìm thấy playlist nào trên hệ thống phù hợp với từ khóa: <span
                    style="color:red">{{$keyword}}</span></p>
        @else
            <p style="font-weight: bold;color: blue;font-size: 20px">Tìm được {{count($playlists)}} playlist với từ khóa: <span
                    style="color:red">{{$keyword}}</span></p>
            <p class="text-hide">
                {{$i = 1}}
            </p>
            <table class="table table-striped mt-2 ">
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Mô tả</th>
                </tr>

                @foreach($playlists as $key=>$playlist)
                    @if($playlist->status == 'public')
                        <tr>
                            <td>{{$i++}}</td>
                            <td>
                                <a href="{{route('playlists.detail',$playlist->id)}}" style="text-decoration: none">
                                    {{$playlist->name}}
                                </a>
                            </td>
                            <td>
                                {{$playlist->description}}
                            </td>

                        </tr>
                    @endif
                @endforeach
                @endif
            </table>

@endsection
