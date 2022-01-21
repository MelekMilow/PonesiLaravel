<?php

namespace App\Http\Controllers;

use App\Http\Resources\PorudzbinaCollection;
use App\Http\Resources\PorudzbinaResource;
use App\Models\Porudzbina;
use App\Models\User;
use App\Rules\PostojiUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PorudzbinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $porudzbine=Porudzbina::all();
        return new PorudzbinaCollection($porudzbine);
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
        $validator=Validator::make($request->all(),[
            'hrana_id'=>['required','integer',new PostojiHrana()],
            'user_id'=>['required','integer',new PostojiUser()],
            'opis'=>'required|string|max:255',
            'cena'=>'required|float',

        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $porudzbina = Porudzbina::create([
            'hrana_id'=>$request->hrana_id,
            'user_id'=>$request->user_id,
            'opis'=>$request->opis,
            'cena'=>$request->cena,
        ]);
        return response()->json(['Uspesno sacuvana porudzbina',new PorudzbinaResource($porudzbina)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Porudzbina  $porudzbina
     * @return \Illuminate\Http\Response
     */
    public function show(Porudzbina $porudzbina)
    {
        return new PorudzbinaResource($porudzbina);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Porudzbina  $porudzbina
     * @return \Illuminate\Http\Response
     */
    public function edit(Porudzbina $porudzbina)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Porudzbina  $porudzbina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Porudzbina $porudzbina)
    {

        $validator=Validator::make($request->all(),[
            'hrana_id'=>['required','integer',new PostojiHrana()],
            'user_id'=>['required','integer',new PostojiUser()],
            'opis'=>'required|string|max:255',
            'cena'=>'required|float',

        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $porudzbina->naziv = $request->naziv;
        $porudzbina->adresa = $request->adresa;
        $porudzbina->brojTelefona = $request->brojTelefona;
        $porudzbina->radnoVreme = $request->radnoVreme;

        $porudzbina->save();

        return response()->json(['Uspesno azurirana porudzbina',new PorudzbinaResource($porudzbina)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Porudzbina  $porudzbina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Porudzbina $porudzbina)
    {
        $porudzbina->delete();
        return response()->json('Uspesno obrisana porudzbina.');
    }
}
