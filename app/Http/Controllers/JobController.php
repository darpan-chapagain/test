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

        $response = ['job' => $job];
        return response()->json($response);
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
        $job = Job::all()->where('user_id', $userID);
        $response = [
            'job' => $job
        ];
        return response()->json($response);

    }

    public function postStatusChange($id){
        $job = Job::find($id);
        $status = $job->status;
        if($status == 1){
            $update = 3;
        }elseif($status == 3){
            $update = 1;
        }elseif($status == 2){
            $update = 4;
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

    public function getOtherJobs(){
        $userID = auth()->user()->id;
        $job = Job::all()->except($userID);
        $reponse = [
            'other_post' => $job,
        ];
        return response()->json($response);
    }

    public function getInProgressJobs(){
        // dd('test');
        $authUser = auth()->user();
        // $job = Job::all()->where('user_id', $userID);
        $jobs = Job::all()->where('user_id', $authUser->id);
        // dd($job->requestJob);
        // $request = $job->jobRequest;
        // $job->user;
        $offer = [];
        $detailJob = [];
        foreach($jobs as $job){
            foreach($job->requestJob as $req){
                // array_push($offer, $req->job_id);
                $stat = $req->status;
                $emp = $req->reqEmployee;
                $employees = $emp->user;
                if($stat == 2){
                    array_push($offer, $employees); 
                    array_push($detailJob, $job->id); 
                // array_push($offer, $employees);
                }
            }
        }
        $response = [
            'offers' => $offer,
            'job' => $detailJob,
        ];
        return response($response);
    }

    public function completeJob(Request $request, $id){
        $userID = auth()->user()->id;
        $job = Job::select('*')
            ->where('user_id', $userID)
            ->where('id', $id)
            ->first();
        $req = $job->requestJob[0];
        // $user = User::all()->where('id', $userID)->first();
        // dd($req->status);
        if ($req->status == 2){
            $req->status = 4;
            $job->status = 4;
            // $user->points += 100;
        }
        $job->save();
        $req->save();
        $response = [
            'job' => $job
        ];
    }
}
