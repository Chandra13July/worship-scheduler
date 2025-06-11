<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'image'];

    protected static function booted(): void
    {
        static::creating(function ($artist) {
            if (empty($artist->slug)) {
                $artist->slug = Str::slug($artist->name);
            }
        });
    }

    // Relasi: satu artis punya banyak lagu
    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}