<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'address',
        'position',
        'salary',
        'additional_info',
        'photo_path',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'salary' => 'float',
    ];

    /**
     * Get the employee's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->surname}";
    }
}
