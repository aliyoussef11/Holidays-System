<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    protected $table = 'holidays-conditions';
    protected $fillable = ['name', 'role','yearly', 'january', 'february', 'march', 'april', 'may', 'june', 'july', 'august',
     'september', 'october', 'november', 'december'];

     public $timestamps = false;
}
