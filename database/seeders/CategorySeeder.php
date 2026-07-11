<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Teknologi', 'badge_class' => 'cat-teknologi'],
            ['name' => 'Olahraga', 'badge_class' => 'cat-olahraga'],
            ['name' => 'Hiburan', 'badge_class' => 'cat-hiburan'],
            ['name' => 'Ekonomi', 'badge_class' => 'cat-ekonomi'],
            ['name' => 'Nasional', 'badge_class' => 'cat-default'],
            ['name' => 'Internasional', 'badge_class' => 'cat-default'],
            ['name' => 'Gadget', 'badge_class' => 'cat-default'],
            ['name' => 'Otomotif', 'badge_class' => 'cat-default'],
            ['name' => 'Kuliner', 'badge_class' => 'cat-default'],
            ['name' => 'Kesehatan', 'badge_class' => 'cat-default'],
            ['name' => 'Pendidikan', 'badge_class' => 'cat-default'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'badge_class' => $category['badge_class'],
            ]);
        }
    }
}