@extends('layouts.app')
@section('content')
    <div class="container mt-5 row justify-content-center align-middle">
        <main class="col-12">

            <h1>Danh sách ca sỹ</h1>

            @if(count($singers) == 0)
                <div class="alert-warning" style="text-align: center">Chưa có ca sỹ nào</div>
            @else
                <table class="table table-striped text-center mt-4">
                    <tr>
                        <th>#</th>
                        <th>Tên ca sỹ</th>
                        <th>Ảnh</th>
                    </tr>
                    @foreach($singers as $key=>$singer)
                        <tr style="font-size: 20px">
                            <td>{{++$key}}</td>
                            <td><a href="{{route('singer.detailSinger',$singer->id)}}" style="text-decoration: none">
                                    {{$singer->name}}
                                </a>
                            </td>
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
