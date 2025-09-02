<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view("users.index", compact("users"));
    }
    public function edit($id) {
        $user = User::find($id);
        return view("users.edit", compact("user"));
    }
    public function update(Request $request, $id) {
        $user = User::find($id);
        $user->role_id = $request->role_id;
        $user->save();
        return redirect()->route("users.update")->with("success","Le rôle de l'utilisateur a été modifié");
    }
    public function destroy($id) {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with("success","L'utilisateur a été supprimé");
    }
}
