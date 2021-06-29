<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'kategori',
        'ukm_id',
    ];

    public function post() {
        return $this->hasMany(Post::class, 'kategori_id', 'id');
    }
}
