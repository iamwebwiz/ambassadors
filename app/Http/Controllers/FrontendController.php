<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function welcome() {
        createRoles();
        $data['title'] = "Welcome";
        return view('welcome', $data);
    }

    public function contact() {
        $data['title'] = "Contact Us";
        return view('contact', $data);
    }
}
