<?php

use App\Role;
use App\User;

if (!function_exists("createRoles")) {
    function createRoles($withAdmin = "yes") {
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

            if ($withAdmin === "yes") {
                $dummy = User::create([
                    'name' => 'Admin',
                    'email' => 'admin@dgambassadors.com',
                    'password' => bcrypt('control')]);
            }

            $dummy->attachRole($admin);
        }
    }
}
