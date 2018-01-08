<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use App\Publication;
use Illuminate\Http\Request;

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
        $data['publications'] = Publication::paginate(30);

        // Pass data to view
        $data['title'] = "My Publications";
        return view('publisher/publications/index', $data);
    }

    public function showNewPublicationForm()
    {
        // Return new publication form view
        return view('publisher/publications/new');
    }

    public function addNewPublication(Request $request)
    {
        // Validate the request

        // Create a new publication
        $publication = new Publication;
    }
}
