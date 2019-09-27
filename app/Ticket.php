<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['description', 'fio', 'tel', 'adress', 'flat', 'delivery_status', 'ready_status', 'comment', 'position_curator', 'fio_curator', 'work_tel', 'task_id'];
}
