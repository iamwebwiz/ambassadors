<?php

namespace App\Http\Controllers\Publisher;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\Publisher\NewPublication;
use App\Matching;
use App\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    protected $data = [];

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:publisher');
    }

    public function index() {
        $user = Auth::user();
        $this->data['title'] = "My Tasks";
        // $this->data['tasks'] = Matching::where('user_id', Auth::id())->paginate(20);
        $this->data['tasks'] = $user->matchings()->paginate(20);

        return view('publisher.tasks.index', $this->data)->render();
    }

    public function showTaskDetail($taskID) {
        $task = Matching::where('match_id', $taskID)->first();
        $advert_title = $task->advertRequest->title;
        $this->data['title'] = "Details for ".ucfirst($advert_title);
        $this->data['task'] = $task;
        $this->data['advert_title'] = $advert_title;

        return view('publisher.tasks.details', $this->data)->render();
    }

    public function changeTaskStatus(Request $request, $taskID) {
        $task = Matching::where('match_id', $taskID)->first();
        $advert = $task->advertRequest;
        $advert->status = $request->task_status;
        $advert->save();
        flash('Task status changed')->success();
        return back();
    }

    public function showTaskPublications($taskID) {
        $task = Matching::where('match_id', $taskID)->first();
        $advert = $task->advertRequest;
        $publications = $advert->publications;

        $this->data = [
            'task' => $task,
            'advert' => $advert,
            'publications' => $publications
        ];

        return view('publisher.tasks.publications', $this->data)->render();
    }

    public function makeNewPublication($taskID)
    {
        $task = Matching::where('match_id', $taskID)->first();
        $advert = $task->advertRequest;

        $this->data = [
            'task' => $task,
            'advert' => $advert
        ];

        return view('publisher.publications.new', $this->data)->render();
    }

    public function addNewPublication(NewPublication $request, $taskID)
    {
        $user = Auth::user();
        $task = Matching::where('match_id', $taskID)->first();
        $advert = $task->advertRequest;
        $company = Company::where('name', $request->company)->first();

        $publication = new Publication;
        $publication->title = $request->title;
        $publication->slug = str_slug($request->title);
        $publication->description = $request->description;
        $publication->company_id = $company->id;
        $publication->advert_request_id = $advert->id;

        if ($user->publications()->save($publication)) {
            flash('New Publication made')->success();
            return redirect()->route('showTaskPublications', ['task' => $taskID]);
        }

        return back();
    }
}
