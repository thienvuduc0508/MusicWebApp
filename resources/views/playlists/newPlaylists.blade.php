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

                        <th>Người đăng</th>

                    </tr>

                    @foreach($newPlaylists as $key=>$newPlaylist)
                        @if($newPlaylist->status == 'public')
                            <tr>
                                <td>{{$i++}}</td>
                                <td>
                                    <a href="{{route('playlists.detail',$newPlaylist->id)}}"
                                       style="text-decoration: none">
                                        {{$newPlaylist->name}}
                                    </a>
                                </td>
                                <td>
                                    {{$newPlaylist->description}}
                                </td>
                                <td>
                                    {{$newPlaylist->user->name}}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @endif
                </table>
        </main>
    </div>
@endsection
