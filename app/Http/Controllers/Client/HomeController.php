<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:client');
    }

    public function index() {
        return view('client/index');
    }
}
