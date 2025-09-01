<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Joueur;

class JoueurFactory extends Factory
{
    protected $model = Joueur::class;

    public function definition(): array
    {
        $genre_id = $this->faker->randomElement([1, 2]); 

        // Attribution de l'équipe en fonction du genre du joueur:
        $equipe_id = $genre_id == 1 ? $this->faker->randomElement([1, 4, 3]) : $this->faker->randomElement([2, 5, 3]); 

        return [
            'nom'        => $this->faker->lastName(),
            'prenom'     => $this->faker->firstName(),
            'age'        => $this->faker->numberBetween(18, 35),
            'tel'        => $this->faker->phoneNumber(),
            'email'      => $this->faker->unique()->safeEmail(),
            'pays'       => $this->faker->country(),
            'position_id'=> $this->faker->numberBetween(1, 4),
            'equipe_id'  => $equipe_id,
            'genre_id'   => $genre_id,
            'user_id'    => null,
        ];
    }
}