<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restoran extends Model
{
    use HasFactory;
    protected $guarded=[''];

    public function restoran(){
        return $this->hasMany(Hrana::class);
    }
}
