<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pks extends Model
{
    use HasFactory;

    protected $table = 'pks';

    protected $fillable = [
        'company_name',
        'owner_name',
        'phone_number',
        'email',
        'sector',
        'status',
        'facilitator_id',
    ];

    public function facilitator()
    {
        return $this->belongsTo(Facilitator::class, 'facilitator_id');
    }
}