<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\TenReferralsNotification;
use App\Referral;
use App\Role;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        createRoles();
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);

        if (!is_null($data['referrer'])) {
            $referral = new Referral;
            $referrer = User::where('name', $data['referrer'])->firstOrFail();
            $referral->username = $data['name'];
            try {
                $referrer->referrals()->save($referral);
                if (count($referrer->referrals) == config('sitedata.num_of_referrals')) {
                    Mail::send(new TenReferralsNotification($referrer));
                } else {
                    //
                }
            } catch (\Exception $e) {
                return null;
            }
        }

        $user->save();

        if ($data['account_type'] == "client") {
            $role = Role::where('name', 'client')->first();
            $user->attachRole($role);
        } else {
            $role = Role::where('name', 'publisher')->first();
            $user->attachRole($role);
        }

        return $user;
    }

    public function redirectTo()
    {
        if (auth()->user()->hasRole('client')) {
            return 'client';
        }

        else if (auth()->user()->hasRole('publisher')) {
            return 'publisher';
        }

        else if (auth()->user()->hasRole('admin')) {
            return 'administrator/dashboard';
        }

        else {
            //
        }
    }
}
