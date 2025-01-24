<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Grid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('vader.playmussic')
    <div class="container py-4">
        <!-- Section 1: Silahkan pilih game kesukaanmu -->
        <div class="row mb-3">
            <div class="col-12 text-center">
                <h3>Silahkan masukkan nama para pemain</h3>
                <form id="playerForm">
                    <textarea class="form-control" placeholder="Masukkan nama teman-teman lainnya..." rows="3" required></textarea>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
                <div id="gameList" class="mt-3" style="display: none;">
                    <hr class="col-12">
                    <h3>Pilih game kesukaanmu</h3>
                    <!-- Section 2: Grid dengan card game -->
                    <div class="row">
                        @foreach ($gamedata as $game)
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card">
                                <img src="https://awsimages.detik.net.id/community/media/visual/2019/11/26/02f2b5b1-7bcc-4481-9b9e-dbdb9c726924.jpeg?w=1200" class="card-img-top" alt="Poster Game">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Game {{$game->id}}
                                    </h5>
                                    <a class="btn btn-success w-100" href="/play?i={{$game->id}}">Mulai</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
      <!-- Footer dengan tombol kembali -->
    <div class="footer col-12 text-center fixed-bottom mb-4">
        <a href="/" class="btn btn-warning">Kembali</a>
    </div>

    <script>
        // JavaScript untuk mengatur textarea
        document.getElementById('playerForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const gameList = document.getElementById('gameList');
            gameList.style.display = 'block';
        });
    </script>
        <audio id="click-sound" src="https://www.myinstants.com/media/sounds/switch-sound.mp3"></audio>
    <script>
      document.addEventListener('click', function() {
        var audio = document.getElementById('click-sound');
        audio.play();
      });
    </script>

</body>
</html>
