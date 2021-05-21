<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';

    public function user()
    {

        return $this->belongsTo('App\User', 'createdBy');
    }

    public function usermodified()
    {

        return $this->belongsTo('App\User', 'modifiedBy');
    }

    public function room()
    {

        return $this->belongsTo('App\Room', 'roomid');
    }

    public function doctor()
    {

        return $this->belongsTo('App\Doctor', 'doctorid');
    }

    public function patient()
    {

        return $this->belongsTo('App\Patient', 'patientid');
    }
}
