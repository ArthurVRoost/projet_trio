@extends('layouts.app') @section('content')
<form action="{{route('users.update', $user)}}" method="POST">
    @csrf @method('PATCH')
    <select name="role_id">
        @foreach ($roles as $role)
        <option value="{{$role->id}}">{{$role->role}}</option>
        @endforeach
    </select>
    <button type="submit" class="bg-green-400 rounded px-5 py-2">Modifier le rôle de l'utilisateur</button>
</form>
@endsection