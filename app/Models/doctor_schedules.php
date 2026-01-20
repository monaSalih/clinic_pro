<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class doctor_schedules extends Model
{
     protected $fillable = [
        'available_date',
        'available_time',
        'doctor_id',
        'is_booked'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
