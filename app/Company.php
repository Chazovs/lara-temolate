<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['id_responser', 'company_name', 'electic_id', 'mario_id', 'mario2_id'];
}
