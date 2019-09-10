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
                        <th>Thông tin</th>
                        <th>Ảnh</th>
                    </tr>
                    @foreach($singers as $key=>$singer)
                        <tr style="font-size: 20px">
                            <td>{{++$key}}</td>
                            <td>{{$singer->name}}</td>
                            <td>{{$singer->information}}</td>
                            <td>
                                <img src="{{asset('storage/'.$singer->image)}}"
                                     style="width: 50px;height: 50px; border-radius: 50px">
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </main>
    </div>
@endsection
