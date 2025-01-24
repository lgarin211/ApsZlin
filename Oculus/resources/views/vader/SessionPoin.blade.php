@php
if (session()->has('patcing')) {
    $patcing = session('patcing');
} else {
    session(['patcing' => 0]);
    $patcing = 0;
}
@endphp
