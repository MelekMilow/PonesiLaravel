<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hrana extends Model
{
    use HasFactory;
    protected $guarded=[''];

    public function restoran(){
        $this->belongsTo(Restoran::class);
    }
    public function porudzbina(){
        $this->hasMany(Porudzbina::class);
    }
}
