<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\JobRequest;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Employee::all()->toArray();
        return array_reverse($skills);
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
        
        $employee = Employee::create([
            'user_id' => $request->user_id,
            'qualification' => $request->qualification,
            'hourly_rate' => $request->hourly_rate, 
            'experience' => $request->experience,
            // 'skills' => $request->skills, 
            'employee_type' => $request->employee_type,
            'Job_Category_ID' => $request->Job_Category_ID,
        ]);

        $response = [
            'employee' => $employee,
        ];
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
        $employee = Employee::all();

        $response = [
            'all employee' => $employee
        ];
        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
        $employee = Employee::find($id);
        $response = [
            'employee' => $employee
        ];
        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
        $employee = Employee::find($id)->update($request->all());
        $response = [
            'updated_employee' => $employee, 
            'message' => 'sucess',
        ];

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
        $employee = Employee::find($id);
        $employee->delete();

        $response = [
            'employee' => $employee,
            'message' => 'sucess',
        ];

        return response()->json($response);
    }

    public function requstJob($id){
        $authEmployee = auth()->user();
        $job = Job::find($id);

        $authUserId = $authEmployee->id;
        $jobPostUserId = $job->user->id;
        $employee = Employee::all()->where('user_id', $authUserId)->first();
        // dd($job->id);
        // dd($employee->employee_id);
        // dd($authUserId, $jobPostUserId);

        if($authUserId != $jobPostUserId){
            $jobRequest = new JobRequest([
                'employee_id' => $employee->employee_id,
                'job_id' => $job->id,
            ]);
            $jobRequest->save();
            $response = [
                'job_request' => $jobRequest,
                'message' => 'sucess',
            ];
        }else{
            $response = [
                'message' => 'Error: Unauthorized',
            ];
        }
        return response()->json($response);

    }
}
