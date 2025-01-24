<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal Pilihan Ganda dengan Timer</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <style>
        .fixed-footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Soal Pilihan Ganda</h2>
        <!-- Nav tabs -->
        <ul class="nav nav-pills justify-content-center" id="quizTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab1" data-bs-toggle="pill" href="#content1" role="tab" aria-controls="content1" aria-selected="true">Soal 1</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab2" data-bs-toggle="pill" href="#content2" role="tab" aria-controls="content2" aria-selected="false">Soal 2</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab3" data-bs-toggle="pill" href="#content3" role="tab" aria-controls="content3" aria-selected="false">Soal 3</a>
            </li>
        </ul>
        <!-- Tab content -->
        <div class="tab-content mt-3" id="quizTabsContent">
            <!-- Soal 1 -->
            <div class="tab-pane fade show active" id="content1" role="tabpanel" aria-labelledby="tab1">
                <h4>Soal 1</h4>
                <p>Pilih jawaban yang tepat:</p>
                <form id="form1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question1" id="q1a" value="A">
                        <label class="form-check-label" for="q1a">A. Pilihan A</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question1" id="q1b" value="B">
                        <label class="form-check-label" for="q1b">B. Pilihan B</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question1" id="q1c" value="C">
                        <label class="form-check-label" for="q1c">C. Pilihan C</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question1" id="q1d" value="D">
                        <label class="form-check-label" for="q1d">D. Pilihan D</label>
                    </div>
                    <button type="button" class="btn btn-primary mt-3" id="nextBtn1" onclick="nextTab(2)">Next</button>
                </form>
            </div>
            <!-- Soal 2 -->
            <div class="tab-pane fade" id="content2" role="tabpanel" aria-labelledby="tab2">
                <h4>Soal 2</h4>
                <p>Pilih jawaban yang tepat:</p>
                <form id="form2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question2" id="q2a" value="A">
                        <label class="form-check-label" for="q2a">A. Pilihan A</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question2" id="q2b" value="B">
                        <label class="form-check-label" for="q2b">B. Pilihan B</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question2" id="q2c" value="C">
                        <label class="form-check-label" for="q2c">C. Pilihan C</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question2" id="q2d" value="D">
                        <label class="form-check-label" for="q2d">D. Pilihan D</label>
                    </div>
                    <button type="button" class="btn btn-primary mt-3" onclick="nextTab(3)">Next</button>
                </form>
            </div>
            <!-- Soal 3 -->
            <div class="tab-pane fade" id="content3" role="tabpanel" aria-labelledby="tab3">
                <h4>Soal 3</h4>
                <p>Pilih jawaban yang tepat:</p>
                <form id="form3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question3" id="q3a" value="A">
                        <label class="form-check-label" for="q3a">A. Pilihan A</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question3" id="q3b" value="B">
                        <label class="form-check-label" for="q3b">B. Pilihan B</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question3" id="q3c" value="C">
                        <label class="form-check-label" for="q3c">C. Pilihan C</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question3" id="q3d" value="D">
                        <label class="form-check-label" for="q3d">D. Pilihan D</label>
                    </div>
                    <button type="button" class="btn btn-success mt-3" onclick="submitQuiz()">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Fixed Footer with Timer -->
    <div class="fixed-footer" id="timer">
        <p id="countdown"></p>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.js"></script>
    <script>
        var time = 30 * 60; // 30 minutes in seconds
        var countdownElement = document.getElementById("countdown");

        function updateTimer() {
            var minutes = Math.floor(time / 60);
            var seconds = time % 60;
            countdownElement.textContent = "Waktu tersisa: " + minutes + " menit " + seconds + " detik";

            if (time === 0) {
                clearInterval(timerInterval);
                Swal.fire({
                    icon: 'error',
                    title: 'Waktu Habis',
                    text: 'Waktu kuis telah habis. Harap submit jawaban Anda.',
                });
            } else {
                time--;
            }
        }

        var timerInterval = setInterval(updateTimer, 1000);

        function nextTab(tabNumber) {
            if (tabNumber === 2) {
                const selectedOption = document.querySelector('input[name="question1"]:checked');
                if (!selectedOption) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: 'Anda harus memilih salah satu jawaban untuk Soal 1 sebelum melanjutkan.',
                    });
                    return;
                }
            }
            var myTab = new bootstrap.Tab(document.getElementById('tab' + tabNumber));
            myTab.show();
        }

        function submitQuiz() {
            Swal.fire({
                icon: 'success',
                title: 'Kuis Selesai',
                text: 'Terima kasih telah menyelesaikan kuis!',
            });
            window.location.href = "/";
        }
    </script>
</body>
</html>
