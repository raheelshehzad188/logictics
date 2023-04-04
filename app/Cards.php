<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cards extends Model
{
    use SoftDeletes;
    protected $appends = ['new_status','date','telephone','driver'];


    public function driver_details()
    {
        return $this->hasOne('App\Driver', 'id', 'driver_id')->where('deleted_at', NULL);
    }

    public function callLogs()
    {
        return $this->hasMany('App\CallLogs', 'card_id', 'id')->orderBy('id', 'DESC');
    }

    public function history()
    {
        return $this->hasMany('App\CardsHistory', 'card_id', 'id')->orderBy('id', 'asc');
    }
    public function getNewStatusAttribute()
    {
        $st=null;
        $status=$this->status;
        $agent_id=$this->agent_id;
        $driver_id=$this->driver_id;
        if($status==0 && $agent_id==null){
            $st='Newly Arrived';
        }elseif($status==0 && $agent_id!=null){
            $st='Assigned To Agent';
        }elseif($status==1 && $driver_id==null){
            $st='Out For Delivery';
        }elseif($status==1 && $driver_id!=null){
            $st='Assigned To Driver';
        }elseif($status==2){
            $st='Return To Bank';
        }elseif($status==3){
            $st='Delivered';
        }elseif($status==4){
            $st='Undelivered';
        }else{
            $others=Status::where('id',$status)->where('parent_id','!=', 0)->first();
            $st=$others->name;
        }
        return $this->attributes['new_status'] = $st;
    }
    public function getDateAttribute()
    {
        $delivery_date=$this->delivery_date;
        $date = Carbon::parse($delivery_date)->format('Y-m-d');
        return $this->attributes['date'] = $date;
    }
    public function getTelephoneAttribute()
    {
        $no=null;
        $telephone=$this->telephone_no;
        if(empty($telephone)){
            $no='-';
        }else{
            $no=$telephone;
        }
        return $this->attributes['telephone'] = $no;
    }
    public function getDriverAttribute()
    {
        $dri=null;
        $driver=$this->driver_id;
        $driver_name=Driver::where('id',$driver)->first();
        if(empty($driver)){
            $dri='-';
        }else{
            $dri=$driver_name->driver_name;
        }
        return $this->attributes['driver'] = $dri;
    }

}
