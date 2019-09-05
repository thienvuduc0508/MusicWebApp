@extends("layouts.app")
@section('content')
    <div class="row">
        <main class="col-12 offset-0">
            <h1>Danh sách Playlist của bạn</h1>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{route('playlists.create')}}">
                <button class="btn btn-success">Tạo Mới Playlist</button>
            </a>
            @if(count($playlists)==0)
                <p class="alert alert-warning">Bạn chưa có playlist</p>
            @else
                <table class="table table-striped mt-2 ">
                    <tr>
                        <th>#</th>
                        <th>Tên</th>
                        <th>Mô tả</th>
                        <th>Trạng thái</th>
                        <th>Add</th>
                    </tr>

                    @foreach($playlists as $key=>$playlist)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>
                                <a href="{{route('playlists.detail',$playlist->id)}}" style="text-decoration: none">
                                    {{$playlist->name}}
                                </a>
                            </td>
                            <td>
                                {{$playlist->description}}
                            </td>
                            <td>
                                {{$playlist->status}}
                            </td>
                            <td>
                                <a href="{{route('playlists.addSong',[$playlist->id,$songId])}}">
                                    <button class="btn btn-outline-success"> <i class="fa fa-plus-square"></i></button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    @endif
                </table>
        </main>
    </div>
@endsection
