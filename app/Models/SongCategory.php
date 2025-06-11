<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SongCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    /* Auto-generate slug dari name saat create */
    protected static function booted(): void
    {
        static::creating(function ($category) {
            $category->slug = Str::slug($category->name);
        });
    }

    /* Relasi: satu kategori punya banyak lagu */
    public function songs()
    {
        return $this->hasMany(Song::class, 'category_id');
    }
}