<?php

namespace App\Http\Controllers\Admin;

use App\AdvertRequest;
use App\Http\Controllers\Controller;
use App\Role;
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
        $data['requests'] = AdvertRequest::paginate(30);
        return view('admin.advertRequests.index', $data);
    }

    public function showPublishers($advertID)
    {
        $data = [];
        $advert = AdvertRequest::findOrFail($advertID);
        $publishers = Role::where('name', 'publisher')->first()->users()->paginate(20);

        $data['advert'] = $advert;
        $data['publishers'] = $publishers;
        $data['title'] = "Match Advert to Publisher";

        return view('admin.advertRequests.matching', $data);
    }
}
