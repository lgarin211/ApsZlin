<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Play Game</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <style>
        body {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }
        .game-container {
            flex: 1 0 80%; /* Menggunakan 80% dari tinggi halaman */
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px dashed #ccc;
            margin: 20px 0;
        }
        .footer {
            text-align: center;
            padding: 10px;
            background-color: #f8f9fa;
        }
    </style> -->

    <style>
        .interacty_wrapper{
            height: 90dvh !important;
            overflow: hidden !important;
        }
        body {
            display: flex;
            flex-direction: column;
            height: 100dvh !important;
            overflow: hidden !important;
        }
    </style>
</head>
<body>
    <div class="row">
            <!-- Selamat bermain -->
        <div class="col-12 text-center mt-3">
            <h1>Selamat Bermain!</h1>
        </div>

        <!-- Halaman permainan -->
        <div class="col-12" style="height: 90dvh !important;">
            {!! $playgame->game_sectoryzer !!}
        </div>

        <!-- Footer dengan tombol kembali -->
        <div class="footer col-12 text-center fixed-bottom mb-4">
            <a href="/gamepot" class="btn btn-warning">Kembali ke Pages ListGame</a>
        </div>
    </div>
</body>
</html>
