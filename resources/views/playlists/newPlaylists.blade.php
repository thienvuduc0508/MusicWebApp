@extends("layouts.app")
@section('content')
    <div class="row">
        <main class="col-12 offset-0">
            <h1>Danh sách Playlist mới nhất</h1>
        @if(count($newPlaylists)==0)
                <p class="alert alert-warning">Không có playlist nào trên hệ thống</p>
            @else
                <p class="text-hide">
                    {{$i = 1}}
                </p>
                <table class="table table-striped mt-2 ">
                    <tr>
                        <th>#</th>
                        <th>Tên</th>
                        <th>Mô tả</th>
                        <th>Chức năng</th>
                    </tr>

                    @foreach($newPlaylists as $key=>$newPlaylist)
                        @if($newPlaylist->status == 'public')
                            <tr>
                                <td>{{$i++}}</td>
                                <td>
                                    {{$newPlaylist->name}}
                                </td>
                                <td>
                                    {{$newPlaylist->description}}
                                </td>
                                <td>
                                    <a href="{{route('playlists.detail',$newPlaylist->id)}}">
                                        <button class="btn btn-outline-info"><i class="fa fa-info-circle"></i></button>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @endif
                </table>
        </main>
    </div>
@endsection
