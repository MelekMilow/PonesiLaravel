<?php

namespace App\Http\Controllers;

use App\Http\Resources\RestoranCollection;
use App\Http\Resources\RestoranResource;
use App\Models\Restoran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RestoranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restorani=Restoran::all();
        return new RestoranCollection($restorani);
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
            'naziv'=>'required|string|max:255',
            'adresa'=>'required|string|max:255',
            'brojTelefona'=>'required|string',
            'radnoVreme'=>'required|string'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $restoran=Restoran::create([
            'naziv'=>$request->naziv,
            'adresa'=>$request->adresa,
            'brojTelefona'=>$request->brojTelefona,
            'radnoVreme'=>$request->radnoVreme,
        ]);

        return response()->json(['Uspesno sacuvan restoran',new RestoranResource($restoran)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restoran  $restoran
     * @return \Illuminate\Http\Response
     */
    public function show(Restoran $restoran)
    {
        return new RestoranResource($restoran);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restoran  $restoran
     * @return \Illuminate\Http\Response
     */
    public function edit(Restoran $restoran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restoran  $restoran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restoran $restoran)
    {
        $validator = Validator::make($request->all(),[
            'naziv'=>'required|string|max:255',
            'adresa'=>'required|string|max:255',
            'brojTelefona'=>'required|string',
            'radnoVreme'=>'required|string'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }


        $restoran->naziv = $request->naziv;
        $restoran->adresa = $request->adresa;
        $restoran->brojTelefona = $request->brojTelefona;
        $restoran->radnoVreme = $request->radnoVreme;

        $restoran->save();

        return response()->json(['Uspesno azuriran restoran',new RestoranResource($restoran)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restoran  $restoran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restoran $restoran)
    {
        $restoran->delete();
        return response()->json('Uspesno obrisan restoran');
    }
}
