<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    protected $data = [];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index()
    {
        $this->data['title'] = "Companies";
        $this->data['companies'] = Company::all();
        return view('admin.companies.index', $this->data);
    }
}
