<?php

namespace App\Http\Controllers;

use App\Http\Resources\HranaCollection;
use App\Http\Resources\HranaResource;
use App\Models\Hrana;
use App\Rules\PostojiRestoran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HranaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hrana=Hrana::all();
        return new HranaCollection($hrana);
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
            'opis'=>'required|string|max:255',
            'cena'=>'required|float',
            'restoran'=>['required','integer',new PostojiRestoran()]
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $hrana=Hrana::create([
            'naziv'=>$request->naziv,
            'opis'=>$request->opis,
            'cena'=>$request->cena,
            'restoran'=>$request->restoran,
        ]);

        return response()->json(['Uspesno sacuvana hrana',new HranaResource($hrana)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hrana  $hrana
     * @return \Illuminate\Http\Response
     */
    public function show(Hrana $hrana)
    {
        return new HranaResource($hrana);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hrana  $hrana
     * @return \Illuminate\Http\Response
     */
    public function edit(Hrana $hrana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hrana  $hrana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hrana $hrana)
    {
        $validator = Validator::make($request->all(),[
            'naziv'=>'required|string|max:255',
            'opis'=>'required|string|max:255',
            'cena'=>'required|float',
            'restoran'=>['required','integer',new PostojiRestoran()]
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }


        $hrana->naziv = $request->naziv;
        $hrana->adresa = $request->adresa;
        $hrana->brojTelefona = $request->brojTelefona;
        $hrana->radnoVreme = $request->radnoVreme;

        $hrana->save();

        return response()->json(['Uspesno azuriran restoran',new HranaResource($hrana)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hrana  $hrana
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hrana $hrana)
    {
        $hrana->delete();
        return response()->json('Uspesno obrisana hrana.');
    }
}
