<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Matching;
use Illuminate\Http\Request;

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
}
