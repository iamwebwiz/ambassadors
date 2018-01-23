<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function addNewClient(Request $request)
    {
        $this->validate($request, [
            'client_name' => 'required|string|max:255',
            'client_email' => 'required|email|max:255',
            'client_password' => 'required|string|max:255']);

        $user = new User;
        $user->name = $request->client_name;
        $user->email = $request->client_email;
        $user->password = bcrypt($request->client_password);
        $user->save();
        $role = Role::where('name', 'client')->first();
        $user->attachRole($role);
        return back();
    }
}
