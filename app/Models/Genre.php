<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['sexe'];

    public function joueur(){
        return $this->hasMany(Joueur::class);
    }
}
