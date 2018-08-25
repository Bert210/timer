<?php


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
    $queued = App\Job::queued()->get();
    $inProgress = App\Job::inProgress()->get();
    $completed = App\Job::completed()->get();

    return view('index')
        ->with("queued", $queued)
        ->with("inProgress", $inProgress)
        ->with("completed", $completed);
});

Route::get('/history', function () {
    $jobs = App\Job::all();

    // dd(request()->query());
    if(request()->query("dd")){
        dd($jobs);
    }

    return view('history')->with("jobs", $jobs);
});

Route::get("/jobs", "JobController@index");
Route::post("/jobs", "JobController@store");
Route::post("/jobs/{job}/startJob", "JobController@startJob");