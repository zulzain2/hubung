<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $with = ['user', 'user_other'];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }

    public function user_other()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user_other');
    }

    public function parent()
    {
        return $this->hasOne('App\Models\Chat', 'parent', 'id');
    }


}
