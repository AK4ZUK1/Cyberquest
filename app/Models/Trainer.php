<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = [
        'name',
        'email',
        'expertise_category',
        'rating',
    ];

    /**
     * A trainer can create many modules.
     */
    public function modules()
    {
        return $this->hasMany(Module::class, 'trainer_id');
    }
}