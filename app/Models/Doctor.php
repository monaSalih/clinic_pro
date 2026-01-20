<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'user_id',
        'specialization',
        'start_date',
        'end_date'
    ];
      public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function schedules()
{
    return $this->hasMany(doctor_schedules::class);
}
}
