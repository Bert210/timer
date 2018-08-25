<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queued = Job::queued()->get();
        $inProgress = Job::inProgress()->get();
        $completed = Job::completed()->get();

        dd($queued, $inProgress, $completed);
    }


    public function queued() {
        return Job::queued()->get();
    }
    public function inProgress() {
        return json_encode(Job::inProgress()->get());
    }
    public function completed() {
        return Job::completed()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required', 
            'stockTagNumber' => 'required',
            'vin' => 'nullable',
        ]);

        $job = Job::create([
            "status_id" => 1,
            "type_id" => $validatedData["type"],
            "employee_id" => 1,
            "stock_tag_number" => $validatedData["stockTagNumber"],
        ]);

        // dd($job);

        if($job){
            return json_encode([
                "data" => "Success",
                "err" => null,
            ]);
        }else{
            return json_encode([
                "data" => "Failed",
                "err" => "Job was not created",
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }

    public function startJob(Job $job, Request $request) {

        $validatedData = $request->validate([
            'timeStarted' => 'required', 
        ]); 

        var_dump($validatedData['timeStarted']);
        
        $job->queue = (int)$validatedData['timeStarted'];
        $job->status_id = 2;
        $job->save();
    }

    public function completeJob(Job $job, Request $request) {

        $validatedData = $request->validate([
            'timeCompleted' => 'required', 
        ]); 

        $job->processing = (int)$validatedData['timeCompleted'];
        $job->status_id = 3;
        $job->save();

    }
}