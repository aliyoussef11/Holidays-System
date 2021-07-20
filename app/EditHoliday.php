<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EditHoliday extends Model
{
    protected $table = 'edit-holidays-requests';
    protected $fillable = ['name', 'role', 'title', 'previous date', 'new date'];

    public $timestamps = false;
}
