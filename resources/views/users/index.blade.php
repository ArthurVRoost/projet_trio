@extends('layouts.app') @section('content')
<ul>
    @foreach ($users as $user)
    <li>Prénom: {{$user->prenom}}</li>
    <li>Name: {{$user->name}}</li>
    <li>Email: {{$user->email}}</li>
    <li>Role: {{$user->role->role}}</li>
    <li>Role_id: {{$user->role_id}}</li>
    @endforeach
</ul>
@endsection
