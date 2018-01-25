<?php

namespace App\Http\Controllers\Admin;

use App\AdvertRequest;
use App\Http\Controllers\Controller;
use App\Matching;
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

    public function doMatching(Request $request, $advertID, $publisherID)
    {
        $advert = AdvertRequest::findOrFail($advertID);

        $matching = new Matching;
        $matching->advert_request_id = $advertID;
        $matching->user_id = $publisherID;
        if ($matching->save()) {
            $advert->status = "Matched";
            $advert->save();

            return redirect()->route('admin.advertRequests');
        } else {
            return back();
        }
    }
}
