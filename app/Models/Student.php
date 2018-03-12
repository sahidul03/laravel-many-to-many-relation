<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'roll', 'created_at', 'updated_at'];

    public function courses()
    {
        return $this->belongsToMany('App\Models\Course')
            ->withTimestamps();
    }
}
