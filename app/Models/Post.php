<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'image',
        'category_id',
        'views',
        'is_featured',
        'author',
        'published',
        'published_at',
        'reading_time',
        'source',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
    ];


    protected static function booted(): void
    {
        // Hitung reading_time otomatis setiap kali post disimpan,
        // berdasarkan jumlah kata di content (asumsi ~200 kata/menit).
        static::saving(function (Post $post) {
            $wordCount = str_word_count(strip_tags($post->content ?? ''));
            $post->reading_time = max(1, (int) ceil($wordCount / 200));
        });
    }
 
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
 
    /**
     * Hanya ambil post yang sudah published.
     */
    public function scopePublished($query)
    {
        return $query->where('published', 'yes')
            ->where(function ($q) {
                $q->whereNull('published_at')
                  ->orWhere('published_at', '<=', now());
            });
    }

     /**
     * Format angka views jadi "20k", "1.2k", dst untuk ditampilkan
     * di sidebar "Paling Populer".
     */
    public function getViewsFormattedAttribute(): string
    {
        $views = $this->views;
 
        if ($views >= 1000) {
            $formatted = rtrim(rtrim(number_format($views / 1000, 1), '0'), '.');
            return $formatted . 'k';
        }
 
        return (string) $views;
    }

    /**
     * Tanggal untuk ditampilkan di UI: pakai published_at kalau ada,
     * fallback ke created_at.
     */
    public function getDisplayDateAttribute()
    {
        return $this->published_at ?? $this->created_at;
    }

}
