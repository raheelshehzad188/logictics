<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use SoftDeletes;

    public function cards()
    {
        return $this->belongsTo(Cards::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
