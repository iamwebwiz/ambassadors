<?php

namespace App\Http\Controllers\Admin;

use App\AdvertRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvertRequestsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index()
    {
        $data = [];
        $data['title'] = "Advert Requests";
        $data['advertRequests'] = AdvertRequest::paginate(30);
        return view('admin.advertRequests.index', $data);
    }
}
