<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['title', 'created_at', 'updated_at'];

    public function students()
    {
        return $this->belongsToMany('App\Models\Student')
            ->withTimestamps();
    }
}
