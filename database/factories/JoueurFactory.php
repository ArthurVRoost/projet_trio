<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Joueur;
use App\Models\Equipe;

class JoueurFactory extends Factory
{
    protected $model = Joueur::class;
    
    public function definition(): array
    {
        $genre_id = $this->faker->randomElement([1, 2]); 
        
        // Attribution de l'équipe en fonction du genre du joueur:
        $equipes_possibles = $genre_id == 1 ? [1, 4, 3] : [2, 5, 3];
        
        // Attribution d'un prénom masculin ou féminin en fonction du genre :
        $prenom = $genre_id == 1 ? $this->faker->firstName('male') : $this->faker->firstName('female');
        
        // Trouver une équipe et position disponibles
        $assignation = $this->trouverEquipeEtPosition($equipes_possibles, $genre_id);
        
        return [
            'nom'        => $this->faker->lastName(),
            'prenom'     => $prenom,
            'age'        => $this->faker->numberBetween(18, 35),
            'tel'        => $this->faker->phoneNumber(),
            'email'      => $this->faker->unique()->safeEmail(),
            'pays'       => $this->faker->country(),
            'position_id'=> $assignation['position_id'],
            'equipe_id'  => $assignation['equipe_id'],
            'genre_id'   => $genre_id,
            'user_id'    => null,
        ];
    }
    
    private function trouverEquipeEtPosition($equipes_possibles, $genre_id)
    {
        // Récupérer TOUTES les équipes disponibles (pas seulement celles du genre)
        $toutes_equipes = Equipe::all();
        $equipes_compatibles = [];
        
        // Prioriser les équipes du bon genre, puis ajouter les équipes mixtes
        foreach ($toutes_equipes as $equipe) {
            if ($equipe->genre_id == $genre_id) {
                $equipes_compatibles[] = $equipe->id;
            } elseif ($equipe->genre_id == 3) { // équipes mixtes
                $equipes_compatibles[] = $equipe->id;
            }
        }
        
        // Mélanger pour randomiser
        $equipes_melangees = collect($equipes_compatibles)->shuffle();
        
        foreach ($equipes_melangees as $equipe_id) {
            // Vérifier que l'équipe n'est pas pleine (max 15 joueurs)
            $nombre_joueurs = Joueur::where('equipe_id', $equipe_id)->count();
            if ($nombre_joueurs >= 15) {
                continue;
            }
            
            // Chercher une position disponible dans cette équipe
            $positions_disponibles = collect([1, 2, 3, 4])->shuffle();
            
            foreach ($positions_disponibles as $position_id) {
                // Compter les joueurs dans cette position pour cette équipe
                $joueurs_dans_position = Joueur::where('equipe_id', $equipe_id)
                                              ->where('position_id', $position_id)
                                              ->count();
                
                if ($joueurs_dans_position < 3) {
                    return [
                        'equipe_id' => $equipe_id,
                        'position_id' => $position_id
                    ];
                }
            }
        }
        
        // Si vraiment aucune place n'est trouvée dans les équipes compatibles,
        // chercher dans TOUTES les équipes (en cas d'urgence)
        $toutes_equipes_ids = $toutes_equipes->pluck('id')->shuffle();
        
        foreach ($toutes_equipes_ids as $equipe_id) {
            $nombre_joueurs = Joueur::where('equipe_id', $equipe_id)->count();
            if ($nombre_joueurs >= 15) {
                continue;
            }
            
            $positions_disponibles = collect([1, 2, 3, 4])->shuffle();
            
            foreach ($positions_disponibles as $position_id) {
                $joueurs_dans_position = Joueur::where('equipe_id', $equipe_id)
                                              ->where('position_id', $position_id)
                                              ->count();
                
                if ($joueurs_dans_position < 3) {
                    return [
                        'equipe_id' => $equipe_id,
                        'position_id' => $position_id
                    ];
                }
            }
        }
        
        // En dernier recours
        return [
            'equipe_id' => 1,
            'position_id' => 1
        ];
    }
}