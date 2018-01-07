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
        $data['companies'] = auth()->user()->companies();
        return view('client/companies/index', $data);
    }

    public function newCompany()
    {
        return view('client/companies/new');
    }
}
