<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CallLogs extends Model
{
    protected $table = 'call_logs';

    public function status()
    {
        return $this->hasOne('App\Status', 'id', 'status_id');
    }
}
