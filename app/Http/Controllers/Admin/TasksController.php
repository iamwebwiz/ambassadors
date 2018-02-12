<?php

namespace App\Http\Controllers\Admin;

use App\AdvertRequest;
use App\Http\Controllers\Controller;
use App\Matching;
use Illuminate\Http\Request;
use Laracasts\Flash\flash;

class TasksController extends Controller
{
    protected $data = [];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index()
    {
        $this->data['title'] = "Tasks";
        $this->data['tasks'] = Matching::all();
        return view('admin.tasks.index', $this->data);
    }

    public function doMatching(Request $request, $advertID, $publisherID)
    {
        $advert = AdvertRequest::findOrFail($advertID);

        $matching = new Matching;
        $matching->match_id = str_random(10);
        $matching->advert_request_id = $advertID;
        $matching->user_id = $publisherID;
        if ($matching->save()) {
            $advert->status = "Matched";
            $advert->save();
            flash('Matching done successfully!')->success();

            return redirect()->route('admin.showAllTasks');
        } else {
            flash('Unable to match at this moment, try again!')->warning();
            return back();
        }
    }

    public function deleteMatching(Request $request, $matchID)
    {
        $match = Matching::findOrFail($matchID);
        $advert_id = $match->advert_request_id;
        $advert = AdvertRequest::findOrFail($advert_id);
        $advert->status = "Pending";
        $advert->save();
        $match->delete();
        flash('Matching deleted!')->success();
        return back();
    }
}
