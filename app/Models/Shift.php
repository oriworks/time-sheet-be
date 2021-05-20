<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'started_at',
        'ended_at',
    ];

    protected $dates = [
        'started_at',
        'ended_at',
    ];

    /**
     * Get the workplace where the employee worked in this shift.
     */
    public function workplace()
    {
        return $this->belongsTo(Workplace::class);
    }

    /**
     * Get the Workday report owns the shift.
     */
    public function workday()
    {
        return $this->belongsTo(Workday::class);
    }
}
