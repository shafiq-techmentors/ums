<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //

    public function meeting() {
        return $this->hasOne(Meeting::class);
    }
}
