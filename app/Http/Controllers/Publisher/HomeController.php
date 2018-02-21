<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:publisher');
    }

    public function index()
    {
        $user = Auth::user();
        $publications = $user->publications;
        $reports = 0;
        foreach ($publications as $publication) {
            $reports+=$publication->reports->count();
        }
        $tasks = $user->matchings;

        $data['user'] = $user;
        $data['publications'] = $publications;
        $data['reports'] = $reports;
        $data['tasks'] = $tasks;

        return view('publisher.index', $data)->render();
    }
}
