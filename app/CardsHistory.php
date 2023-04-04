<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CardsHistory extends Model
{
    use SoftDeletes;

    protected $table = 'cards_history';

    public function getStatusNameAttribute()
    {
        if ($this->status_id == 0 && !$this->agent_id) {
            $status_name = 'Newly Arrived';
        } else if ($this->status_id == 0 && $this->agent_id) {
            $status_name = 'Assigned to Agent';
        } else if ($this->status_id == 1 && !$this->driver_id) {
            $status_name = 'Out for Delivery';
        } else if ($this->status_id == 1 && $this->driver_id) {
            $status_name = 'Assigned to Driver';
        } else if ($this->status_id == 2) {
            $status_name = 'Return to Bank';
        } else if ($this->status_id == 3) {
            $status_name = 'Delivered';
        } else {
            $status_name = 'Other';
        }
        return $status_name;
    }
}
