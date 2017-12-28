<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function welcome()
    {
        if (Role::all()->count() < 1) {
            // create new roles
            $admin = new Role();
            $admin->name = "admin";
            $admin->display_name = "Administrator";
            $admin->description = "Admin oversees the whole platform activities";
            $admin->save();

            $publisher = new Role();
            $publisher->name = "publisher";
            $publisher->display_name = "Publisher";
            $publisher->description = "Publisher advertises for business owners";
            $publisher->save();

            $client = new Role();
            $client->name = "client";
            $client->display_name = "Business Owner";
            $client->description = "Business Owners seek to advertise their brands";
            $client->save();
        }
        // return view('welcome');
    }
}
