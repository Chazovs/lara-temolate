<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = ['adress', 'flat', 'company_id', 'fio_head'];
}
