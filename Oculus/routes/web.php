<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $allblog = DB::table('Materis')->get();
    return view('welcome', compact('allblog'));
});

Route::get('/score', function () {
    if (isset($_GET['score'])) {
        session(['score' => $_GET['score']]);
    }
    $score = session('score');
    return "success save score " . $score;
});

Route::get('/blogd', function () {
    $allblog = DB::table('Materis')->get();
    return view('bloglist', compact('allblog'));
});

Route::get('/bloge', function () {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $blog = DB::table('Materis')->where('id', $id)->first();
        $nextblog = DB::table('Materis')->where('id', '>', $id)->first();
        return view('detailblog', compact('blog', 'nextblog'));
    } else {
        return back();
    }
});

Route::get('/tes', function () {
    $quiz = DB::table('Exam_Lis')->get();
    return view('tesrun', compact('quiz'));
});

Route::get('/gamepot', function () {
    $gamedata = DB::table('Game_Colaborators')->get();
    return view('listgame', compact('gamedata'));
});

Route::get('/play', function () {
    $playgame = DB::table('Game_Colaborators')->where('id', $_GET['i'])->first();
    return view('flogame', compact('playgame'));
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
