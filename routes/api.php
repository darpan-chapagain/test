<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PostSkillController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobRequestController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\JobCategoryController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('me/data', [AuthController::class, 'me']);
    // Route::get('/', [JobsController::class, 'index']);
    // Route::post('add', [JobsController::class, 'add']);
    // Route::get('edit/{id}', [JobsController::class, 'edit']);
    // Route::post('update/{id}', [JobsController::class, 'update']);
    // Route::delete('delete/{id}', [JobsController::class, 'delete']);
});

Route::group(['middleware' => ['auth:sanctum']], function(){
    // Route::post('create', [JobController::class, 'create']);
    // Route::get('edit/{id}', [JobController::class, 'edit']);
    // Route::post('update/{id}', [JobController::class, 'update']);
    // Route::delete('delete/{id}', [JobController::class, 'delete']);
    Route::resource('/job', JobController::class);
    Route::get('/jobs/user/show', [JobController::class, 'myPost']);
    // Route::resource('/jobs/skill', PostSkillController::class);
    Route::post('/employee/request/{id}', [EmployeeController::class, 'requstJob']);//request jobs from posted job
    Route::post('/user/offer/{id}', [UserController::class, 'offerJob']);//offer job to an employee
    Route::get('/user/my-job/requests', [JobRequestController::class, 'jobRequests']); //this is to get job requests by employer
    Route::get('/user/my-job/offers', [JobRequestController::class, 'getMyJobProposals']); //this is to get job offer to employer
    Route::get('/employee/offers', [JobRequestController::class, 'jobOffer']); //this is to get job offer to employee
    Route::get('/job/progress/', [JobController::class, 'getInProgressJobs']); //this is to get job in progress
    Route::post('/job/complete/{id}', [JobController::class, 'completeJob']); //this is to complete a job
    Route::post('/user/choose/{userId}/{jobId}', [UserController::class, 'chooseEmployee']); //this is to choose employee
    Route::post('/user/reject/{userId}/{jobId}', [UserController::class, 'rejectEmployee']); //this is to reject employee
    Route::post('/employee/accept/{jobId}', [EmployeeController::class, 'jobOfferStatus']);
    Route::resource('/blog', BlogController::class);
    //this is to accept jos by employee
});
Route::resource('/jobs/category', JobCategoryController::class);
// Route::resource('/job', JobController::class);
Route::resource('/skill', SkillController::class);
Route::resource('/user', UserController::class);
Route::post('/user/update/status/{id}', [UserController::class, 'changeStatus']);
Route::get('/user/status/active', [UserController::class, 'getActiveUser']);
Route::post('/job/update/status/{id}', [JobController::class, 'postStatusChange']);
Route::get('/job/status/active', [JobController::class, 'getActivePost']);





