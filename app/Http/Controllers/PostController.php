<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hero = Post::published()->with('category')->where('is_featured', true)
            ->orderByDesc('published_at')->first()
            ?? Post::published()->with('category')->orderByDesc('published_at')->first();

         // Berita Terbaru: 4 post terbaru selain hero
         $latestPosts = Post::published()
            ->with(['category', 'tags'])
            ->when($hero, fn ($query) => $query->where('id', '!=', $hero->id))
            ->orderByDesc('published_at')
            ->take(4)
            ->get();

        // Paling Populer: urut berdasarkan views terbanyak
        $popularPosts = Post::published()
            ->orderByDesc('views')
            ->take(4)
            ->get();

        // Kategori Populer: urut berdasarkan jumlah post terbanyak
        $categories = Category::withCount('posts')
            ->orderByDesc('posts_count')
            ->get();

            return view('index', compact('hero', 'latestPosts', 'popularPosts', 'categories'));
        
    }

    /**
     * Menampilkan semua berita dalam satu kategori.
     * Route: /kategori/{category:slug}
     */
    public function byCategory(Category $category)
    {
        $posts = Post::published()
            ->with(['category', 'tags'])
            ->where('category_id', $category->id)
            ->orderByDesc('published_at')
            ->paginate(6);
 
        $categories = Category::withCount('posts')
            ->orderByDesc('posts_count')
            ->get();
 
        return view('category', compact('category', 'posts', 'categories'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}