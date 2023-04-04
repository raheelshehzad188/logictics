<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use SoftDeletes;

    /**
     * Get the Governorate that owns the area.
     */
    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }
}
