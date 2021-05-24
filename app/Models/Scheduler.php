<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scheduler extends Model
{
    use HasFactory;

    public function meetinglog()
    {
        return $this->hasOne('App\Models\MeetingLog', 'id_module', 'id');
    }
}
