@extends('layouts.app')
@section('content')
    <h1 class="text-center text-capitalize">Danh sách bài hát trong playlist</h1>
    @if(count($songs)==0)
        <p class="alert alert-warning">Chưa có bài hát nào</p>
    @else
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('done'))
            <div class="alert alert-success">
                {{ session('done') }}
            </div>
        @endif
        @if (session('failed'))
            <div class="alert alert-success">
                {{ session('failed') }}
            </div>
        @endif
        <table class="table table-striped text-center mt-2  ">
            <tr>
                <th>#</th>
                <th>Tên Bài Hát</th>
                <th>Ảnh</th>
                <th>Lượt Nghe</th>
                <th>Xóa</th>
            </tr>
            <p id="a"></p>
            <div id="playlist">
                @foreach($songs as $key=>$song)
                    <tr style="font-size: 20px">
                        <td>{{++$key}}</td>
                        <td><a href="{{route("songs.play",$song->id)}}" style="text-decoration: none">{{$song->name}}</a>
                        </td>
                        <td>
                            <img class="play-music" src="{{asset('storage/'.$song->image)}}"
                                 style="width: 50px;height: 50px; border-radius: 50px">
                        </td>

                        <td>
                            <i class="fa fa-btn fa-headphones"> {{$song->view}}</i>
                        </td>
                        <td>
                            <a href="{{route('playlists.deleteSong',[$playlist->id,$song->id])}}">
                                <button class="btn btn-outline-danger"
                                        onclick="return confirm('Bạn chắc chắn muốn xóa bài hát này?');">
                                    <i class="fa fa-btn fa-ban" ></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </div>

            @endif
        </table>
        </div>

        <audio controls id="playmusicPlay" autoplay>
            <source id="audioSource" src="" type="audio/ogg">
            Your browser does not support the audio element.
        </audio>


        <script>
            var playList = `<?php echo json_encode($arr); ?>`;
            // let playList = [
            //     "audios/m6gBff3U7anTQOeZmHRSPA7pM57VQPbmP4jjuLTk.mpga",
            //     "audios/bAwNDFvqYXXFRJCPYpwRCT0Tg16kzZTyHryity4F.mpga",
            //     "audios/BGYH3r716pdOfaoXlmzddCMyhZKBTN07nfBXpFhD.mpga"
            // ];

            var playList1 = JSON.parse(playList);

            let audio = document.getElementById('playmusicPlay');
            var source = document.getElementById('audioSource');

            source.src = "http://localhost:8000/storage/" + playList1[0];
           audio.load();
           audio.play();


             let i = 0;
           // // audio.src = 'storage/' + playList[0].audio;
           //  audioPromise = audio.play();
           //  // var src = '';
            audio.addEventListener('ended', function () {
                console.log(playList1);
                i = ++i < playList1.length ? i : 0;
                //   console.log(i, playList[i]);
                let src = 'http://localhost:8000/storage/' + playList1[i];
                source.src = src;
                console.log(source);
                audio.load();
                audio.play();
            });
           //
           //
           //  if (audioPromise !== 'undefined') {
           //      audioPromise.then(function () {
           //          audio.play()
           //      }).catch(function () {
           //      })
           //  }

        </script>

@endsection

