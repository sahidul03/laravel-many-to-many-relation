<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    
    protected $fillable = ['name', 'created_at', 'updated_at'];

    public function students()
    {
        return $this->hasMany('App\Models\Student');
    }

	public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function thanas()
    {
        return $this->hasMany('App\Models\Thana');
    }
}
