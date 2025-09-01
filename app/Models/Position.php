<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = ['position'];

    public function joueur(){
        return $this->hasMany(Joueur::class);
    }
}
