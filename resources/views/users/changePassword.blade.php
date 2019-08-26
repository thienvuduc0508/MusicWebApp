@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card" >
                    <div class="card-header">Thay Đổi Mật khẩu </div>

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

                            <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                                <label for="new-password" class="col-md-4 control-label">Mật Khẩu Cũ </label>

                                <div class="col-md-6">
                                    <input id="current-password" type="password" class="form-control" name="current_password" autofocus>

                                    @if ($errors->has('current_password'))
                                        <strong class="text-danger">{{ $errors->first('current_password') }}</strong>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                                <label for="new-password" class="col-md-4 control-label">Mật Khẩu Mới </label>

                                <div class="col-md-6">
                                    <input id="new-password" type="password" class="form-control" name="new_password">

                                    @if ($errors->has('new_password'))
                                        <strong class="text-danger">{{ $errors->first('new_password') }}</strong>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="new-password-confirm" class="col-md-4 control-label">Nhập Lại Mật Khẩu </label>

                                <div class="col-md-6">
                                    <input id="new-password-confirm" type="password" class="form-control" name="new_password_confirmation">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Đổi Mật Khẩu
                                    </button>
                                    <a href="{{route('user.index',$user->id)}}">
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
