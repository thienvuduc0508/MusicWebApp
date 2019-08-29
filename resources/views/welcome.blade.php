@extends('layouts.app')
@section('content')
    {{--slide--}}
    <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators">
            <li data-target="#carousel-example-2" data-slide-to="0" class="active">1</li>
            <li data-target="#carousel-example-2" data-slide-to="1">2</li>
            <li data-target="#carousel-example-2" data-slide-to="2">3</li>
        </ol>

        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div class="view">
                    <img class="d-inline-block w-100 h-25"
                         src="{{asset('storage/images/anh1.jpg')}}"
                         alt="First slide">
                    <div class="mask rgba-black-light"></div>
                </div>
                <div class="carousel-caption">
                    <h3 class="h3-responsive">Light mask</h3>
                    <p>First text</p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="view">
                    <img class="d-inline-block w-100 h-25" src="{{asset('storage/images/anh2.jpg')}}"
                         alt="Second slide">
                    <div class="mask rgba-black-strong"></div>
                </div>
                <div class="carousel-caption">
                    <h3 class="h3-responsive">Strong mask</h3>
                    <p>Secondary text</p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="view">
                    <img class="d-inline-block w-100 h-25" src="{{asset('storage/images/anh3.jpg')}}"
                         alt="Third slide">
                    <div class="mask rgba-black-slight"></div>
                </div>
                <div class="carousel-caption">
                    <h3 class="h3-responsive">Slight mask</h3>
                    <p>Third text</p>
                </div>
            </div>
        </div>
        <!--Controls-->
        <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
    </div>
    {{--end slide--}}

    {{--list song--}}

    <div class="container">
        <h3>Có Thể Bạn Muốn Nghe</h3>
        <div class="row">
        @foreach($songs as $song)
                <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                    <a href="{{route('songs.play',$song->id)}}">
                    <div class="card card-inverse card-primary" style="border: 1px solid white">
                        <img class="card-img-top" src="{{asset('storage/'.$song->image)}}"
                             height="200px" width="80px" style="border: 1px solid black;border-radius: 50px">
                        <blockquote class="card-blockquote p-3">
                            <h5 style="text-align: center">{{$song->name}}</h5>
                        </blockquote>
                    </div>
                    </a>
                </div>
            @endforeach
        </div>

        <h3>Bài Hát Mới Nhất</h3>
        <div class="row">
            @foreach($newSongs as $newSong)
                <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                    <a href="{{route('songs.play',$newSong->id)}}">
                        <div class="card card-inverse card-primary" style="border: 1px solid white">
                            <img class="card-img-top" src="{{asset('storage/'.$newSong->image)}}"
                                 height="200px" width="80px" style="border: 1px solid black;border-radius: 50px">
                            <blockquote class="card-blockquote p-3">
                                <h5 style="text-align: center">{{$newSong->name}}</h5>
                            </blockquote>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <h3>Nhạc Hay Gần Đây</h3>
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                <div class="card card-inverse card-primary ">
                    <img class="card-img-top" src="https://picsum.photos/200/150/?random">
                    <blockquote class="card-blockquote p-3">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.</p>
                        <footer>
                            <small>
                                Someone famous in <cite title="Source Title">Source Title</cite>
                            </small>
                        </footer>
                    </blockquote>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                <div class="card card-inverse card-primary ">
                    <img class="card-img-top" src="https://picsum.photos/200/150/?random">
                    <blockquote class="card-blockquote p-3">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.</p>
                        <footer>
                            <small>
                                Someone famous in <cite title="Source Title">Source Title</cite>
                            </small>
                        </footer>
                    </blockquote>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                <div class="card card-inverse card-primary ">
                    <img class="card-img-top" src="https://picsum.photos/200/150/?random">
                    <blockquote class="card-blockquote p-3">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.</p>
                        <footer>
                            <small>
                                Someone famous in <cite title="Source Title">Source Title</cite>
                            </small>
                        </footer>
                    </blockquote>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                <div class="card card-inverse card-primary ">
                    <img class="card-img-top" src="https://picsum.photos/200/150/?random">
                    <blockquote class="card-blockquote p-3">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.</p>
                        <footer>
                            <small>
                                Someone famous in <cite title="Source Title">Source Title</cite>
                            </small>
                        </footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
    {{--end list song--}}
@endsection
