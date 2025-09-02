@extends('layouts.app') @section('content')
<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Rôle</th>
            <th>Role ID</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->prenom }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role->role }}</td>
            <td>{{ $user->role_id }}</td>
            <td>
                <a href="{{route('users.update', $user)}}"
                    ><button class="bg-cyan-400 rounded px-5">Modifier le rôle</button></a
                >
            </td>
            <td>
                <a href="{{route('users.destroy', $user)}}"
                    ><button class="bg-red-400 rounded px-5">Supprimer l'utilisateur</button></a
                >
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
