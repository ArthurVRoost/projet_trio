<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    protected $fillable = ['nom', 'ville', 'continent_id', 'logo', 'genre_id'];

    public function continent(){
        return $this->belongsTo(Continent::class);
    }

    public function joueur(){
        return $this->hasMany(Joueur::class);
    }
    public function genre(){
        return $this->belongsTo(Genre::class);
    }
}
