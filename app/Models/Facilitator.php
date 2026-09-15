<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facilitator extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'status',
        'pks_assigned',
    ];

    public function pksList()
    {
        return $this->hasMany(Pks::class, 'facilitator_id');
    }
}