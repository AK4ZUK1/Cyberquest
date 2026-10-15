<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pks extends Model
{
    use HasFactory;

    protected $table = 'pks';

    protected $fillable = [
        'user_id',
        'company_name',
        'owner_name',
        'phone_number',
        'email',
        'sector',
        'status',
        'facilitator_id',
        'description', // Added to support the profile description tab view
        'address',     // Added to support the location tab view
    ];

    /**
     * Relationship: A PKS belongs to a login User account.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship: A PKS is assigned to a Facilitator.
     */
    public function facilitator()
    {
        return $this->belongsTo(Facilitator::class, 'facilitator_id');
    }
}