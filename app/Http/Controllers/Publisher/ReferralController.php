<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReferralController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:publisher');
    }

    public function index()
    {
        $user = Auth::user();
        $referrals = $user->referrals()->paginate(30);

        $data = ['user' => $user, 'referrals' => $referrals, 'title' => 'My Referrals'];
        return view('publisher.referrals.index', $data);
    }
}
