<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\PostSkillController;
use App\Http\Controllers\UserController;


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
    // Route::get('/', [JobsController::class, 'index']);
    // Route::post('add', [JobsController::class, 'add']);
    // Route::get('edit/{id}', [JobsController::class, 'edit']);
    // Route::post('update/{id}', [JobsController::class, 'update']);
    // Route::delete('delete/{id}', [JobsController::class, 'delete']);
});

Route::group(['middleware' => ['auth:sanctum', 'isUser']], function(){
    // Route::post('create', [JobController::class, 'create']);
    // Route::get('edit/{id}', [JobController::class, 'edit']);
    // Route::post('update/{id}', [JobController::class, 'update']);
    // Route::delete('delete/{id}', [JobController::class, 'delete']);
    Route::resource('/job', JobController::class);
    Route::get('/job/myPost/show', [JobController::class, 'myPost']);
    Route::resource('/jobs_skill', PostSkillController::class);
});

// Route::resource('/job', JobController::class);
Route::resource('/skill', SkillController::class);
Route::resource('/jobs_skill', PostSkillController::class);
Route::resource('/user', UserController::class);
Route::post('/user/update/status/{id}', [UserController::class, 'changeStatus']);
Route::get('/user/status/active', [UserController::class, 'getActiveUser']);
Route::post('/job/update/status/{id}', [JobController::class, 'postStatusChange']);
Route::get('/job/status/active', [JobController::class, 'getActivePost']);




