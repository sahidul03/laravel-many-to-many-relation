<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name', 'created_at', 'updated_at'];

    public function students()
    {
        return $this->hasMany('App\Models\Student');
    }

    public function districts()
    {
        return $this->hasMany('App\Models\District');
    }
}
