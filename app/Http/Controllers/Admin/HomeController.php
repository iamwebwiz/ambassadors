<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $users = User::all();
        $this->data['clients'] = $users->withRole('client');
        $this->data['title'] = "DGAmbassadors Clients";

        return view('admin.clients.index', $this->data);
    }

    public function showAllPublishers()
    {
        $users = User::all();
        $this->data['publishers'] = $users->withRole('publisher');
        $this->data['title'] = "DGAmbassadors Publishers";

        return view('admin.publishers.index', $this->data);
    }
}
