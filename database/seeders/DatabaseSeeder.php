<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([RoleSeeder::class]);
        User::factory()->create([
            'name' => 'Test User',
            'prenom' => 'Test PrenomUser',
            'email' => 'test@example.com',
        ]);

        $this->call([
            ContinentSeeder::class,
            GenreSeeder::class,
            EquipeSeeder::class,
            PositionSeeder::class,
            JoueurSeeder::class,
        ]);
    }
}
