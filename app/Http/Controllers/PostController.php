<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
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

        $latestPosts = Post::published()
            ->with(['category', 'tags'])
            ->when($hero, fn ($query) => $query->where('id', '!=', $hero->id))
            ->orderByDesc('published_at')
            ->take(4)
            ->get();

        $popularPosts = Post::published()
            ->orderByDesc('views')
            ->take(4)
            ->get();

        $categories = Category::withCount('posts')
            ->orderByDesc('posts_count')
            ->get();

        // Ambil semua post yang sudah publish
        $posts = Post::published()
            ->with(['category', 'tags'])
            ->orderByDesc('published_at')
            ->paginate(10);

        return view('index', compact('hero', 'latestPosts', 'popularPosts', 'categories', 'posts'));
    }

    /**
     * Menampilkan semua berita dalam satu kategori.
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
        $categories = Category::all();
        return view('post_create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'excerpt' => 'nullable|string',
            'author' => 'nullable|string|max:100',
            'source' => 'nullable|string|max:255',
        ]);

        // Generate slug unik
        $slug = Str::slug($request->title);
        $count = Post::where('slug', 'LIKE', $slug . '%')->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }

        $published = $request->input('published', 'no');

        $data = [
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'published' => $published,
            'is_featured' => $request->has('is_featured') ? 1 : 0,
            'views' => 0,
            'published_at' => ($published == 'yes') ? now() : null,
            'excerpt' => $request->excerpt,
            'author' => $request->author ?? 'Admin',
            'source' => $request->source,
        ];

        // Upload gambar jika ada
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('post_images', $imageName, 'public');
            $data['image'] = $path;
        }

        Post::create($data);

        return redirect()->route('posts.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post_detail', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('post_edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'excerpt' => 'nullable|string',
            'author' => 'nullable|string|max:100',
            'source' => 'nullable|string|max:255',
        ]);

        // Update slug jika title berubah
        if ($request->title != $post->title) {
            $slug = Str::slug($request->title);
            $count = Post::where('slug', 'LIKE', $slug . '%')->where('id', '!=', $post->id)->count();
            if ($count > 0) {
                $slug = $slug . '-' . ($count + 1);
            }
            $post->slug = $slug;
        }

        // Upload gambar baru jika ada, hapus gambar lama
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('post_images', $imageName, 'public');
            $post->image = $path;
        }

        // Tentukan published
        $published = $request->input('published', 'no');

        // Update field lainnya
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->published = $published;
        $post->is_featured = $request->has('is_featured') ? 1 : 0;
        $post->published_at = ($published == 'yes' && $post->published_at == null) ? now() : $post->published_at;
        $post->excerpt = $request->excerpt ?? $post->excerpt;
        $post->author = $request->author ?? $post->author;
        $post->source = $request->source ?? $post->source;

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Hapus gambar dari storage jika ada
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Data berhasil dihapus!');
    }
}