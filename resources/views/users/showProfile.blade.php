@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header text-md-center" style="font-size: 20px;font-weight: bold">{{ __('Thông Tin Cá Nhân') }}</div>

                    <div class="card-body" style="font-style: italic">
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <div class="form-group row">
                                    <label for="name"
                                           class="col-md-4 col-form-label text-md-left">Họ và tên</label>
                                    <label class="col-md-4 col-form-label text-md-left">: {{ $user->name }}</label>
                                </div>
                                <div class="form-group row">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-left">Email</label>
                                    <label class="col-md-8 col-form-label text-md-left">: {{ $user->email }}</label>
                                </div>
                                <div class="form-group row">
                                    <label for="dob"
                                           class="col-md-4 col-form-label text-md-left">Ngày sinh</label>
                                    <label class="col-md-4 col-form-label text-md-left">: {{ $user->dob }}</label>
                                </div>
                                <div class="form-group row">
                                    <label for="gender"
                                           class="col-md-4 col-form-label text-md-left">Giới tính</label>
                                    <label class="col-md-4 col-form-label text-md-left">: {{ $user->gender }}</label>
                                </div>
                                <div class="form-group row">
                                    <label for="update"
                                           class="col-md-4 col-form-label text-md-right">{{__('')}}</label>
                                    <div class="col-md-6">
                                        <a href="{{route('user.edit')}}">
                                            <button type="button" class="btn btn-primary">
                                                Cập Nhật Thông Tin Cá Nhân
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <div class="form-group row">
                                    <div class="col-12">

                                            <img src="{{asset('storage/' . $user->image)}}"
                                                 class="rounded-circle" width="200px" height="200px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
