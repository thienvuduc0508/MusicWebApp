@extends('layouts.app')
@section('content')
    <div class="player paused mt-5">
        <div class="album">
            <div class="cover">
                <div><img src="{{asset('storage/'.$song->image)}}" alt="3rdburglar by Wordburglar"/></div>
            </div>
        </div>

        <div class="info">
            <div class="time">
                <span class="current-time">0:00</span>
                <span class="progress" style="height: 0.125em"><span></span></span>
                <span class="duration">0:00</span>
            </div>
            <h2>{{$song->name}}</h2>
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
            <div id="headphones" style="font-size: 20px"><i class="fa fa-headphones"></i> {{$song->view}}</div>
            &nbsp
            &nbsp
            <div id="headphones" style="font-size: 20px"><i class="fa fa-thumbs-o-up"></i> {{count($song->likes)}}</div>
        </div>
        <audio autoplay preload src="{{asset('storage/'.$song->audio)}}"></audio>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="mt-2">Ca sĩ thực hiện:
        @if(count($song->singers)==0)
            <span>Chưa rõ</span>
        @else
            @foreach($song->singers as $singer)
                <a href="{{route("singer.detailSinger",$singer->id)}}">{{$singer->name}}</a>
                ;
            @endforeach
        @endif
    </div>
    <div class="mt-2">
        @if(Auth::user())
            @if(!$checkstatus )
                <a href="{{route('like.create',$song->id)}}">
                    <button type="submit" class="btn btn-outline-primary"><i class="fa fa-thumbs-o-up"></i> Like
                    </button>
                </a>
            @else
                <a href="{{route('like.delete',$song->id)}}">
                    <button type="submit" class="btn btn-outline-primary"><i class="fa fa-thumbs-o-down"></i> Unlike
                    </button>
                </a>
            @endif
            <a href="{{route('playlists.showAddSong',$song->id)}}">
                <button type="button" class="btn btn-info" style="font-size: 20px">
                    <img src="{{asset('https://image.flaticon.com/icons/svg/865/865922.svg')}}" alt="" height="25px">
                    Thêm vào playlist
                </button>
            </a>

            @if(Auth::id() == $song->user->id)
                <a href="{{route('singer.showAddSingerToSong',$song->id)}}">
                    <button type="button" class="btn btn-info" style="font-size: 20px">
                        Thêm ca sĩ thực hiện
                    </button>
                </a>
            @endif
        @endif
    </div>
    <div style="font-size: 20px" class="mt-3">
        <label style="font-weight: bold">Lời Bài Hát</label>
        <br>
        {!!$song->description!!}
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h3 style="text-align: center">Bình luận</h3>
                <hr>
                @if(count($song->comments) == 0)
                    <h4 class="text-danger">Chưa có bình luận nào!</h4>
                @else
                    <div class="ml-2">
                        @foreach($song->comments as $comment)
                            <div class="display-comment">
                                <div>
                                    <img src="{{asset("storage/".$comment->user->image)}}" width="50px" height="50px"
                                         style="border-radius: 50%" alt="">
                                    <strong>{{ $comment->user->name }}: </strong>
                                    <span>{!! $comment->comment !!}</span>
                                </div>
{{--                                <p>lúc {{ $comment['created_at']->hour }}:{{ $comment['created_at']->minute}}</p>--}}
                                <hr>
                            </div>
                        @endforeach
                    </div>
                @endif
                @if(Auth::user())
                <h4 style="text-align: center">viết bình luận</h4>
                <div class="ml-5 mr-5 mb-3">
                    <form method="post" action="{{route('comment.createCommentInSong',$song->id)}}">
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
        var player = $('.player'),
            audio = player.find('audio'),
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
            var currentTimeFormatted = secsToMins(audio[0].currentTime),
                currentTimePercentage = audio[0].currentTime / audio[0].duration * 100;

            currentTime.text(currentTimeFormatted);
            progressBar.css('width', currentTimePercentage + '%');

            if (player.hasClass('playing')) {
                showCurrentTime = requestAnimationFrame(getCurrentTime);
            } else {
                cancelAnimationFrame(showCurrentTime);
            }
        }

        function autoplay() {
            player.removeClass('paused').addClass('playing');
            audio[0].play();
            getCurrentTime();
        }

        autoplay();
        audio.on('loadedmetadata', function () {
            var durationFormatted = secsToMins(audio[0].duration);
            duration.text(durationFormatted);
        }).on('ended', function () {
            if ($('.repeat').hasClass('active')) {
                audio[0].currentTime = 0;
                audio[0].play();
            } else {
                player.removeClass('playing').addClass('paused');
                audio[0].currentTime = 0;
            }
        });

        $('button').on('click', function () {
            var self = $(this);

            if (self.hasClass('play-pause') && player.hasClass('paused')) {
                player.removeClass('paused').addClass('playing');
                audio[0].play();
                getCurrentTime();
            } else if (self.hasClass('play-pause') && player.hasClass('playing')) {
                player.removeClass('playing').addClass('paused');
                audio[0].pause();
            }


            if (self.hasClass('shuffle') || self.hasClass('repeat')) {
                self.toggleClass('active');
            }
        }).on('mousedown', function () {
            var self = $(this);
            if (self.hasClass('ff')) {
                player.addClass('ffing');
                audio[0].playbackRate = 10;
            }

            if (self.hasClass('rw')) {
                player.addClass('rwing');
                rewind = setInterval(function () {
                    audio[0].currentTime -= .3;
                }, 100);
            }
        }).on('mouseup', function () {
            var self = $(this);

            if (self.hasClass('ff')) {
                player.removeClass('ffing');
                audio[0].playbackRate = 1;
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
                audio[0].currentTime = audio[0].duration * offsetPercentage;
                if (player.hasClass('paused')) {
                    progressBar.css('width', offsetPercentage * 100 + '%');
                }
            }
        });
    </script>
@endsection
