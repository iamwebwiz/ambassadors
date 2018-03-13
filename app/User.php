<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use EntrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }

    public function advertRequests()
    {
        return $this->hasMany(AdvertRequest::class);
    }

    public function matchings()
    {
        return $this->hasMany(Matching::class);
    }

    public function getTasks($limit = 3)
    {
        return Matching::where('user_id', $this->id)->latest()->take($limit)->get();
    }

    public function getCompletedTasks($limit = 3)
    {
        foreach ($this->getTasks($limit) as $task) {
            return $task->advertRequest->where('status', 'Finished')->latest()->take($limit)->get();
        }
    }

    public function referrals()
    {
        return $this->hasMany(Referral::class);
    }
}
