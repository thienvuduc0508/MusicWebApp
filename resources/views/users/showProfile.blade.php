@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Thông Tin Cá Nhân') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <div class="form-group row">
                                    <label for="name"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Họ và tên') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                               class="form-control" name="name"
                                               value="{{$user->name}}" autocomplete="name" autofocus readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                               class="form-control" name="email"
                                               value="{{ $user->email }}" autocomplete="email" readonly>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dob"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Ngày sinh') }}</label>

                                    <div class="col-md-6">
                                        <input id="dob" type="date"
                                               class="form-control" name="dob"
                                               value="{{ $user->dob}}" autocomplete="new-birthday" readonly>
                                        <span class="invalid-feedback" role="alert">
                                    </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gender"
                                           class="col-md-4 col-form-label text-md-right">{{__('Giới tính')}}</label>

                                    <div class="col-md-6" id="gender">
                                        <input id="gender" type="text"
                                               class="form-control" name="gender"
                                               value="{{ $user->gender }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="update"
                                           class="col-md-4 col-form-label text-md-right">{{__('')}}</label>

                                    <div class="col-md-6">
                                        <a href="{{route('user.edit',$user->id)}}">
                                            <button type="button" class="btn btn-primary">
                                                {{ __('Cập Nhật Thông Tin Cá Nhân') }}
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
