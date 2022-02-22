<?php

namespace App\Http\Controllers;

use App\Models\JobRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\Job;


class JobRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobRequest  $jobRequest
     * @return \Illuminate\Http\Response
     */
    public function show(JobRequest $jobRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobRequest  $jobRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(JobRequest $jobRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobRequest  $jobRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobRequest $jobRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobRequest  $jobRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobRequest $jobRequest)
    {
        //
    }

    public function jobRequests(){
        $authUser = auth()->user();
        $jobs = Job::all()->where('user_id', $authUser->id);
        // dd($job->requestJob);
        // $request = $job->jobRequest;
        // $job->user;
        $offer = [];
        foreach($jobs as $job){
            foreach($job->requestJob as $jojo){
                array_push($offer, $jojo->job_id);
            }
        }

        return response($offer);

    }
}
