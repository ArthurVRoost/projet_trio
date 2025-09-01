<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joueur extends Model
{

    use HasFactory;
    protected $fillable = ['nom', 'prenom', 'age', 'tel', 'email', 'pays', 'position_id', 'equipe_id', 'genre_id', 'user_id'];

    public function equipe(){
        return $this->belongsTo(Equipe::class);
    }

    public function position(){
        return $this->belongsTo(Position::class);
    }

    public function genre(){
        return $this->belongsTo(Genre::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function photo(){
        return $this->hasOne(Photo::class);
    }
}
