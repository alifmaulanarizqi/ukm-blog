<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Ukm extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

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

    public function kategori() {
        return $this->hasMany(Kategori::class, 'ukm_id', 'id');
    }

    public function sluggable(): array {
        return [
            'slug' => [
                'source' => 'ukm_name'
            ]
        ];
    }
}
