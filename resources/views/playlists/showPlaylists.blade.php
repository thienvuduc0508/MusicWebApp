@extends("layouts.app")
@section('content')
    <div class="row">

        <main class="col-9 offset-2">
            <h1>Danh sách Playlist của bạn</h1>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{route('playlists.create')}}">
                <button class="btn btn-success">Tạo Mới Playlist</button>
            </a>

            <table class="table table-striped mt-2">
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Mô tả</th>
                    <th>Chức năng</th>
                </tr>
                @if(count($playlists)==0)
                    <tr>
                        <td class="alert alert-warning">Bạn chưa có playlist</td>
                    </tr>
                @else
                    @foreach($playlists as $key=>$playlist)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>
                                {{$playlist->name}}
                            </td>
                            <td>
                                {{$playlist->description}}
                            </td>
                            <td>
                                <a href="{{route('playlists.detail',$playlist->id)}}">
                                    <button class="btn btn-info">Hiển Thị</button>
                                </a>
                                <a href="{{route('playlists.edit',$playlist->id)}}">
                                    <button class="btn btn-warning">Cập Nhật</button>
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
