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

        $client = new User;
        $client->name = $request->client_name;
        $client->email = $request->client_email;
        $client->password = bcrypt($request->client_password);
        $client->save();

        // Attach role to user
        $role = Role::where('name', 'client')->first();
        $client->attachRole($role);
        return back();
    }

    public function addNewPublisher(Request $request)
    {
        $this->validate($request, [
            'publisher_name' => 'required|string|max:255',
            'publisher_email' => 'required|email|max:255',
            'publisher_password' => 'required|string|max:255']);

        $publisher = new User;
        $publisher->name = $request->publisher_name;
        $publisher->email = $request->publisher_email;
        $publisher->password = bcrypt($request->publisher_password);
        $publisher->save();

        // Attach role to user
        $role = Role::where('name', 'publisher')->first();
        $publisher->attachRole($role);
        return back();
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back();
    }
}
