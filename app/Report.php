<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
}
