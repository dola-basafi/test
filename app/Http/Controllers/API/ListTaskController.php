<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ListTaskController extends Controller
{
    function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => ['required'],
            'password' => ['required']
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'messages' => $validator->errors()
            ],400);
        }
        $user = User::where('email',$request['email'])->first();
        if (!$user) {
            return response()->json([
                'status' => false,
                'messages' => 'email anda belum terdaftar'
            ],400);
        }
        if (!Auth::attempt($request->only('email','password'))) {
            return response()->json([
                'status' => false,
                'messages' => 'email atau password anda masukkan salah'
            ],400);
        }
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'status' => true,
            'messages' => [
                'token' => $token                
            ]
            ],200);
    }

    function taskList(Request $request){
        $data = Task::where('user_id',$request->user()->id)->paginate(10);
        return response()->json([
            'status' => true,
            'messages' => $data
        ]);        
    }
}
