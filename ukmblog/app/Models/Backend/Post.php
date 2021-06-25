<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

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
    ];

    public function kategori() {
        return $this->belongsTo(Kategori::class);
    }
}
