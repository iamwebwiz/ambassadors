<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use App\Matching;
use App\Publication;
use App\Report;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:publisher');
    }

    public function index($taskID, $publicationID)
    {
        $task = Matching::where('match_id', $taskID)->firstOrFail();
        $publication = Publication::findOrFail($publicationID);
        $data['title'] = "Publication Reports";
        $data['reports'] = $publication->reports;

        return view('publisher.reports.index', $data);
    }
}
