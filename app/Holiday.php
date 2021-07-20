<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $table = 'holidays';
    protected $fillable = ['name', 'role', 'title', 'color', 'date'];
}
