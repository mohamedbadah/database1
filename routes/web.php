<?php

use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
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

Route::get('show', function () {
    $tasks = DB::table('tasks')->get();
    // dd($tasks);
    return view('show', compact('tasks'));
});
Route::post('store', function (Request $r) {
    DB::table('tasks')->insert([
        'title' => $r->title
    ]);
    return redirect()->back();
});
Route::post('del', function () {
    $tasks = DB::table('tasks')->get();
    if (true) {
        foreach ($tasks as $t => $task) {

            DB::table('tasks')->where('title', '=', $task->title)->delete();
        }
    }
    return redirect()->back();
});
