<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UkmPendaftar extends Model
{
    use HasFactory;

    protected $fillable = [
        'ukm_name',
        'description',
        'leader',
        'email',
        'password',
    ];
}
