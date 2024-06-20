<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/background.css">
    <link rel="stylesheet" href="../css/run.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <header>
        <div class="header-left">
            <div class="menu-icon">
                <span class="material-icons">menu</span>
            </div>
            <img class="logo" src="../Assets/Image/01_MainLogo.png" alt="Logo">
        </div>        
        <div class="header-center">
            <div class="search-bar">
                <span class="material-icons search-icon">search</span>
                <input type="text" placeholder="Tìm kiếm bài hát, nghệ sĩ">
            </div>
        </div>
        <div>

        </div>
        @if (!Auth::check())
            <div class="auth-container">
                <button id="loginButton">Login</button>
                <button id="registerButton">Register</button>
            </div>
        @else
            <div class="header-right">
                <div class="profile-picture">
                    <img src="../Assets/Image/02_Cheems.png" alt="Profile Picture">
                </div>
                <div class="dropdown-menu">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <ul>
                        <li>Account</li>
                        <li style="color: orangered;" id="logout-link">Logout</li>
                    </ul>
                </div>
            </div>
        @endif
    </header>
    
    <script src="../js/index.js"></script>
    <main>
        <div class="mainLeft">
            <div class="menu-item">
                <span class="material-icons">home</span>
                <span>Trang chủ</span>
            </div>
            <div class="menu-item">
                <span class="material-icons">explore</span>
                <span>Khám phá</span>
            </div>
            <div class="menu-item" style="margin-bottom: 20px;">
                <span class="material-icons">library_music</span>
                <span>Thư viện</span>
            </div>
            <div class="queue">
                <button class="create-playlist">
                    <span class="material-icons">add</span>
                    Create New Playlist
                </button>
                <ul class="playlist-list">
                    @foreach($playlists as $playlist)
                        <li class="playlist-item" data-playlist-id="{{ $playlist->id }}">
                            <span class="material-icons">queue_music</span>{{ $playlist->name }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="modal hidden" id="playlistModal">
            <div class="modal-content">
                <h2>Lưu vào danh sách phát</h2>
                <h3 style="background-color: transparent; margin-bottom: 10px;">Tất cả danh sách phát</h3>
                <div class="playlist-list" style="margin-bottom: 30px;">
                    <div class="playlist-item" style="padding-left: 20px;">
                        <img src="../Assets/Image/00_driver.png" alt="Liked Songs Icon" class="playlist-icon">
                        <div>
                            <span>Nhạc đã thích</span>
                            <span>6 bài hát</span>
                        </div>
                    </div>
                </div>
                <div id="saveList">
                    <button class="new-playlist-button cancel-saveList">
                        Hủy
                    </button>
                    <button class="new-playlist-button">
                        <span class="material-icons">add</span>
                        <span id="OpenListPlay">Danh sách phát mới</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="modal hidden" id="createPlaylistModal">
            <div class="modal-content">
                <h2>Danh sách phát mới</h2>
                <form id="create-playlist-song" action="{{ route('indexPlaylists') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" id="title" name="title" placeholder="Tiêu đề">
                    </div>
                    <button type="button" class="cancel">Hủy</button>
                    <button type="submit" id="create">Tạo</button>
                </form>
            </div>
        </div>
        <div class="mainCenter ">
            <div class="image-container">
                <img id="rotatingImage" src="../Assets/Image/00_driver.png" alt="Rotating Image" style="width: 400px; height: 400px;">
                <audio id="audioPlayer" src=" {{ asset('Assets/Music/15.mp3') }}" ></audio>
            </div>
        </div>
        <div class="mainRight ">
            <div class="playlist-header">
                <span class="tab active">TIẾP THEO</span>
                <span class="tab">LỜI NHẠC</span>
                <span class="tab">LIÊN QUAN</span>
            </div>
            <ul class="playlist">
                {{-- @foreach($playlistsTrack as $playlistuser)
                    <li class="playlist-item">
                        <img src="../Assets/Image/00_driver.png" alt="Song 1">
                        <div class="song-info">
                            <span class="song-title">{{ $playlistuser->track_id }}</span>
                            <span class="artist">Ariana Grande và The Weeknd</span>
                        </div>
                        <span class="song-duration">3:57</span>
                    </li>
                @endforeach --}}
            </ul>
        </div>
    </main>
    <script src="../js/run.js"></script>
    <div class="run">
        <div class="rangeProgress">
            <input type="range" id="progressBar" min="0" max="100" value="0" class="progress-bar">
        </div>
        <div class="controls">
            <span class="material-icons" id="shuffle">shuffle</span>
            <span class="material-icons">skip_previous</span>
            <span id="play-pause" class="material-icons">play_arrow</span>
            <span class="material-icons">skip_next</span>
            <span class="material-icons" id="repeat">repeat</span>
            <div class="volume">
                <span class="material-icons">volume_up</span>
            </div>
            <div class="volume-slider-container">
                <input type="range" id="volumeSlider" class="volume-slider" orient="vertical" min="0" max="100" value="100">
            </div>
            <div class="time-info">
                <span id="currentTime">0:00</span>
                <span style="margin-left: 5px; margin-right: 5px;"> / </span>
                <span id="duration">2:59</span>
            </div>
            <div class="track-info">
                <span>Dragonfly</span>
                <span>Rikard From</span>
            </div>
            <span class="material-icons" id="playlist_add">playlist_add</span>
            <span class="material-icons" id="favorite">favorite_border</span>
            <span class="material-icons">get_app</span>
            <span class="material-icons" style="font-size: 30px;" id="rotate-icon">arrow_drop_down</span>
        </div>
    </div>
    <footer>

    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.playlist-item').on('click', function() {
                var playlistId = $(this).data('playlist-id');

                $.ajax({
                    url: '/playlist/' + playlistId + '/tracks',
                    method: 'GET',
                    success: function(response) {
                        var songList = $('.playlist');
                        songList.empty();

                        response.forEach(function(playlistTrack) {
                            var track = playlistTrack.track;

                            var listItem = `
                                <li class="playlist-item">
                                    <img src="../Assets/Image/00_driver.png" alt="Song">
                                    <div class="song-info">
                                        <span class="song-title">${track.name}</span>
                                        <span class="artist">${track.artist_name}</span>
                                    </div>
                                    <span class="song-duration">${track.duration}</span>
                                </li>
                            `;
                            songList.append(listItem);
                        });
                    },
                    error: function(error) {
                        console.error('Error fetching playlist tracks:', error);
                    }
                });
            });
        });
    </script>
</body>
</html>