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
        return view('client.publications.index', $data)->render();
    }

    public function showRequestPublicationForm()
    {
        $data['title'] = "New Publication Request";
        return view('client.publications.new', $data)->render();
    }

    public function requestNewPublication(NewPublication $request)
    {
        $user = auth()->user();

        $advert = new AdvertRequest;
        $advert->title = $request->title;
        $advert->body = $request->description;
        $advert->company_id = $request->company;
        $user->advertRequests()->save($advert);
        flash('You have placed a request, the administrator shall hand your job to the best marketer!')->info();
        return redirect(route('client.publications'));
    }
}
