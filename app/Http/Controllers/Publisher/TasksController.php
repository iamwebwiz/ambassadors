<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use App\Matching;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return view('publisher.tasks.index', $this->data);
    }

    public function showTaskDetail($taskID) {
        $task = Matching::where('match_id', $taskID)->first();
        $advert_title = $task->advertRequest->title;
        $this->data['title'] = "Details for ".ucfirst($advert_title);
        $this->data['task'] = $task;
        $this->data['advert_title'] = $advert_title;

        return view('publisher.tasks.details', $this->data);
    }

    public function changeTaskStatus(Request $request, $taskID) {
        $task = Matching::where('match_id', $taskID)->first();
        $advert = $task->advertRequest;
        $advert->status = $request->task_status;
        $advert->save();
        return back();
    }
}
