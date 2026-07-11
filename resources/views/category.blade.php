@extends('master')

@section('title', 'Kategori ' . $category->name . ' - Kabar Burung')

@section('body')

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-news">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/posts') }}">Kabar Burung</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNews">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNews">
            <ul class="navbar-nav ms-4">
                <li class="nav-item"><a class="nav-link" href="{{ url('/posts') }}">Beranda</a></li>
            </ul>
            <div class="navbar-icons ms-auto">
                <i class="bi bi-search"></i>
                <i class="bi bi-bell"></i>
                <i class="bi bi-person-circle"></i>
            </div>
        </div>
    </div>
</nav>

<section class="container berita-section">
    <div class="row">
        <div class="col-lg-8">
            <div class="section-header">
                <h2>Kategori: {{ $category->name }}</h2>
                <a href="{{ url('/posts') }}" class="lihat-semua">&lsaquo; Kembali ke Beranda</a>
            </div>

            <div class="row g-4">
                @forelse($posts as $post)
                <div class="col-md-6">
                    <div class="news-card">
                        <div class="news-img">
                            <img src="{{ asset('images/' . $post->image) }}" alt="{{ $category->name }}">
                            <span class="badge-category {{ $category->badge_class }}">{{ $category->name }}</span>
                        </div>
                        <div class="news-body">
                            <span class="news-time">
                                {{ $post->display_date->locale('id')->diffForHumans() }} &bull; {{ $post->reading_time }} menit baca
                            </span>
                            <h3>{{ $post->title }}</h3>
                            <p>{{ Str::limit($post->excerpt, 110) }}</p>
                            <a href="#" class="read-more">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-muted">Belum ada berita di kategori ini.</p>
                @endforelse
            </div>

            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        </div>

        <div class="col-lg-4">
            <div class="sidebar-widget">
                <h3>Kategori Lain</h3>
                <div class="tag-list">
                    @foreach($categories as $cat)
                        <a href="{{ route('category.show', $cat->slug) }}" class="tag-pill {{ $cat->id === $category->id ? 'tag-pill-active' : '' }}">{{ $cat->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection