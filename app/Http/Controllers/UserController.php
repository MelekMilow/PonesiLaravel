<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $korisnici=User::all();
        return new UserCollection($korisnici);
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(),[
            'ime'=>'required|string|max:255',
            'prezime'=>'required|string|max:255',
            'username'=>'required|string|max:50',
            'password'=>'required|string|min:5',
            'adresa'=>'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }


        $user->ime = $request->ime;
        $user->prezime = $request->prezime;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->adresa = $request->adresa;
        $user->save();

        return response()->json(['Uspesno azuriran korisnik',new UserResource($user)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json('Uspesno obrisan korisnik');
    }
}
