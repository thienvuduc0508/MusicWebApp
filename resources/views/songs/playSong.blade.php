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
    @foreach($song->singers as $singer)
        {{$singer->name}};
    @endforeach
</div>
    <div class="mt-2">
        @if(Auth::user())
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
        function autoplay(){
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
