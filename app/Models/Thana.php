<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thana extends Model
{
    protected $fillable = ['name', 'created_at', 'updated_at'];

    public function students()
    {
        return $this->hasMany('App\Models\Student');
    }

    public function district()
    {
        return $this->belongsTo('App\Models\District');
    }

}
