<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvertRequest extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function matching()
    {
        return $this->hasOne(Matching::class);
    }

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }
}
