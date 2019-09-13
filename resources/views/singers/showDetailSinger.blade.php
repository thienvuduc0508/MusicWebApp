@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
        <span class="col-4 mt-4">
            <img src="{{asset("storage/".$singer->image)}}" alt="" height="250px" width="250px"
                 style="border-radius: 50%">
        </span>
            <div class="col-8 mt-4">
                <span style="font-size: 30px;font-weight: bold;color: red">{{$singer->name}}</span>
                <div>{!!$singer->information!!}</div>
            </div>
        </div>
        <hr>
        <h3 style="text-align: center">Các bài hát của {{$singer->name}}</h3>
        @if(count($data) == 0)
            <p class="alert alert-warning">Ca sĩ này chưa có bài hát nào</p>
        @else
{{--        playsong--}}
        <div class="player paused mt-2">
            <div class="album">
                <div class="cover">
                    <div><img src="" alt="3q music" id="imageSong"/></div>
                </div>
            </div>

            <div class="info">
                <div class="time">
                    <span class="current-time">0:00</span>
                    <span class="progress" style="height: 0.125em"><span></span></span>
                    <span class="duration">0:00</span>
                </div>
                <h2 id="nameSong"></h2>
            </div>

            <div class="actions">
                <button class="shuffle">
                    <div class="arrow"></div>
                    <div class="arrow"></div>
                </button>
                <button class="button rw">
                    <div class="arrow"></div>
                    <div class="arrow"></div>
                </button>
                <button class="button play-pause">
                    <div class="arrow"></div>
                </button>
                <button class="button ff">
                    <div class="arrow"></div>
                    <div class="arrow"></div>
                </button>
                <button class="repeat"></button>
                &nbsp
                &nbsp
                <div id="headphones" style="font-size: 20px"><i class="fa fa-headphones"></i>
                    <span id="viewSong"></span></div>
            </div>
            {{--<audio autoplay preload src="{{asset('storage/'.$song->audio)}}"></audio>--}}
            <audio controls id="playmusicPlay">
                <source id="audioSource" src="" type="audio/ogg">
            </audio>
        </div>
            {{--        end playsong--}}
        @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-striped text-center mt-4">
                <tr>
                    <th>#</th>
                    <th>Tên Bài Hát</th>
                    <th>Ảnh</th>
                    <th>Lượt Nghe</th>
                    @if(Auth::id() == $singer->user->id)
                        <th>Action</th>
                    @endif
                </tr>
                @foreach($data as $key=>$song)
                    <tr style="font-size: 20px">
                        <td>{{++$key}}</td>
                        <td><a href="{{route("songs.play",$song->id)}}"
                               style="text-decoration: none">{{$song->name}}</a>
                        </td>
                        <td>
                            <img class="play-music" src="{{asset('storage/'.$song->image)}}"
                                 style="width: 50px;height: 50px; border-radius: 50px">
                        </td>

                        <td>
                            <i class="fa fa-btn fa-headphones"> {{$song->view}}</i>
                        </td>
                        @if(Auth::id() == $singer->user->id)
                            <td>
                                <a href="{{route('singer.deleteSongInSinger',[$song->id,$singer->id])}}">
                                    <button class="btn btn-outline-danger"
                                            onclick="return confirm('Bạn chắc chắn muốn xóa bài hát này?');">
                                        <i class="fa fa-btn fa-ban"></i>
                                    </button>
                                </a>
                            </td>
                        @endif
                    </tr>
                @endforeach
                @endif
            </table>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h3 style="text-align: center">Bình luận</h3>
                <hr>
                @if(count($singer->comments) == 0)
                    <h4 class="text-danger">Chưa có bình luận nào!</h4>
                @else
                    <div class="ml-2">
                        @foreach($singer->comments as $comment)
                            <div class="display-comment">
                                <div>
                                    <img src="{{asset("storage/".$comment->user->image)}}" width="50px" height="50px"
                                         style="border-radius: 50%" alt="">
                                    <strong>{{ $comment->user->name }}: </strong>
                                    <span>{!! $comment->comment !!}</span>
                                </div>
                                <p> {{ $comment['created_at']->hour }}:{{ $comment['created_at']->minute}}</p>
                                <hr>
                            </div>
                        @endforeach
                    </div>
                @endif
                @if(Auth::user())
                <h4 style="text-align: center">viết bình luận</h4>
                <div class="ml-5 mr-5 mb-3">
                    <form method="post" action="{{route('comment.createCommentInSinger',$singer->id)}}">
                        @csrf
                        <div class="form-group">
                            <textarea type="text" name="comment" id="comment" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>
                @else
                    <p class="text-danger">Bạn cần đăng nhập để bình luận</p>
                @endif
            </div>
        </div>
    </div>
    </div>
    <script>
        var playList = `<?php echo json_encode($arrAudio); ?>`;
        console.log(playList);
        var nameSong = `<?php echo json_encode($arrNameSong); ?>`;
        var viewSong = `<?php echo json_encode($arrViewSong); ?>`;
        var imageSong = `<?php echo json_encode($arrImageSong); ?>`;
        var playList1 = JSON.parse(playList);
        var nameSong1 = JSON.parse(nameSong);
        var viewSong1 = JSON.parse(viewSong);
        var imageSong1 = JSON.parse(imageSong);

        let audio = document.getElementById('playmusicPlay');
        var source = document.getElementById('audioSource');
        var name = document.getElementById('nameSong');
        var view = document.getElementById('viewSong');
        var img = document.getElementById('imageSong');

        source.src = "http://localhost:8000/storage/" + playList1[0];
        img.src = "http://localhost:8000/storage/" + imageSong1[0];
        document.getElementById('nameSong').innerHTML = nameSong1[0];
        document.getElementById('viewSong').innerHTML = viewSong1[0];
        audio.load();
        let i = 0;
        let j = 0;
        let k = 0;
        let l = 0;

        audio.addEventListener('ended', function () {
            i = ++i < playList1.length ? i : 0;
            let src = 'http://localhost:8000/storage/' + playList1[i];

            j = ++j < nameSong1.length ? j : 0;
            let name = nameSong1[j];

            k = ++k < viewSong1.length ? k : 0;
            let view = viewSong1[k];

            l = ++l < imageSong1.length ? l : 0;
            let imageSrc = 'http://localhost:8000/storage/' + imageSong1[l];

            source.src = src;
            img.src = imageSrc;
            document.getElementById('nameSong').innerHTML = name;
            document.getElementById('viewSong').innerHTML = view;
            audio.load();
            audio.play();
        });


        var player = $('.player'),
            audio1 = player.find('audio'),
            duration = $('.duration'),
            currentTime = $('.current-time'),
            progressBar = $('.progress span'),
            mouseDown = false,
            rewind, showCurrentTime;

        function secsToMins(time) {
            var int = Math.floor(time),
                mins = Math.floor(int / 60),
                secs = int % 60,
                newTime = mins + ':' + ('0' + secs).slice(-2);

            return newTime;
        }

        function getCurrentTime() {
            var currentTimeFormatted = secsToMins(audio1[0].currentTime),
                currentTimePercentage = audio1[0].currentTime / audio1[0].duration * 100;

            currentTime.text(currentTimeFormatted);
            progressBar.css('width', currentTimePercentage + '%');

            if (player.hasClass('playing')) {
                showCurrentTime = requestAnimationFrame(getCurrentTime);
            } else {
                cancelAnimationFrame(showCurrentTime);
            }
        }

        function autoplay(){
            player.removeClass('paused').addClass('playing');
            audio1[0].play();
            getCurrentTime();
        }
        autoplay();
        audio1.on('loadedmetadata', function () {
            var durationFormatted = secsToMins(audio1[0].duration);
            duration.text(durationFormatted);
        }).on('ended', function () {
            if ($('.repeat').hasClass('active')) {
                audio1[0].currentTime = 0;
                audio1[0].play();
            } else {
                // player.removeClass('playing').addClass('paused');
                audio1[0].currentTime = 0;
            }
        });

        $('button').on('click', function () {
            var self = $(this);

            if (self.hasClass('play-pause') && player.hasClass('paused')) {
                player.removeClass('paused').addClass('playing');
                audio1[0].play();
                getCurrentTime();
            } else if (self.hasClass('play-pause') && player.hasClass('playing')) {
                player.removeClass('playing').addClass('paused');
                audio1[0].pause();
            }


            if (self.hasClass('shuffle') || self.hasClass('repeat')) {
                self.toggleClass('active');
            }
        }).on('mousedown', function () {
            var self = $(this);
            if (self.hasClass('ff')) {
                player.addClass('ffing');
                audio1[0].playbackRate = 16;
            }
            if (self.hasClass('rw')) {
                player.addClass('rwing');
                rewind = setInterval(function () {
                    audio1[0].currentTime -= .3;
                }, 100);
            }
        }).on('mouseup', function () {
            var self = $(this);

            if (self.hasClass('ff')) {
                player.removeClass('ffing');
                audio1[0].playbackRate = 1;
            }

            if (self.hasClass('rw')) {
                player.removeClass('rwing');
                clearInterval(rewind);
            }
        });

        player.on('mousedown mouseup', function () {
            mouseDown = !mouseDown;
        });

        progressBar.parent().on('click mousemove', function (e) {
            var self = $(this),
                totalWidth = self.width(),
                offsetX = e.offsetX,
                offsetPercentage = offsetX / totalWidth;

            if (mouseDown || e.type === 'click') {
                audio1[0].currentTime = audio1[0].duration * offsetPercentage;
                if (player.hasClass('paused')) {
                    progressBar.css('width', offsetPercentage * 100 + '%');
                }
            }
        });
    </script>
@endsection
