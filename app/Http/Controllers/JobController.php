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
        $queued = Job::queued()->with(["status", "type"])->get()->toArray();
        $inProgress = Job::inProgress()->with(["type", "employee"])->get()->toArray();
        $completed = Job::completed()->with(["type","employee"])->get()->toArray();

        dd($queued, $inProgress, $completed);
    }


    public function queued() {
        return Job::queued()->with(["status", "type"])->get();
    }

    public function inProgress() {
        return Job::inProgress()->with(["status", "type", "employee"])->get();
    }

    public function completed() {
        return Job::completed()->with(["status", "type", "employee"])->get();
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
            'vip' => 'required|boolean',
            'startTime' => "required|numeric",
        ]);

        // dd($validatedData);

        $job = Job::create([
            "status_id" => 1,
            "type_id" => $validatedData["type"],
            "employee_id" => 1,
            "stock_tag_number" => $validatedData["stockTagNumber"],
            "vip" => $validatedData["vip"],
            "created_at_ms" => $validatedData["startTime"]
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

        $job->queue = (int)$validatedData['timeStarted'];
        $job->queue_time = (int)$validatedData['timeStarted'] - $job->created_at_ms;
        $job->status_id = 2;
        $job->save();
    }

    public function completeJob(Job $job, Request $request) {

        $validatedData = $request->validate([
            'timeCompleted' => 'required', 
        ]); 

        $timeCompleted = (int)$validatedData['timeCompleted'];

        $job->processing = $timeCompleted;
        $job->processing_time = $timeCompleted - $job->queue;
        $job->total_time = $timeCompleted - $job->created_at_ms;
        $job->status_id = 3;
        $job->save();

    }
}