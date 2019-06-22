<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function assignTo(){
        return $this->belongsTo(User::class, 'assign_to');
    }
}
