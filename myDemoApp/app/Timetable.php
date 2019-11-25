<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    public $timestamps = false;
    protected $fillable = ['time', 'day', 'subject'];
}
