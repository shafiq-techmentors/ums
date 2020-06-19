<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    //insert data into meetings table
    protected $guarded = [];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
