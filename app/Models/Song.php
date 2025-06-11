<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'artist_id', 'category_id',
        'key', 'lyrics', 'file_path'
    ];

    protected static function booted(): void
    {
        static::creating(function ($song) {
            if (empty($song->slug)) {
                $song->slug = Str::slug($song->title);
            }
        });
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function category()
    {
        return $this->belongsTo(SongCategory::class, 'category_id');
    }
}
