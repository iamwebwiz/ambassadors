<?php

namespace App\Http\Controllers\Admin;

use App\AdvertRequest;
use App\Http\Controllers\Controller;
use App\Matching;
use App\Publication;
use App\Role;
use Illuminate\Http\Request;
use Laracasts\Flash\flash;

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
        return view('admin.advertRequests.index', $data)->render();
    }

    public function showPublishers($advertID)
    {
        $data = [];
        $advert = AdvertRequest::findOrFail($advertID);
        $publishers = Role::where('name', 'publisher')->first()->users()->paginate(20);

        $data['advert'] = $advert;
        $data['publishers'] = $publishers;
        $data['title'] = "Match Advert to Publisher";

        return view('admin.advertRequests.matching', $data)->render();
    }

    public function getAdvertPublications($id)
    {
        $advert = AdvertRequest::findOrFail($id);
        $publications = $advert->publications;

        $data['title'] = "Publications for {$advert->title}";
        $data['advert'] = $advert;
        $data['publications'] = $publications;

        return view('admin.advertRequests.publications.index', $data)->render();
    }

    public function deletePublication($advertID, $publicationID)
    {
        Publication::findOrFail($publicationID)->delete();
        flash('Publication has been deleted')->info();
        return back();
    }

    public function getPublicationReports($advertID, $id)
    {
        $advert = AdvertRequest::findOrFail($advertID);
        $publication = Publication::findOrFail($id);
        $reports = $publication->reports;

        $data['title'] = "Reports for {$publication->title}";
        $data['advert'] = $advert;
        $data['publication'] = $publication;
        $data['reports'] = $reports;

        return view('admin.advertRequests.publications.reports.index', $data)->render();
    }
}
