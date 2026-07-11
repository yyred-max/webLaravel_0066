<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $teknologi = Category::where('name', 'Teknologi')->first();
        $olahraga = Category::where('name', 'Olahraga')->first();
        $ekonomi = Category::where('name', 'Ekonomi')->first();
        $nasional = Category::where('name', 'Nasional')->first();

        $posts = [
            [
                'title' => 'Masa Depan Transformasi Digital Nasional Menuju 2045',
                'excerpt' => 'Visi Indonesia Emas 2045 menuntut percepatan integrasi teknologi di seluruh lini pemerintahan dan pelayanan publik guna mencapai efisiensi maksimal.',
                'content' => str_repeat('Isi lengkap berita transformasi digital nasional yang membahas strategi pemerintah. ', 60),
                'image' => 'kota-semarang.jpeg',
                'category_id' => $nasional?->id,
                'views' => 25000,
                'is_featured' => true,
                'author' => 'Redaksi',
                'published_at' => now()->subMinutes(12),
                'source' => 'Kabar Burung',
                'tags' => ['Pemerintah', 'Digitalisasi'],
            ],
            [
                'title' => 'Inovasi Mobil Listrik Lokal Siap Produksi Massal Tahun Depan',
                'excerpt' => 'Beberapa pabrikan lokal mengumumkan kesiapan lini produksi massal kendaraan listrik dalam negeri.',
                'content' => str_repeat('Isi lengkap berita mobil listrik dan perkembangan industri otomotif nasional. ', 45),
                'image' => 'teknologi.jpg',
                'category_id' => $teknologi?->id,
                'views' => 12000,
                'is_featured' => false,
                'author' => 'Redaksi',
                'published_at' => now()->subHours(2),
                'source' => 'Antara',
                'tags' => ['Startup', 'Investasi'],
            ],
            [
                'title' => 'Persiapan Timnas Jelang Kualifikasi Piala Dunia',
                'excerpt' => 'Pelatih kepala menegaskan kesiapan fisik pemain menjadi prioritas utama sebelum bertolak menuju laga krusial di luar negeri.',
                'content' => str_repeat('Isi lengkap berita persiapan timnas menuju kualifikasi piala dunia. ', 50),
                'image' => 'Haaland.webp',
                'category_id' => $olahraga?->id,
                'views' => 8500,
                'is_featured' => false,
                'author' => 'Redaksi',
                'published_at' => now()->subHours(4),
                'source' => null,
                'tags' => ['Piala Dunia', 'Timnas'],
            ],
            [
                'title' => 'Analisis IHSG: Optimisme Pasar di Kuartal Keempat',
                'excerpt' => 'Para analis memperkirakan penguatan nilai tukar rupiah seiring dengan kebijakan moneter bank sentral yang dinilai sangat akomodatif.',
                'content' => str_repeat('Isi lengkap berita analisis pasar modal dan pergerakan IHSG kuartal keempat. ', 55),
                'image' => 'IPO.jpg',
                'category_id' => $ekonomi?->id,
                'views' => 15000,
                'is_featured' => false,
                'author' => 'Redaksi',
                'published_at' => now()->subHours(6),
                'source' => 'Bloomberg',
                'tags' => ['Pasar Modal', 'Rupiah'],
            ],
            [
                'title' => 'Harga Emas Antam Kembali Menyentuh Level Tertinggi Sepanjang Masa',
                'excerpt' => 'Kenaikan harga emas dunia turut mendorong harga emas Antam ke rekor baru minggu ini.',
                'content' => str_repeat('Isi lengkap berita kenaikan harga emas Antam dan dampaknya ke pasar domestik. ', 48),
                'image' => 'ETH.jpg',
                'category_id' => $ekonomi?->id,
                'views' => 15400,
                'is_featured' => false,
                'author' => 'Redaksi',
                'published_at' => now()->subHours(8),
                'source' => 'Reuters',
                'tags' => ['Emas', 'Ekonomi Global'],
            ],
        ];

        foreach ($posts as $postData) {
            $tagNames = $postData['tags'];
            unset($postData['tags']);

            $post = Post::create([
                'title' => $postData['title'],
                'slug' => Str::slug($postData['title']) . '-' . uniqid(),
                'excerpt' => $postData['excerpt'],
                'content' => $postData['content'],
                'image' => $postData['image'],
                'category_id' => $postData['category_id'],
                'views' => $postData['views'],
                'is_featured' => $postData['is_featured'],
                'author' => $postData['author'],
                'published' => 'yes',
                'published_at' => $postData['published_at'],
                'source' => $postData['source'],
            ]);

            $tagIds = Tag::whereIn('name', $tagNames)->pluck('id');
            $post->tags()->attach($tagIds);
        }
    }
}