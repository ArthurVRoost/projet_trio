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
        
        // Créer d'abord les joueurs manuels pour s'assurer qu'ils ont leur place
        $joueur1 = Joueur::create([
            'nom' => 'Jeanne',
            'prenom' => 'Charles',
            'age' => 25,
            'tel' => '0123456789',
            'email' => 'jeannecharles@email.com',
            'pays' => 'Belgique',
            'position_id' => 2,
            'equipe_id' => 1,
            'genre_id' => 2,
            'user_id' => null
        ]);
        $joueur1->photo()->create(['src' => 'joueurs_photos/joueur-5.jpeg']);
        
        $joueur2 = Joueur::create([
            'nom' => 'Declerq',
            'prenom' => 'Pieter',
            'age' => 29,
            'tel' => '0123455689',
            'email' => 'declerqpieter@email.com',
            'pays' => 'Pays-Bas',
            'position_id' => 3,
            'equipe_id' => 1,
            'genre_id' => 1,
            'user_id' => null
        ]);
        $joueur2->photo()->create(['src' => 'joueurs_photos/joueur-1.jpeg']);
        
        // Ensuite créer les joueurs via la factory
        Joueur::factory()
            ->count(30)
            ->create()
            ->each(function ($joueur) use ($photos1, $photos2) {
                // la photo sera attribuée en fonction du sexe du joueur.
                // si le sexe du joueur est 1 (homme), alors on va choper aléatoirement une photo dans la collection photos1.
                $src = $joueur->genre_id == 1 ? collect($photos1)->random() : collect($photos2)->random();
                // on crée ensuite la photo liée au joueur créée automatiquement via la factory, en passant par la relation photo() se trouvant dans le modèle 'Joueur'.
                $joueur->photo()->create([
                    'src' => 'joueurs_photos/' . $src
                ]);
            });
    }
}