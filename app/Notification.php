<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';
    protected $fillable = ['name', 'role', 'title', 'date', 'response'];

    public $timestamps = false;
}
