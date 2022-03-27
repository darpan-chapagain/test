<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;
use App\Models\Employee;
use App\Models\JobRequest;
use Illuminate\Support\Facades\Auth;
use Session;
// use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all()->toArray();
        return array_reverse($user);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::all();

        $response = [
            'all users' => $user
        ];
        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        $response = [
            'user' => $user
        ];
        return response()->json($response);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::find($id)->update($request->all());
        $response = [
            'updated_user' => $user, 
            'message' => 'sucess',
        ];

        return response()->json($response);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        $response = [
            'user' => 'user',
            'message' => 'sucess',
        ];

        return response()->json($response);
    }

    public function changeStatus($id)
    {
        $user = User::find($id);
        $status = $user->status;
        if($status == 1){
            $update = 2;
        }else{
            $update = 1;
        }
        $user->update([
            'status' => $update
        ]);
        $response = [
            'user' => $user,
            'status' => $user->status,
        ];
        return response()->json($response);
    }

    public function getActiveUser(){
        // $user = User::where('status', '=', 1)->get();
        $user = User::all()->where('status', '=', 1)->first();
        $response = [
            'active_user' => $user,
        ];
        return response()->json($response);
    }

    public function offerJob(Request $request, $id){
        $authUser = auth()->user();
        // $employee = User::find($id);

        $authUserId = $authUser->id;
        // $employeeUserId = $employee->user->id;
        $employee = Employee::all()->where('user_id', $id)->first();
        // dd($job->id);
        // dd($employee->employee_id);
        // dd($authUserId, $employeeUserId);

        // dd($employee);
        if($authUserId != $id){
            $job = new Job([
                'user_id' => $authUserId,
                'title' =>  $request->title,
                'description' =>  $request->description,
                'size' =>  $request->size, 
                'time' =>  $request->time, 
                'experience' =>  $request->experience,
                'salary_offered' =>  $request->salary_offered,
                'job_category_id' => $request->job_category_id,
                'status' => 2,
            ]);
            $job->save();

            $jobRequest = new JobRequest([
                'employee_id' => $employee->employee_id,
                'job_id' => $job->id,
            ]);

            $jobRequest->save();
            $response = [
                'job' => $job,
                'job_request' => $jobRequest,
                'message' => 'success',
            ];
        }else{
            $response = [
                'message' => 'Error: Unauthorized',
            ];
        }
        return response()->json($response);
    }

    public function chooseEmployee(Request $request, $id, $jobId){
        $authUser = auth()->user();
        $employee = Employee::all()->where('user_id', $id)->first();
        // dd($employee->employee_id);
        $jobRequest = JobRequest::all()
            ->where('employee_id', $employee->employee_id)
            ->where('job_id', $jobId)
            ->first();
        $jobRequest->status = 2;
        $jobRequest->save();
        $otherRequests = JobRequest::where('job_id', $jobId)
            ->where('job_employement_id', '!=', $jobRequest->job_employement_id);
        $otherRequests->update(['status' => 3]);
// dd($otherRequests);
        // foreach($otherRequests as $otherRequest){
        //     // dd($otherRequest->job_employement_id);
        //     $otherRequest->status = 3;
        //     $jobRequest->save();
        // }
        // $jobRequest->save();
            $response = [
            'status' => 'success',
        ];
        
        return response()->json($response);

    }

    public function getPendingJob(Request $request, $jobId){
        $authUser = auth()->user();
        $jobRequest = JobRequest::all()
            ->where('job_id', $jobId)
            ->where('status', 2);
        $jobRequest->save();
        $response = [
            'pending_jobs' => $jobRequest,
        ];
        return response()->json($response);
    }

    public function rejectEmployee(Request $request, $id, $jobId){
        $authUser = auth()->user();
        $employee = Employee::all()->where('user_id', $id)->first();
        // dd($employee->employee_id);
        $jobRequest = JobRequest::all()
            ->where('employee_id', $employee->employee_id)
            ->where('job_id', $jobId)
            ->first();
        $jobRequest->status = 3;
        $jobRequest->save();
            $response = [
            'status' => 'success',
        ];
        
        return response()->json($response);

    }
}
