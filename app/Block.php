<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Block extends Model
{
    use SoftDeletes;

    /**
     * Get the Area that owns the block.
     */
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}