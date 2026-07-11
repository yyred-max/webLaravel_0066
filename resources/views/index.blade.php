@extends('master')

@section('title', 'Kabar Burung')

@section('body')

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-news">
    <div class="container">
        <a class="navbar-brand" href="#">Kabar Burung</a>
        <buton class="navbar-toggler" type="button" data-bs-toogle="collapse" data-bs-target="#navbarNews">
            <span class="navbar-toggler-icon"></span>
        </buton>

        <div class="collapse navbar-collapse" id="navbarNews">
            <ul class="navbar-nav ms-4">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Politik</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Ekonomi</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Teknologi</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Olahraga</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Hiburan</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Gaya Hidup</a>
                </li>

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
<section class="cotainer">
    <div class="hero-section" style="background-image: url('images/kota-semarang.jpeg');">
        <div class="hero-overlay">
            <div class="hero-meta-row">
                <span class="badge-utama">LAPORAN UTAMA</span>
                <span class="hero-meta">12 Menit Lalu &bull; Oleh Redaksi</span>
            </div>
        <h1 class="hero-title">Masa Depan Transformasi Digital Nasional Menuju 2045</h1>
        <p class="hero-desc">Visi Indonesia Emas 2045 menuntut percepatan integrasi teknologi di seluruh lini pemerintahan dan pelayanan publik guna mencapai efisiensi maksimal.</p>
        <a href="#" class="btn-hero">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>

</section>

<!-- Berita Terbaru -->


@endsection
