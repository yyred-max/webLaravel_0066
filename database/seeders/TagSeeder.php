<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            'Pemerintah', 'Digitalisasi', 'Startup', 'Investasi',
            'Piala Dunia', 'Timnas', 'Sinema', 'Festival Film',
            'Pasar Modal', 'Rupiah', 'Emas', 'Ekonomi Global',
        ];

        foreach ($tags as $tag) {
            Tag::create([
                'name' => $tag,
                'slug' => Str::slug($tag),
            ]);
        }
    }
}