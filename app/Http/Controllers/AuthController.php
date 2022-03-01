<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Models\UserRoles;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            'first_name' => 'required|string',
            // 'last_name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            'role_id' =>  'required'
        ]);
        // dd('test');
        try{
            $user = User::create([
                'first_name' => $fields['first_name'],
                // 'last_name' => $fields['last_name'],
                'email' => $fields['email'],
                'password' => bcrypt($fields['password']),
            ]);

            $userRole = UserRoles::create([
                'user_id' => $user->id,
                'role_id' => $fields['role_id']
            ]);
    
            $token = $user->createToken('myapptoken')->plainTextToken;
            $success = true;
            $message = 'User register successfully';
        }catch (\Illuminate\Database\QueryException $ex){
            $success = false;
            $message = $ex->getMessage();
            $token = null;
        }


        try{
            if($fields['role_id'] == 3){
                $employee = Employee::create([
                    'user_id' => $user->id,
                    'qualification' => $request->qualification,
                    'hourly_rate' => $request->hourly_rate, 
                    'experience' => $request->experience,
                    // 'skills' => $request->skills, 
                    'employee_type' => $request->employee_type,
                    'Job_Category_ID' => $request->Job_Category_ID,
                ]);
                
                $type = 'employee';
            }else{
                $type = 'user';
            }
        }catch (\Illuminate\Database\QueryException $ex){
            $success = false;
            $message = $ex->getMessage();
            $token = null;
        }

        $response = [
            // 'user' => $user,
            'token' => $token,
            'success' => $success,
            'message' => $message,
            'id' => $user->id,
            'type' => $type,
        ];

        return response()->json($response);
    }

    public function logout(Request $request){
        
        try{
            // auth()->user()->tokens()->delete();
            Session::flush();
            auth()->user()->tokens()->delete();
            // Auth::logout();
            $success = true;
            $message = 'Successfully logged out';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }
        

        // return[
        //     'message' => 'logged out'
        // ];

        $response = [
            'test' => Auth::user(),
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);
    }

    public function login(Request $request){
        
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $success = true;
            $message = 'User login successfully';
            $user = User::where('email', $fields['email'])->first();
            $token = $user->createToken('myapptoken')->plainTextToken;            
        } else {
            $success = false;
            $message = 'Unauthorised';
            $token = null;
            $user = null;
        }

        //check email and password
        // $user = User::where('email', $fields['email'])->first();

        // if(!$user || !Hash::check($fields['password'], $user->password)){
        //     $success = false;
        //     $message = 'Unauthorised';
        //     $token = null;
        //     // return response([
        //     //     'message' => 'Bad creds'
        //     // ], 401);
        // }
        // else{
        //     $token = $user->createToken('myapptoken')->plainTextToken;
        //     $success = true;
        //     $message = 'User login successfully';
        // }

        

        $response = [
            'test' => Auth::user(),
            'user' => $user,
            'token' => $token,
            'success' => $success,
            'message' => $message,
        ];

        // return response($response, 201);
        return response()->json($response);

    }
}
