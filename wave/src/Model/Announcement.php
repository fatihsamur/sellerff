<?php

namespace Wave\Model;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    public function users()
    {
        return $this->belongsToMany('Wave\Model\User');
    }
}
