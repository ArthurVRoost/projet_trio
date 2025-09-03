# Consignes

## Objectif

Choisis un sport d'équipe pour lequel crée la palteforme suivante:
Concevoir une App full backend Laravel permettant de :
créer des équipes rattachées à un continent ;
gérer jusqu’à 15 joueurs par équipe (par défaut), avec quotas par position selon le sport ;
Les position sont au minimum de 3 + un position réserve. Le nombre de joueur max par position est 4.
Si un en ajoutant un joueur a une équipe, la position est full, il passe automatiquement en réserve.
Attention, si il n'y a plus de place a sa position ou en réserve dans une équipe il ne peut pas être ajouté a l'équipe.
Dans ce cas le joueurs est simplement sans équipe.
Minimum 35 joueurs en seed (factories autorisé)
Minimum 5 équipes
classer les équipes et joueurs par genre (H/F/Mixte) ;
Donc on peut ajouter que des joueurs dont le genre correspond a l'équipe.

afficher des messages flash lorsque les contraintes ne sont pas respectées (ex. quota de position atteint).
Front minimal : pages listes/détails en Blade suffisent. Le back est réservé aux comptes authentifiés ; les invités (guests) peuvent uniquement consulter les listes.
Une nav avec (home, players, teams, login/register)
Un carroussel cohérent avec le thème.
Une section avec toutes les équipes européene
Une section avec 8 joueurs random d'équipe européene
Une section avec 4 équipe random hors europes
Une section avec 8 joueuse random hors europe
une section avec 4 joueurs ou joueuse sans équipe
Un footer propre et carré

Page players: (menu dropdown: Masculin ou féminin)

Soit une liste avec un show, soit des cards avec un show.
Show du joueur:
nom, prenom, age, pays, position, equipe (si équipe, sinon un string indique joueur sans équipe)

Page teams: (dropdown selon continent) au clique sur teams directement, on est sur un all
Une liste avec les équipe, au show de l'équipe:
On voit les joueurs dans l'équipe avec leurs différentes positions.
Si on clique sur un joueurs, on arrive sur son show.

## Niveau backend:

appliquer des règles d’autorisation (utilisateur, coach, admin) avec gates et middlewares ;

Données de départ (migrations fournies)

---

Tu pars de ces tables (adaptation autorisée si nécessaire) :

-   role: id, role
-   user: nom, prenom, email, password, role_id
-   continents: id, nom,
-   genres: id, genre (Homme, Femme)
-   equipes: id, nom (unique), ville, pays, continent_id (FK), genre_id(FK)->nullable(null pour les equipe mixte), logo(img ou url)
-   postions: id, position,
-   photos: id, src, joueur_id
-   joueurs: id, nom, prenom, age, phone, email, pays, position_id (FK), equipe_id (FK nullable, set null), genre_id (FK), user_id(FK)->nullable

Authentification (Breeze) & rôles de compte

---

Installe Laravel Breeze (stack Blade).

# CRUDS

-   le guest ne peut rien créer, ni modifier ni supprimer, il a juste accès au front.

-   le role user a accès au back et peut uniqement créer des joueurs, son back est restrient a ses droits. il peut modifier et supprimer uniquement ses propre joueurs qu'il a crée.

-   le role coach peut créer des joueurs et des équipes. Il peut uniquement modifier et supprimer ses propre équipes. Son back est restreint a ses droits (cela signifie qu'il ne voit que créate player et create team, il n'as plus d'options...)

-   le role admin peut tout créer: player et team, tout modifier, même les joueurs et les équipes crée par les coachs et les users. Il peut également modifier le rôle des user ou les supprimer. Si un user est supprimé, son contenu reste...

---

## Tables

### Roles

-   Changement de string en ->enum
-   Ajout de Guest

---

## Controllers

### UserController.php

---

## Middlewares

### bootstrap/app.php

-   alias des middlewares pour grouper les routes par rôles

### AdminMiddleware

-   Okayge

### CoachMiddleware

-   Okayge

### UserMiddleware

-   Okayge

---

## CRUD & Gestion

### 1. User

-   Okayge

### 2. Coach

-   Gestion Equipes - //
-   Gestion Joueurs - //

### 3. Admin

-   Gestion User + Possibilité de créer un user
-   Gestion Equipes - //
-   Gestion Joueurs - //

---

## Permissions | navigation.blade.php

### Guest

-   Okayge

### User

-   Okayge

### Coach

-   Okayge

### Admin

-   Okayge
