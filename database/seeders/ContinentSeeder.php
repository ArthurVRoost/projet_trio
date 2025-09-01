<?php

namespace Database\Seeders;

use App\Models\Continent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContinentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Continent::insert([
            ['nom' => 'Europe'],
            ['nom' => 'Amérique du Nord'],
            ['nom' => 'Amérique du Sud'],
            ['nom' => 'Afrique'],
            ['nom' => 'Asie'],
            ['nom' => 'Océanie'],
            ['nom' => 'Antarctique'],
        ]);
    }
}
