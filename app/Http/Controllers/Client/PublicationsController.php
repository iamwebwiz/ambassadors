<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\NewPublication;
use Illuminate\Http\Request;

class PublicationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:client');
    }

    public function index()
    {
        $data['title'] = "My Publications";
        $data['user'] = auth()->user();
        return view('client/publications/index', $data);
    }

    public function showRequestPublicationForm()
    {
        return view('client/publications/new');
    }

    public function requestNewPublication(NewPublication $request)
    {
        //
    }
}
