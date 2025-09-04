<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index() {
        // Vérifier que l'utilisateur est admin
        if (!Gate::allows('manage-users')) {
            abort(403, 'Seuls les administrateurs peuvent gérer les utilisateurs.');
        }
        
        $users = User::all();
        return view("users.index", compact("users"));
    }

    public function create() {
        // Vérifier que l'utilisateur est admin
        if (!Gate::allows('manage-users')) {
            abort(403, 'Seuls les administrateurs peuvent créer des utilisateurs.');
        }
        
        $roles = Role::all();
        return view("users.create", compact("roles"));
    }

    public function store(Request $request) {
        // Vérifier que l'utilisateur est admin
        if (!Gate::allows('manage-users')) {
            abort(403, 'Seuls les administrateurs peuvent créer des utilisateurs.');
        }
        
        $request->validate([
            'prenom' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
            'role_id' => ['required', 'exists:roles,id']
        ]);

        $user = User::create([
            'prenom' => $request->prenom,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès');
    }
    public function edit($id) {
        // Vérifier que l'utilisateur est admin
        if (!Gate::allows('manage-users')) {
            abort(403, 'Seuls les administrateurs peuvent modifier les utilisateurs.');
        }
        
        $user = User::find($id);
        $roles = Role::all();
        return view("users.edit", compact("user", "roles"));
    }
    public function update(Request $request, $id) {
        // Vérifier que l'utilisateur est admin
        if (!Gate::allows('manage-users')) {
            abort(403, 'Seuls les administrateurs peuvent modifier les utilisateurs.');
        }
        
        $user = User::find($id);
        $user->role_id = $request->role_id;
        $user->save();
        return redirect()->route("users.index")->with("success","Le rôle de l'utilisateur a été modifié");
    }
    public function destroy($id) {
        // Vérifier que l'utilisateur est admin
        if (!Gate::allows('manage-users')) {
            abort(403, 'Seuls les administrateurs peuvent supprimer les utilisateurs.');
        }
        
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with("success","L'utilisateur a été supprimé");
    }
}
