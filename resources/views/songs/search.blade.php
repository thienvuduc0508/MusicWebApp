@extends("layouts.app")
@section("content")
    <h1 class="text-center text-capitalize">Kết Quả Tìm Kiếm</h1>
    @if(count($songs) == 0)
        <p class="alert alert-warning">Không tìm thấy bài hát trong hệ thống</p>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-12 content_left">
                <div class="row">
                    @foreach($songs as $song)
                        <div class="col-md-3 mb-5 text-center" id="song">
                            <div class="container-img" data-songid="{{$song->id}}">
                            </div>
                            <div>
                                <img
                                    src="{{asset('storage/'. $song->image)}}"
                                    class="img-thumbnail" id="song-img">
                            </div>
                            <div class="pt-2">
                                <a href="">
                                    <h5><strong>{{$song->name}}</strong></h5>
                                </a>
                            </div>
                        </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>


@endsection
