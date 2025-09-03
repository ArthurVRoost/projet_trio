{{-- @extends('') --}}
{{-- @section('title', 'Créer un-e nouveau-elle joueur-euse') --}}



{{-- @section('content') --}}

{{-- @endsection --}}


{{-- <section class="pt-4">
    <div class="container">
        <div class="row justify-content-center">
            
            <div class="col-12 d-flex justify-content-center mb-3">
               
                <form action="{{route('joueurs.store')}}" method='post' enctype="multipart/form-data">
                    @csrf
                    <label for="nom" class="form-label">Nom :</label><br>
                    <input type="text" name="nom" value="{{old('nom')}}"><br>
                    <label for="prenom" class="form-label">Prénom :</label><br>
                    <input type="text" name="prenom" value="{{old('prenom')}}"><br>
                    <label for="age" class="form-label">Age :</label><br>
                    <input type="number" name="age" value="{{old('age')}}"><br>
                    <label for="genre" class="form-label">Genre :</label><br>
                    <select name="genre" id="">
                        @foreach ($genres as $genre)
                        <option value="{{$genre->id}}">{{$genre->sexe}}</option>
                        @endforeach
                    </select><br>
                    <label for="tel" class="form-label">Tel :</label><br>
                    <input type="text" name="tel" value="{{old('tel')}}"><br>
                    <label for="pays" class="form-label">Pays :</label><br>
                    <input type="text" name="pays" value="{{old('pays')}}"><br>
                    <label for="position" class="form-label">Position :</label><br>
                    <select name="position" id="">
                        @foreach ($positions as $position)
                        <option value="{{$position->id}}">{{$position->position}}</option>
                        @endforeach
                    </select><br>
                    <label for="equipe" class="form-label">Équipe :</label><br>
                    <select name="equipe" id="">
                        @foreach ($equipes as $equipe)
                        <option value="{{$equipe->id}}">{{$equipe->nom}}</option>
                        @endforeach
                    </select><br>
                    <input type="file" name="src" id=""><br>
                    <button type="submit">Ajouter</button>

                </form>
                <a href="{{route('joueurs.index')}}">back to all players</a>
            </div>


        </div>
    </div>
</section> --}}

<section class="pt-4">
    <div class="container">
        <div class="row justify-content-center">
            
            <div class="col-12 d-flex justify-content-center mb-3">
               
                <form action="{{route('joueurs.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- Nom --}}
                    <label for="nom" class="form-label">Nom :</label><br>
                    <input type="text" id="nom" name="nom" value="{{old('nom')}}">
                    @error('nom')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <br>

                    {{-- Prénom --}}
                    <label for="prenom" class="form-label">Prénom :</label><br>
                    <input type="text" id="prenom" name="prenom" value="{{old('prenom')}}">
                    @error('prenom')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <br>

                    {{-- Âge --}}
                    <label for="age" class="form-label">Age :</label><br>
                    <input type="number" id="age" name="age" value="{{old('age')}}">
                    @error('age')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <br>

                    {{-- Genre --}}
                    <label for="genre" class="form-label">Genre :</label><br>
                    <select name="genre" id="genre">
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}" {{ old('genre') == $genre->id ? 'selected' : '' }}>
                                {{ $genre->sexe }}
                            </option>
                        @endforeach
                    </select>
                    @error('genre')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <br>

                    {{-- Téléphone --}}
                    <label for="tel" class="form-label">Tel :</label><br>
                    <input type="text" id="tel" name="tel" value="{{old('tel')}}">
                    @error('tel')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <br>

                    {{-- Pays --}}
                    <label for="pays" class="form-label">Pays :</label><br>
                    <input type="text" id="pays" name="pays" value="{{old('pays')}}">
                    @error('pays')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <br>

                    {{-- Position --}}
                    <label for="position" class="form-label">Position :</label><br>
                    <select name="position" id="position">
                        @foreach ($positions as $position)
                            <option value="{{ $position->id }}" {{ old('position') == $position->id ? 'selected' : '' }}>
                                {{ $position->position }}
                            </option>
                        @endforeach
                    </select>
                    @error('position')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <br>

                    {{-- Équipe --}}
                    <label for="equipe" class="form-label">Équipe :</label><br>
                    <select name="equipe" id="equipe">
                        @foreach ($equipes as $equipe)
                            <option value="{{ $equipe->id }}" {{ old('equipe') == $equipe->id ? 'selected' : '' }}>
                                {{ $equipe->nom }}
                            </option>
                        @endforeach
                    </select>
                    @error('equipe')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <br>

                    {{-- Photo --}}
                    <label for="src" class="form-label">Photo :</label><br>
                    <input type="file" id="src" name="src">
                    @error('src')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <br>

                    <button type="submit">Ajouter</button>
                </form>

                <a href="{{route('joueurs.index')}}">back to all players</a>
            </div>
        </div>
    </div>
</section>

