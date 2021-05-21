<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $table = 'companys';

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

        return $this->hasMany('App\Room')->orderBy('id', 'desc');
    }

    public function specialtys()
    {

        return $this->hasMany('App\Specialty')->orderBy('id', 'desc');
    }
}
