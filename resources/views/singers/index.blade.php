@extends('layouts.app')
@section('content')
    <div class="container mt-5 row justify-content-center align-middle">
        <main class="col-12">

            <h1>Danh sách ca sỹ của bạn</h1>
            <a href="{{route('singer.create')}}">
                <button class="btn btn-success">Tạo Mới Ca Sỹ</button>
            </a>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if(count($singers) == 0)
                <div class="alert-danger" style="text-align: center">Bạn chưa có ca sỹ nào</div>
            @else
                <table class="table table-striped text-center mt-2">
                    <tr>
                        <th>#</th>
                        <th>Tên ca sỹ</th>
                        <th>Ảnh</th>
                        <th>Chức năng</th>
                    </tr>
                    @foreach($singers as $key=>$singer)
                        <tr style="font-size: 20px">
                            <td>{{++$key}}</td>
                            <td><a href="{{route('singer.showDetailSinger',$singer->id)}}">{{$singer->name}}</a></td>
                            <td>
                                <img src="{{asset('storage/'.$singer->image)}}"
                                     style="width: 50px;height: 50px; border-radius: 50px">
                            </td>
                            <td>
                                <a href="{{route('singer.edit',$singer->id)}}"><button class="btn btn-outline-primary">
                                        <i class="fa fa-btn fa-edit"></i>
                                    </button>
                                </a>
                                <a href="{{route("singer.destroy",$singer->id)}}"><button class="btn btn-outline-danger"
                                                                                      onclick="return confirm('Bạn chắc chắn muốn xóa ca sỹ này?');">
                                        <i class="fa fa-btn fa-ban" ></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </main>
    </div>
@endsection
