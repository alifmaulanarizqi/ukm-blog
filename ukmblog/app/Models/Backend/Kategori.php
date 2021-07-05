<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Kategori extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'kategori',
        'ukm_id',
        'slug'
    ];

    public function post() {
        return $this->hasMany(Post::class, 'kategori_id', 'id');
    }

    public function ukm() {
        return $this->belongsTo(Ukm::class);
    }

    public function sluggable(): array {
        return [
            'slug' => [
                'source' => 'kategori'
            ]
        ];
    }
}
