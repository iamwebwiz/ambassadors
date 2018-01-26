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
        $this->data['title'] = "My Tasks";
        $this->data['tasks'] = Matching::where('user_id', Auth::id())->first();

        return view('publisher.tasks.index', $this->data);
    }
}
