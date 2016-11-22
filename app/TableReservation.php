<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableReservation extends Model
{
     protected $fillable = [
        'id', 'name', 'persons', 'date', 'time','phone',
    ];
}



