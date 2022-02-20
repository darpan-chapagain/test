<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jobs = Job::all()->toArray();
        return array_reverse($jobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //show post except own post
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->user()->id);
        $userID = auth()->user()->id;
        $job = new Job([
            'user_id' => $userID,
            'title' =>  $request->title,
            'description' =>  $request->description,
            'size' =>  $request->size, 
            'time' =>  $request->time, 
            'experience' =>  $request->experience,
            'salary_offered' =>  $request->salary_offered,
            'job_category_id' => $request->job_category_id,

        ]);

        $job->save();

        $reponse = ['title' => $job];
        return response()->json($job);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::all();

        $response = [
            'all data' => $job
        ];
        return response()->json($job);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::find($id);
        $response = [
            'job' => $job
        ];
        return response()->json($response);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $job = Job::find($id)->update($request->all());
        // $job->update($request->all());

        return response()->json('The job successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $job = Job::find($id);
        $job->delete();

        return response()->json('The book successfully deleted');
    }

    public function myPost()
    {
        $userID = auth()->user()->id;
        $job = Job::where('user_id', $userID);
        $response = [
            'job' => $job
        ];
        return response()->json($response);

    }

    public function postStatusChange($id){
        $job = Job::find($id);
        $status = $job->status;
        if($status == 1){
            $update = 2;
        }else{
            $update = 1;
        }
        $job->update([
            'status' => $update
        ]);
        $response = [
            'job' => $job,
            'status' => $job->status,
        ];
        return response()->json($response);
    }

    public function getActivePost(){
        $job = Job::where('status', '=', 1)->get();
        $response = [
            'active_post' => $job,
        ];
        return response()->json($response);
    }
}
