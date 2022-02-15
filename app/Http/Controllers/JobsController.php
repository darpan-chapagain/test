<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    // all jobs
    public function index()
    {
        $jobs = Job::all()->toArray();
        return array_reverse($jobs);
    }

    // add jobs
    public function add(Request $request)
    {
        $job = new job([
            'title' => $request->title,
            'description' => $request->description, 
            'size' => $request->size,
            'time'=> $request->time, 
            'experience'=> $request->experience,
            'salary_offered'=> $request->salary_offered
        ]);
        $job->save();

        return response()->json('The Job was successfully added');
    }

    // edit job
    public function edit($id)
    {
        $job = Job::find($id);
        return response()->json($job);
    }

    // update job
    public function update($id, Request $request)
    {
        $job = Job::find($id);
        $job->update($request->all());

        return response()->json('The job successfully updated');
    }

    // delete job
    public function delete($id)
    {
        $job = Job::find($id);
        $job->delete();

        return response()->json('The job successfully deleted');
    }

}
