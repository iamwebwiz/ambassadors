<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function welcome() {
        if (Role::all()->count() < 1) {
            $publisher = new Role;
            $publisher->name = "publisher";
            $publisher->display_name = "Publisher";
            $publisher->description = "Publisher post adverts for business owners";
            $publisher->save();

            $client = new Role;
            $client->name = "client";
            $client->display_name = "Business Owner";
            $client->description = "Business owner brings their works to be advertised";
            $client->save();

            $admin = new Role;
            $admin->name = "admin";
            $admin->display_name = "Administrator";
            $admin->description = "Administrator oversees the activities on the platform";
            $admin->save();

            $dummy = User::create([
                'name' => 'Admin',
                'email' => 'admin@dgambassadors.com',
                'password' => bcrypt('control')]);

            $dummy->attachRole($admin);
        }
        return view('welcome');
    }
}
