<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

    protected $table = 'patients';

    public function user()
    {

        return $this->belongsTo('App\User', 'createdBy');
    }

    public function usermodified()
    {

        return $this->belongsTo('App\User', 'modifiedBy');
    }

    public function doctor()
    {

        return $this->belongsTo('App\Doctor', 'doctorid');
    }

    public function appointments()
    {

        return $this->hasMany('App\Appointment')->orderby('id', 'desc');
    }
}
