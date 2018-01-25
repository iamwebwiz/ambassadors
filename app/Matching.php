<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matching extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function advertRequest()
    {
        return $this->belongsTo(AdvertRequest::class);
    }
}
