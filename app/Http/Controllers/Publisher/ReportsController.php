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
        $data['task'] = $task;
        $data['publication'] = $publication;
        $data['reports'] = $publication->reports;

        return view('publisher.reports.index', $data)->render();
    }

    public function create($taskID, $publicationID)
    {
        $task = Matching::where('match_id', $taskID)->firstOrFail();
        $publication = Publication::findOrFail($publicationID);
        $data['title'] = "New Report";
        $data['task'] = $task;
        $data['publication'] = $publication;

        return view('publisher.reports.new', $data)->render();
    }

    public function store(Request $request, $taskID, $publicationID)
    {
        $this->validate($request, [
            'image' => 'required|image|max:10240'
        ]);

        $task = Matching::where('match_id', $taskID)->firstOrFail();
        $publication = Publication::findOrFail($publicationID);
        $company = $publication->advertRequest->company;

        $report = new Report;

        if (!is_null($request->image)) {
            $company_name = $company->name;
            $publication_slug = $publication->slug;
            $file_path = $request->file('image')->store($company_name.'/publications/'.$publication_slug.'/reports', 'public');
            $report->filepath = $file_path;
        }

        if ($publication->reports()->save($report)) {
            flash('Report saved successfully!')->success();
            return redirect()->route('showPublicationReports', [
                'task' => $taskID,
                'id' => $publicationID
            ]);
        } else {
            flash('Failed to make the report!')->error();
            return back();
        }
    }

    public function delete($id)
    {
        Report::findOrFail($id)->delete();
        flash('Report has been deleted!')->info();
        return back();
    }
}
