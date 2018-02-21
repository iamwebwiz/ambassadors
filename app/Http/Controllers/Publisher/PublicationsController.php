<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use App\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:publisher');
    }

    public function index()
    {
        // Fetch all publications from database
        $data['publications'] = Publication::where('user_id', Auth::id())->paginate(30);
        $data['title'] = "My Publications";

        return view('publisher.publications.index', $data)->render();
    }

    public function delete($id)
    {
        $publication = Publication::findOrFail($id);
        $reports = $publication->reports;
        if ($publication->delete()) {
            foreach ($reports as $report) {
                $report->delete();
            }
            flash('Publication deleted!')->info();
            return back();
        }
    }
}
