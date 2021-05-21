<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{

    protected $table = 'specialtys';

   public function user()
    {

        return $this->belongsTo('App\User', 'createdBy');
    }

    public function usermodified()
    {

        return $this->belongsTo('App\User', 'modifiedBy');
    }

    public function company()
    {

        return $this->belongsTo('App\Company', 'companyid');
    }

    public function doctor()
    {

        return $this->hasMany('App\Doctor')->orderBy('id', 'desc');
    }
}
