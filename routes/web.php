<?php

use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Client\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Event\RequestEvent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    $tasks = DB::table('std')->get();
    //dd($tasks);
    return view('about', compact('tasks'));
});
Route::get('/show/{id}', function ($id) {
    // $task = DB::table('std')->where('id', $id)->first();
    $task = DB::table('std')->find($id);
    //dd($task);
    return view('show', compact(('task')));
});
