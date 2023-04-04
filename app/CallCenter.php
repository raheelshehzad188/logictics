<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CallCenter extends Model
{
    use SoftDeletes;

    public function cards()
    {
        return $this->belongsTo(Cards::class);
    }
}
