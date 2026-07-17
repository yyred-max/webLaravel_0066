@extends('master')

@section('title', 'Kabar Burung')

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
                <li class="nav-item"><a class="nav-link active" href="#">Politik</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Ekonomi</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Teknologi</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Olahraga</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Hiburan</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Gaya Hidup</a></li>
            </ul>

            <div class="navbar-icons ms-auto">
                <i class="bi bi-search"></i>
                <i class="bi bi-bell"></i>
                <i class="bi bi-person-circle"></i>
            </div>
        </div>
    </div>
</nav>

<!-- Hero -->
@if($hero)
<section class="container">
    <div class="hero-section" style="background-image: url('{{ asset('storage/' . $hero->image) }}');">
        <div class="hero-overlay">
            <div class="hero-meta-row">
                <span class="badge-utama">LAPORAN UTAMA</span>
                <span class="hero-meta">
                    {{ $hero->display_date->locale('id')->diffForHumans() }} &bull; Oleh {{ $hero->author }}
                    &bull; {{ $hero->reading_time }} menit baca
                </span>
            </div>
            <h1 class="hero-title">{{ $hero->title }}</h1>
            <p class="hero-desc">{{ $hero->excerpt }}</p>
            @if($hero->source)
            <a href="{{ $hero->source }}" class="btn-hero" target="_blank">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>
            @endif
        </div>
    </div>
</section>
@endif

<!-- Berita Terbaru & Sidebar -->
<section class="container berita-section">
    <div class="row">
        <!-- Kolom Kiri: Berita Terbaru + Semua Post -->
        <div class="col-lg-8">
            <!-- Berita Terbaru -->
            <div class="section-header">
                <h2>Berita Terbaru</h2>
                <a href="{{ route('posts.create') }}" class="btn btn-success">+ Tambah Post</a>
            </div>

            <div class="row g-4">
                @forelse($latestPosts as $post)
                <div class="col-md-6">
                    <div class="news-card">
                        <div class="news-img">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name ?? 'Berita' }}">
                            @if($post->category)
                                <a href="{{ route('category.show', $post->category->slug) }}" class="badge-category {{ $post->category->badge_class ?? '' }}">{{ $post->category->name }}</a>
                            @endif
                        </div>
                        <div class="news-body">
                            <span class="news-time">
                                {{ $post->display_date->locale('id')->diffForHumans() }} &bull; {{ $post->reading_time }} menit baca
                            </span>
                            <h3>{{ $post->title }}</h3>
                            <p>{{ Str::limit($post->excerpt, 110) }}</p>

                            <div class="news-footer d-flex justify-content-between align-items-center">
                                <div>
                                    @if($post->source && Str::startsWith($post->source, ['http://','https://']))
                                        <a href="{{ $post->source }}" class="read-more" target="_blank">
                                            Read More <i class="bi bi-arrow-right"></i>
                                        </a>
                                    @else
                                        <span class="source-tag">{{ $post->source }}</span>
                                    @endif
                                </div>
                                <div>
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-muted">Belum ada berita.</p>
                @endforelse
            </div>

            <!-- === SEMUA POST (List View) === -->
            <div class="mt-5">
                <h2 class="section-title">Semua Post</h2>
                <div class="list-group">
                    @forelse($posts as $post)
                    <div class="list-group-item d-flex align-items-start gap-3 py-3">
                        <!-- Thumbnail -->
                        <div style="flex-shrink:0; width:120px; height:80px; overflow:hidden; border-radius:8px;">
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" style="width:100%; height:100%; object-fit:cover;">
                            @else
                                <img src="{{ asset('images/default.jpg') }}" alt="Default" style="width:100%; height:100%; object-fit:cover;">
                            @endif
                        </div>

                        <!-- Konten -->
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    @if($post->category)
                                        <span class="badge bg-primary">{{ $post->category->name }}</span>
                                    @endif
                                    <span class="text-muted small ms-2">
                                        {{ $post->display_date->locale('id')->diffForHumans() }} &bull; {{ $post->reading_time }} menit baca
                                    </span>
                                    <h5 class="mb-1 mt-1">{{ $post->title }}</h5>
                                </div>
                                <!-- Tombol aksi -->
                                <div class="d-flex gap-2 flex-shrink-0">
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                            <a href="{{ route('posts.show', $post->id) }}" class="text-primary small">Baca selengkapnya →</a>
                        </div>
                    </div>
                    @empty
                    <div class="list-group-item text-muted">Belum ada post.</div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if(method_exists($posts, 'links'))
                    <div class="mt-4">
                        {{ $posts->links() }}
                    </div>
                @endif
            </div>
        </div>
        <!-- Akhir col-lg-8 -->

        <!-- ===== SIDEBAR ===== -->
        <div class="col-lg-4">
            <div class="sidebar-widget">
                <h3><i class="bi bi-graph-up-arrow"></i> Paling Populer</h3>
                @foreach($popularPosts as $index => $post)
                <div class="popular-item">
                    <span class="popular-num">{{ sprintf('%02d', $index + 1) }}</span>
                    <div>
                        <h4>{{ Str::limit($post->title, 60) }}</h4>
                        <span class="popular-read">{{ $post->views_formatted }} Pembaca</span>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="sidebar-widget">
                <h3>Kategori Populer</h3>
                <div class="tag-list">
                    @foreach($categories as $category)
                        <a href="{{ route('category.show', $category->slug) }}" class="tag-pill">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>

            <div class="newsletter-box">
                <h3>Update Berita di Email Anda</h3>
                <p>Dapatkan rangkuman berita pilihan setiap pagi langsung ke inbox Anda.</p>

                @if(session('success'))
                    <p style="color:#a7f3d0; font-size:13px; margin-bottom:12px;">{{ session('success') }}</p>
                @endif
                @error('email')
                    <p style="color:#fecaca; font-size:13px; margin-bottom:12px;">{{ $message }}</p>
                @enderror

                <form action="{{ route('newsletter.subscribe') }}" method="POST">
                    @csrf
                    <input type="email" name="email" placeholder="Alamat Email" value="{{ old('email') }}" required>
                    <button type="submit">Berlangganan Gratis</button>
                </form>
            </div>
        </div>
        <!-- Akhir Sidebar -->
    </div>
    <!-- Akhir row -->
</section>

<!-- Footer -->
<footer class="footer-news">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <h4>Kabar Burung</h4>
                <p>Jurnalisme independen, kredibel, dan mendalam untuk masa depan Indonesia yang lebih baik.</p>
                <div class="footer-social">
                    <i class="bi bi-camera"></i>
                    <i class="bi bi-share"></i>
                    <i class="bi bi-envelope"></i>
                </div>
            </div>

            <div class="col-lg-2 col-6">
                <h5>Navigasi</h5>
                <ul>
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Redaksi</a></li>
                    <li><a href="#">Karir</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-6">
                <h5>Legal</h5>
                <ul>
                    <li><a href="#">Pedoman Media Siber</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Kontak</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-6">
                <h5>Edisi Cetak</h5>
                <ul>
                    <li><a href="#">Langganan Koran</a></li>
                    <li><a href="#">Info Iklan</a></li>
                    <li><a href="#">E-Paper</a></li>
                </ul>
            </div>
        </div>

        <hr>
        <p class="footer-copy">&copy; 2024 Kabar Burung. Jurnalisme Terpercaya untuk Indonesia.</p>
    </div>
</footer>

@endsection