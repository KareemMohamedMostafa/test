<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{

    protected $table = 'doctors';

    public function user()
    {

        return $this->belongsTo('App\User', 'createdBy');
    }

    public function usermodified()
    {

        return $this->belongsTo('App\User', 'modifiedBy');
    }

    public function specialty()
    {

        return $this->belongsTo('App\Specialty', 'specialtyid');
    }

    public function patient()
    {

        return $this->hasMany('App\Patient')->orderBy('id', 'desc');
    }

    public function appointment()
    {

        return $this->hasMany('App\Appointment')->orderBy('id', 'desc');
    }
}
