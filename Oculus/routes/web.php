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
    return view('welcome');
});

Route::get('/blogd', function () {
    $allblog=DB::table('posts')->get();
    // dump($allblog);
    return view('bloglist',compact('allblog'));
});
Route::get('/bloge', function () {
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        $blog=DB::table('posts')->where('id',$id)->first();
        // dump($blog);
        return view('detailblog',compact('blog'));
    }else{
        return back();
    }
});
Route::get('/tes', function () {
    return view('tesrun');
});





Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
