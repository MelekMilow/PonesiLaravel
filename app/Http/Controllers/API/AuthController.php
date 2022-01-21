<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request){

        $validator = Validator::make($request->all(),[
            'ime'=>'required|string|max:255',
            'prezime'=>'required|string|max:255',
            'username'=>'required|string|unique:users|max:50',
            'password'=>'required|string|min:5',
            'adresa'=>'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $user=User::create([
            'ime'=>$request->ime,
            'prezime'=>$request->prezime,
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
            'adresa'=>$request->adresa,
        ]);

        return response()->json(['Uspesno sacuvan korisnik',new UserResource($user)]);

    }

    public function login(Request $request){

        if(!Auth::attempt($request->only('username','password'))){
            return response()->json(['poruka'=>'Unauthorized',401]);
        }

        $user = User::where('username',$request['username'])->firstOrFail();
        $token=$user->createToken('auth_token')->plainTextToken;

        return response()->json(['poruka'=>'Uspesno ste se prijavili.','access_token'=>$token,'token_type'=>'Bearer']);

    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        return ['poruka'=>'Uspesna odjava'];
    }
}
