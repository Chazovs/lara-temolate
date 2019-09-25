<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $fillable = ['title', 'description', 'complexity', 'minPlayers', 'maxPlayers', 'isActive'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
