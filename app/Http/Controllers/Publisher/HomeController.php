<?php

namespace App\Http\Controllers\Publisher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:publisher');
    }

    public function index()
    {
        return view('publisher/index');
    }
}
