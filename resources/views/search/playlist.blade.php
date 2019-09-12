@extends("layouts.app")
@section("content")
    <h1 class="text-center text-capitalize">Kết Quả Tìm Kiếm</h1>
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
