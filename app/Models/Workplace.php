<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workplace extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     *  Get the employees from the workplace.
     */
    public function employees()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get workday reports for the workplace.
     */
    public function workdays()
    {
        return $this->hasMany(Workday::class);
    }
}
