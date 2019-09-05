@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card" >
                    <div class="card-header text-md-center" style="font-size: 20px;font-weight: bold">Thay Đổi Mật khẩu </div>

                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form class="form-horizontal" method="POST" action="{{ route('update.password',$user->id) }}">
                            {{ csrf_field() }}

                            <div class="form-group row{{ $errors->has('current_password') ? ' has-error' : '' }}">
                                <label for="new-password" class="col-md-4 control-label text-md-right " style="margin-top: auto">Mật Khẩu Cũ </label>

                                <div class="col-md-6">
                                    <input id="current-password" type="password" class="form-control" name="current_password" autofocus>

                                    @if ($errors->has('current_password'))
                                        <strong class="text-danger">{{ $errors->first('current_password') }}</strong>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row{{ $errors->has('new_password') ? ' has-error' : '' }}">
                                <label for="new-password" class="col-md-4 control-label text-md-right" style="margin-top: auto">Mật Khẩu Mới </label>

                                <div class="col-md-6">
                                    <input id="new-password" type="password" class="form-control" name="new_password">

                                    @if ($errors->has('new_password'))
                                        <strong class="text-danger">{{ $errors->first('new_password') }}</strong>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="new-password-confirm" class="col-md-4 control-label text-md-right" style="margin-top: auto">Nhập Lại Mật Khẩu </label>

                                <div class="col-md-6">
                                    <input id="new-password-confirm" type="password" class="form-control" name="new_password_confirmation">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4 " style="margin-left: 250px;" >
                                    <button type="submit" class="btn btn-primary">
                                        Đổi Mật Khẩu
                                    </button>
                                    <a href="{{route('user.index')}}">
                                        <button class="btn btn-dark" type="button">
                                            Hủy
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
