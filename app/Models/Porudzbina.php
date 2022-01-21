<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Porudzbina extends Model
{
    use HasFactory;
    protected $guarded=[''];

    public function hrana(){
        $this->belongsTo(Hrana::class);
    }
    public function user(){
        $this->belongsTo(User::class);
    }
}
