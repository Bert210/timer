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
    $types = App\Type::all();

    return view('index')
        ->with("queued", $queued)
        ->with("inProgress", $inProgress)
        ->with("completed", $completed)
        ->with("types", $types);
});

Route::get('/history', function () {
    $jobs = App\Job::with(['status', 'type', 'employee'])->get();

    $avgQueue = App\Job::where('status_id', '>', 2)->get()->avg('queue_time');
    $avgProcessing = App\Job::where('status_id', '>=', 3)->get()->avg('processing_time');
    $avgTotal = App\Job::where('status_id', '>=', 3)->get()->avg('total_time');

    $types = App\Type::all();
    // dd(request()->query());
    if(request()->query("dd")){
        dd($jobs, $avgQueue, $avgProcessing, $avgTotal, $types);
    }

    return view('history')
        ->with("jobs", $jobs)
        ->with("types", $types)
        ->with('avgQueue', $avgQueue)
        ->with('avgProcessing', $avgProcessing)
        ->with('avgTotal', $avgTotal);

});

Route::get("/jobs", "JobController@index");
Route::post("/jobs", "JobController@store");
Route::post("/jobs/{job}/startJob", "JobController@startJob");
Route::post("/jobs/{job}/completedJob", "JobController@completeJob");
Route::get("/jobs/queued", "JobController@queued");
Route::get("/jobs/inProgress", "JobController@inProgress");
Route::get("/jobs/completed", "JobController@completed");

