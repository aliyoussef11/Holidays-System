<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    protected $table = 'requests';
    protected $fillable = ['name', 'role', 'title', 'date'];
}
