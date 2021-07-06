<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'kategori_id',
        'ukm_id',
        'user_id',
        'title',
        'image',
        'konten',
        'headline_utama',
        'headline_ukm',
        'tanggal',
        'slug',
        'viewer'
    ];

    public function user() {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function kategori() {
        return $this->belongsTo(Kategori::class);
    }

    public function ukm() {
        return $this->belongsTo(Ukm::class);
    }

    public function sluggable(): array {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
