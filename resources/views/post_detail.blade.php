
use Illuminate\Support\Facades\Storage;

@extends('master')
@section('title', 'Detail Post')
@section('body')
<div class="card mt-4">
    <div class="card-header">
        <h3 class="text-center">Detail Post</h3>
    </div>
    <div class="card-body">
        <!-- Gambar -->
        @if($post->image)
        <div class="mb-3 text-center">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" style="max-width:100%; max-height:400px; border-radius:8px;">
        </div>
        @endif

        <!-- Kategori -->
        <div class="mb-3">
            <label class="fw-bold">Kategori</label>
            <p>{{ $post->category->name ?? 'Tidak ada kategori' }}</p>
        </div>

        <!-- Judul -->
        <div class="mb-3">
            <label class="fw-bold">Title</label>
            <p>{{ $post->title }}</p>
        </div>

        <!-- Konten -->
        <div class="mb-3">
            <label class="fw-bold">Content</label>
            <p style="white-space:pre-wrap;">{{ $post->content }}</p>
        </div>

        <!-- Excerpt -->
        @if($post->excerpt)
        <div class="mb-3">
            <label class="fw-bold">Excerpt</label>
            <p>{{ $post->excerpt }}</p>
        </div>
        @endif

        <!-- Author -->
        <div class="mb-3">
            <label class="fw-bold">Author</label>
            <p>{{ $post->author ?? 'Admin' }}</p>
        </div>

        <!-- Sumber -->
        @if($post->source)
        <div class="mb-3">
            <label class="fw-bold">Sumber</label>
            <p><a href="{{ $post->source }}" target="_blank">{{ $post->source }}</a></p>
        </div>
        @endif

        <!-- Status Published -->
        <div class="mb-3">
            <label class="fw-bold">Published</label>
            <p>
                @if($post->published == 'yes')
                    <span class="badge bg-success">Yes</span>
                @else
                    <span class="badge bg-danger">No</span>
                @endif
            </p>
        </div>

        <!-- Featured -->
        <div class="mb-3">
            <label class="fw-bold">Featured</label>
            <p>
                @if($post->is_featured)
                    <span class="badge bg-warning text-dark">Yes</span>
                @else
                    <span class="badge bg-secondary">No</span>
                @endif
            </p>
        </div>

        <!-- Reading Time -->
        <div class="mb-3">
            <label class="fw-bold">Reading Time</label>
            <p>{{ $post->reading_time }} menit baca</p>
        </div>

        <!-- Views -->
        <div class="mb-3">
            <label class="fw-bold">Views</label>
            <p>{{ number_format($post->views) }}</p>
        </div>

        <!-- Tanggal Dibuat -->
        <div class="mb-3">
            <label class="fw-bold">Tanggal Dibuat</label>
            <p>{{ $post->created_at->format('M d, Y H:i') }}</p>
        </div>

        <!-- Tanggal Publikasi (jika ada) -->
        @if($post->published_at)
        <div class="mb-3">
            <label class="fw-bold">Tanggal Publikasi</label>
            <p>{{ $post->published_at->format('M d, Y H:i') }}</p>
        </div>
        @endif

        <!-- Tombol Aksi -->
        <div class="mt-4">
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Kembali</a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin hapus data ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </div>
    </div>
</div>
@stop