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
        /* Fixed Footer */
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
        <ul class="nav nav-pills justify-content-center" id="quizTabs" role="tablist"></ul>

        <!-- Tab content -->
        <div class="tab-content mt-3" id="quizTabsContent"></div>
    </div>

    <!-- Fixed Footer with Timer -->
    <div class="fixed-footer" id="timer">
        <p id="countdown"></p>
    </div>

    <!-- Fullscreen Modal -->
    <div class="modal fade" id="startModal" tabindex="-1" aria-labelledby="startModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="startModalLabel">Mulai Kuis</h5>
                </div>
                <div class="modal-body">
                    <form id="startForm">
                        <div class="mb-3">
                            <label for="studentName" class="form-label">Nama Siswa</label>
                            <input type="text" class="form-control" id="studentName" name="studentName" value="{{ old('studentName', session('studentName')) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="studentNumber" class="form-label">Nomor Absen</label>
                            <input type="number" class="form-control" id="studentNumber" name="studentNumber" value="{{ old('studentNumber', session('studentNumber')) }}" required>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="honestyCheck" required>
                            <label class="form-check-label" for="honestyCheck">
                                Saya mengerjakan ini dengan jujur dan berani
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Mulai</button>

                        <div class="text-center mt-3">
                            @if (session()->has('score') && session('score') != 0)
                                <h3>NILAI SEBELUMNYA </h3>
                                <h1 style="font-size:10rem;color: {{ session('score') > 60 ? 'green' : 'red' }};">{{ session('score') }}</h1>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.js"></script>

    <script>
        // Timer countdown (30 minutes)
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

        var timerInterval;

        var soallist = [
            @foreach ($quiz as $it)
            {
                "soal": `{!! $it->Soal !!}`,
                "jawaban": ["{{ $it->q1 }}", "{{ $it->q2 }}", "{{ $it->q3 }}", "{{ $it->q4 }}"],
                "jawabanbenar": {{ $it->anw - 1 }}
            },
            @endforeach
        ];

        var jawabanuser = [];

        function loadQuestions() {
            var quizTabs = document.getElementById('quizTabs');
            var quizTabsContent = document.getElementById('quizTabsContent');

            soallist.forEach((item, index) => {
                // Create tab
                var tab = document.createElement('li');
                tab.className = 'nav-item';
                tab.role = 'presentation';
                tab.innerHTML = `
                    <a class="nav-link ${index === 0 ? 'active' : ''}" id="tab${index + 1}" data-bs-toggle="pill" href="#content${index + 1}" role="tab" aria-controls="content${index + 1}" aria-selected="${index === 0 ? 'true' : 'false'}">Soal ${index + 1}</a>
                `;
                quizTabs.appendChild(tab);

                // Create tab content
                var tabContent = document.createElement('div');
                tabContent.className = `tab-pane fade ${index === 0 ? 'show active' : ''}`;
                tabContent.id = `content${index + 1}`;
                tabContent.role = 'tabpanel';
                tabContent.ariaLabelledby = `tab${index + 1}`;
                tabContent.innerHTML = `
                    <h4>Soal ${index + 1}</h4>
                    <p>${item.soal}</p>
                    <form id="form${index + 1}"></form>
                    <button type="button" class="btn ${index === soallist.length - 1 ? 'btn-success' : 'btn-primary'} mt-3" onclick="${index === soallist.length - 1 ? 'submitQuiz()' : `nextTab(${index + 2})`}">${index === soallist.length - 1 ? 'Submit' : 'Next'}</button>
                `;
                quizTabsContent.appendChild(tabContent);

                // Add answers to form
                var form = document.getElementById(`form${index + 1}`);
                item.jawaban.forEach((jawaban, i) => {
                    var div = document.createElement('div');
                    div.className = 'form-check';
                    div.innerHTML = `
                        <input class="form-check-input" type="radio" name="question${index + 1}" id="q${index + 1}${i}" value="${i}">
                        <label class="form-check-label" for="q${index + 1}${i}">${jawaban}</label>
                    `;
                    form.appendChild(div);
                });
            });
        }

        function nextTab(tabNumber) {
            // Save user answer
            var currentTab = tabNumber - 1;
            var selectedOption = document.querySelector(`input[name="question${currentTab}"]:checked`);
            if (selectedOption) {
                jawabanuser[currentTab - 1] = parseInt(selectedOption.value);
            }

            // Validation for current question
            if (!selectedOption) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: `Anda harus memilih salah satu jawaban untuk Soal ${currentTab} sebelum melanjutkan.`,
                });
                return;
            }

            // Move to next tab
            var myTab = new bootstrap.Tab(document.getElementById('tab' + tabNumber));
            myTab.show();
        }

        function submitQuiz() {
            // Save user answer for the last question
            var selectedOption = document.querySelector(`input[name="question${soallist.length}"]:checked`);
            if (selectedOption) {
                jawabanuser[soallist.length - 1] = parseInt(selectedOption.value);
            }

            // Calculate score
            var score = 0;
            soallist.forEach((item, index) => {
                if (jawabanuser[index] === item.jawabanbenar) {
                    score++;
                }
            });
            console.log(score*100/20);

            // save score to session using fetch
            fetch('/score?score=' + score*100/soallist.length)
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                })

            Swal.fire({
                icon: 'success',
                title: 'Kuis Selesai',
                text: `Terima kasih telah menyelesaikan kuis! Nilai Anda adalah ${score*100/soallist.length} dari ${score+'/'+soallist.length}.`,
            });
            console.log(jawabanuser);

            setTimeout(() => {
                window.location.href = '/';
            }, 2000);
        }

        document.getElementById('startForm').addEventListener('submit', function (event) {
            event.preventDefault();
            var studentName = document.getElementById('studentName').value;
            var studentNumber = document.getElementById('studentNumber').value;
            var honestyCheck = document.getElementById('honestyCheck').checked;

            if (studentName && studentNumber && honestyCheck) {
                // Start the timer
                timerInterval = setInterval(updateTimer, 1000);
                // Hide the modal
                var startModal = bootstrap.Modal.getInstance(document.getElementById('startModal'));
                startModal.hide();
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Harap isi semua bidang dan centang kotak untuk melanjutkan.',
                });
            }
        });

        // Show the modal on page load
        var startModal = new bootstrap.Modal(document.getElementById('startModal'), {
            backdrop: 'static',
            keyboard: false
        });
        startModal.show();

        loadQuestions();
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
