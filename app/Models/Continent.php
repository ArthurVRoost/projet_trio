<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    protected $fillable = ['nom'];

    public function equipe(){
        return $this->hasMany(Equipe::class);
    }
}
