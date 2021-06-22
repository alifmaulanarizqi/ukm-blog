<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPendaftar extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'ukm_id',
        'reason_joining',
    ];
}
