@extends("layouts.app")
@section("content")
    <h1 class="text-center text-capitalize">Kết Quả Tìm Kiếm</h1>
    @if(count($singers) == 0)
        <p class="alert alert-warning">Không tìm thấy ca sĩ trong hệ thống phù hợp với từ khóa: <span
                style="color:red">{{$keyword}}</span></p>
    @else
        <p style="font-weight: bold;color: blue;font-size: 20px">Tìm được {{count($singers)}} ca sĩ với từ khóa: <span
                style="color:red">{{$keyword}}</span></p>
        <table class="table table-striped text-center mt-2">
            <tr>
                <th>#</th>
                <th>Tên</th>
                <th>Ảnh</th>
                <th>Thông tin</th>
            </tr>
            @foreach($singers as $key=>$singer)
                <tr style="font-size: 20px">
                    <td>{{++$key}}</td>
                    <td><a href="{{route("songs.play",$singer->id)}}" style="text-decoration: none">{{$singer->name}}</a>
                    </td>
                    <td>
                        <img class="play-music" src="{{asset('storage/'.$singer->image)}}"
                             style="width: 50px;height: 50px; border-radius: 50px">
                    </td>

                    <td>
                        <i class="fa fa-btn fa-headphones"> {{$singer->information}}</i>
                    </td>
                </tr>
            @endforeach
            @endif
        </table>

@endsection
