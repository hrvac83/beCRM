<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function users()
    {
    	return $this->hasMany('App\User');
    }

    public function contacts()
    {
    	return $this->hasMany('App\Contact');
    }

    public function invoices()
    {
    	return $this->hasMany('App\Invoice');
    }
}

