<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['src', 'joueur_id'];
    
    public function joueur(){
        return $this->belongsTo(Joueur::class);
    }
}
