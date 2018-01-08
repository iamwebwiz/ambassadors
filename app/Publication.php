<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    public function publisher()
    {
        return $this->belongsTo(User::class);
    }
}
