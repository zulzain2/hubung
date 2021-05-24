<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingLog extends Model
{
    use HasFactory;

    public function scheduler()
    {
        return $this->hasOne('App\Models\Scheduler', 'id', 'id_module');
    }
}
