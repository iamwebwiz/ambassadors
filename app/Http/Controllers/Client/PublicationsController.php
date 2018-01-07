<?php

namespace App\Http\Controllers\Client;

use App\AdvertRequest;
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
        $data['title'] = "New Publication Request";
        return view('client/publications/new', $data);
    }

    public function requestNewPublication(NewPublication $request)
    {
        $user = auth()->user();

        $advert = new AdvertRequest;
        $advert->title = $request->title;
        $advert->body = $request->description;
        $advert->company_id = $request->company;
        $user->advertRequests()->save($advert);
        return redirect(route('client.publications'));
    }
}
