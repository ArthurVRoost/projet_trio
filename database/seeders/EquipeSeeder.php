<?php

namespace Database\Seeders;

use App\Models\Equipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Equipe::insert([
            [
                'nom' => 'Sans Equipe',
                'ville' => 'Pas de ville',
                'logo' => 'storage/logo/FA.png',
                'genre_id' => 3,
                'continent_id' => 1,

            ],
            [
                'nom' => 'FC Barcelone',
                'ville' => 'Barcelone',
                'logo' => 'storage/logo/FCBarcelone.png',
                'genre_id' => 1,
                'continent_id' => 1,

            ],
            [
                'nom' => 'RSC Anderlecht',
                'ville' => 'Anderlecht',
                'logo' => 'storage/logo/RSCA.png',
                'genre_id' => 3,
                'continent_id' => 1,

            ],
             [
                'nom' => 'FC Tokyo',
                'ville' => 'Tokyo',
                'logo' => 'storage/logo/FCTokyo.png',
                'genre_id' => 2,
                'continent_id' => 5,

            ],
             [
                'nom' => 'Club Atlético Boca Juniors',
                'ville' => 'Buenos Aires',
                'logo' => 'storage/logo/BocaJunior.png',
                'genre_id' => 3,
                'continent_id' => 3,

            ],
             [
                'nom' => 'Inter Miami',
                'ville' => 'Miami',
                'logo' => 'storage/logo/InterMiami.png',
                'genre_id' => 1,
                'continent_id' => 2,

            ],
             [
                'nom' => 'TP Mazembe',
                'ville' => 'Lubumbashi',
                'logo' => 'storage/logo/TPMazembe.png',
                'genre_id' => 2,
                'continent_id' => 4,

            ],
        ]);
    }
}
