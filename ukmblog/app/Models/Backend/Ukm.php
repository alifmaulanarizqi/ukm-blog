<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ukm extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'ukm_name',
        'description',
        'image',
        'twitter',
        'instagram',
        'facebook',
        'youtube',
        'livetv',
        'open_registration',
    ];

    public function post() {
        return $this->hasMany(Post::class, 'ukm_id', 'id');
    }
}
