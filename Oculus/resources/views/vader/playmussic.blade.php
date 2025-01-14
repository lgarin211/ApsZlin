@php
if(session()->has('patcing')){
    $patcing = session('patcing');
}else{
    session(['patcing' => 0]);
    $patcing = 0;
}

if (session()->has('score')) {
    $score = session('score');
} else {
    session(['score' => 0]);
    $score = 0;
}
@endphp

{{-- play audio at  http://127.0.0.1:8000/latar.mp3 in 50% volume --}}
<div style="display: none">
    <audio id="audio" controls autoplay loop>
        <source src="{{ asset('latar.mp3') }}" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
</div>
<script>
function playAudio() {
    var x = document.getElementById("audio");
    x.volume = 0.5;
    x.play();
}

function kosi() {
    setTimeout(() => {
        try {
            playAudio();
        }
        catch (error) {
            console.log(error);
            kosi();
        }
            }, 1000);
}

</script>
