@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="text-align: center">
                <div class="card-header">Music</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        Đăng nhập thành công!
                        <br>
                        <br>
                        <a href="{{route("index")}}">
                            <button type="button" class="btn btn-primary">Home</button>
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
