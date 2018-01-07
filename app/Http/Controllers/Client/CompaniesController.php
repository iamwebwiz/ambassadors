<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompaniesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:client');
    }

    public function index()
    {
        return view('client/companies/index');
    }

    public function newCompany()
    {
        return view('client/companies/new');
    }
}
