<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login()
    {
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $response['status'] = true;
            $response['message'] = 'Selamat anda berhasil login';
            $response['data']['token'] = 'Bearer ' . $user->createToken('faizalpunya')->accessToken;

            return response()->json($response, 200);
        }else{
            $response['status'] = false;
            $response['message'] = 'Anda tidak terdaftar';
            return response()->json($response, 401);
        }

    }

    public function register(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name' => ['string', 'required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8']
        ]);

        if($validate->fails()){
            $response['status'] = false;
            $response['message'] = 'Gagal registrasi';
            $response['error'] = $validate->errors();
            
            return response()->json($response, 422);
        }
        
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $response['status'] = true;
        $response['message'] = 'Selamat anda berhasil registrasi';
        $response['data']['token'] = 'Bearer ' . $user->createToken('faizalpunya')->accessToken;

        return response()->json($response, 200);
        
    }

    public function details()
    {
        $user = Auth::user();
        $user = $user->makeHidden(['email_verified_at','password','remember_token']);

        $response['status'] = true;
        $response['message'] = 'User login profil';
        $response['data'] = $user;

        return response()->json($response, 200);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        $response['status'] = true;
        $response['message'] = 'Selamat anda berhasil logout';

        return response()->json($response, 200);
    }
}
