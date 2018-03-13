<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Referral;
use Illuminate\Http\Request;

class ReferralsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function showUserReferrals($id) {
        $referrals = Referral::where('user_id', $id)->get();
        $data = ['title' => 'Referrals', 'referrals' => $referrals];
        return view('admin.referrals.index', $data);
    }
}
