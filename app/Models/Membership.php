<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'price',
    ];

    /**
     * Define la relación con el modelo User.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
