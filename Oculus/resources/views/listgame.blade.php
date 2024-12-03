<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Grid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-4">
        <!-- Section 1: Silahkan pilih game kesukaanmu -->
        <div class="row mb-3">
            <div class="col-12 text-center">
                <h3>Silahkan pilih game kesukaanmu</h3>
                <button id="selectGameBtn" class="btn btn-primary mt-3">Pilih Game</button>
                <div id="friendInput" class="mt-3" style="display: none;">
                    <textarea class="form-control" placeholder="Masukkan nama teman-teman lainnya..." rows="3"></textarea>
                    <hr class="col-12">
        
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
        document.getElementById('selectGameBtn').addEventListener('click', function () {
            const friendInput = document.getElementById('friendInput');
            friendInput.style.display = friendInput.style.display === 'none' ? 'block' : 'none';
        });
    </script>
</body>
</html>
