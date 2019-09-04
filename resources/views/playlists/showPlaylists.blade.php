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
                    <th>Chức năng</th>
                </tr>

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
                                {{$playlist->status}}
                            </td>
                            <td>
                                <a href="{{route('playlists.detail',$playlist->id)}}">
                                    <button class="btn btn-outline-info"><i class="fa fa-info-circle"></i></button>
                                </a>
                                <a href="{{route('playlists.edit',$playlist->id)}}">
                                    <button class="btn btn-outline-warning"> <i class="fa fa-btn fa-edit"></i></button>
                                </a>
                                <a href="{{route('playlists.destroy',$playlist->id)}}">
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
        </main>
    </div>
    @endsection
