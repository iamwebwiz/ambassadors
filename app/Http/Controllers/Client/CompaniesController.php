<?php

namespace App\Http\Controllers\Client;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\NewCompany;
use Illuminate\Http\Request;
use Laracasts\Flash\flash;

class CompaniesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:client');
    }

    public function index()
    {
        $data['user'] = auth()->user();
        $data['title'] = "My Companies";
        return view('client.companies.index', $data)->render();
    }

    public function newCompany()
    {
        return view('client.companies.new');
    }

    public function addNewCompany(NewCompany $request)
    {
        $user = auth()->user();

        $company = new Company;
        $company->name = $request->company_name;
        $company->address = $request->company_address;
        $user->companies()->save($company);
        flash('New company has been created!')->success();
        return redirect(route('client.companies'));
    }
}
