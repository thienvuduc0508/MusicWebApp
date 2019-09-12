@extends("layouts.app")
@section('content')
    <div class="row">
        <main class="col-12 offset-0 mt-2">
            <h1>Danh sách Ca sĩ </h1>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if(count($singers)==0)
                <p class="alert alert-warning">Chưa có ca sĩ nào</p>
            @else
                <table class="table table-striped mt-4 ">
                    <tr>
                        <th>#</th>
                        <th>Tên</th>
                        <th>Ảnh</th>
                        <th>Thêm</th>
                    </tr>

                    @foreach($singers as $key=>$singer)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>
                                <a href="{{route('singer.addSingerToSongs',[$song->id, $singer->id])}}" style="text-decoration: none">
                                    {{$singer->name}}
                                </a>
                            </td>
                            <td>
                                <img src="{{asset('storage/'.$singer->image)}}" alt="" height="50px" width="50px" style="border-radius: 50%">
                            </td>
                            <td>
                                <a href="{{route('singer.addSingerToSongs',[$song->id, $singer->id])}}">
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
