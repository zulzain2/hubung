<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MeetingLog extends Model
{
    use Notifiable;
    protected $table = 'meeting_logs';
    public $incrementing = FALSE;

    public function scheduler()
    {
        return $this->hasOne('App\Models\Scheduler', 'id', 'id_module');
    }
}
