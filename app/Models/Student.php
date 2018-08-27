<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'roll', 'country_id', 'district_id', 'thana_id', 'created_at', 'updated_at'];

    public function courses()
    {
        return $this->belongsToMany('App\Models\Course')
            ->withTimestamps();
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function district()
    {
        return $this->belongsTo('App\Models\District');
    }

    public function thana()
    {
        return $this->belongsTo('App\Models\Thana');
    }
}
