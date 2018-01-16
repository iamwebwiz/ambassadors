<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function showAllClients()
    {
        $this->data['users'] = User::all();
        $this->data['title'] = "DGAmbassadors Clients";

        return view('admin.clients.index', $this->data);
    }

    public function showAllPublishers()
    {
        $this->data['users'] = User::all();
        $this->data['title'] = "DGAmbassadors Publishers";

        return view('admin.publishers.index', $this->data);
    }
}
