<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Joueur;

class JoueurSeeder extends Seeder
{
    public function run(): void
    {
        $photos1 = ['joueur-1.jpeg', 'joueur-2.jpeg', 'joueur-3.jpeg', 'joueur-4.jpeg']; // joueurs hommes
        $photos2 = ['joueur-5.jpeg', 'joueur-6.jpeg', 'joueur-7.jpeg', 'joueur-8.jpeg']; // joueuses femmes

        Joueur::factory()
            ->count(30)
            ->create()
            ->each(function ($joueur) use ($photos1, $photos2) {
                $src = $joueur->genre_id == 1 ? collect($photos1)->random() : collect($photos2)->random();

                // on 'crée' ensuite la photo liée au joueur
                $joueur->photo()->create([
                    'src' => 'storage/joueurs_photos/' . $src,
                ]);
            });
    }
}
