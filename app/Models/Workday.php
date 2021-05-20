<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workday extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'day',
        'day_off',
        'validated_at'
    ];

    protected $dates = [
        'day',
        'validated_at'
    ];

    protected $casts = [
        'day_off' => 'boolean'
    ];

    /**
     * Get the user owns the workday report.
     */
    public function employee()
    {
        return $this->belongsTo(User::class);
    }

    /**
     *  Get the shifts for the workday report.
     */
    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }
}
