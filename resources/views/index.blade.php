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
<section class="container berita-section">
    <div class="row">
        <div class="col-lg-8">
            <div class="section-header">
                <h2>Berita Terbaru</h2>
                <a href="#" class="lihat-semua">Lihat Semua &rsaquo;</a>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="news-card">
                        <div class="news-img">
                            <img src="images/teknologi.webp" alt="Teknologi">
                            <span class="badge-category cat-tekologi">Teknologi</span>
                        </div>

                        <div class="news-body">
                            <span class="news-time">2 Jam Lalu</span>
                            <h3>Gara-garaTrump: Bisnis Nvidia Turun di China, Chip Huawai dan Alibaba Siap Berkembang</h3>
                            <p>Bisnis Nvidia di China terus menghadapi hambatan geopolitik. Para analis barat menilai hal ini dapat memicu risiko persaingan jangka panjang bagi produsen chip bagi produk kecerdasan buatan.</p>
                            <a href="https://informasi.com/teknologi/infrms-26065/gara-gara-trump-bisnis-nvidia-turun-di-china-chip-huawei-dan-alibaba-siap-berkembang" class="read-more">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="news-card">
                        <div class="news-img">
                            <img src="images/Haaland.webp" alt="Olahraga">
                            <span class="badge-category cat-olahraga">Olahraga</span>
                        </div>

                        <div class="news-body">
                            <span class="news-time">4 Jam lalu</span>
                            <h3>Erling Haaland, bintang Norwegia yang menyingkirkan Brasil di Piala Dunia 2026</h3>
                            <p>Erling Haaland, yang mencetak dua gol dalam kemenangan Norwegia atas Brasil pada babak 16 besar, menjadi bintang pertandingan yang memastikan Norwegia lolos ke perempat final—sekaligus menyingkirkan Brasil.</p>
                            <a href="https://www.bbc.com/indonesia/articles/cn944yzzw24o" class="read-more">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="news-card">
                        <div class="news-img">
                            <img src="images/IPO.jpg" alt="Hiburan">
                            <span class="badge-category cat-hiburan">Hiburan</span>
                        </div>
                        
                        <div class="news-body">
                            <span class="news-time">5 Jam lalu</span>
                            <h3>Resmi IPO Hari Ini, Nagita Slavina Menangis Kenang Awal Mula RANS Entertainment</h3>
                            <p>Nagita Slavina, selaku Direktur Utama RANS, menegaskan bahwa IPO perusahaan yang dipimpinnya bukan sekadar pencatatan saham biasa, melainkan sebuah bukti nyata bahwa industri kreatif kini berdiri sejajar dengan sektor ekonomi strategis lainnya di Indonesia.</p>
                            <a href="https://www.medcom.id/hiburan/montase/aNr11VPK-resmi-ipo-hari-ini-nagita-slavina-menangis-kenang-awal-mula-rans-entertainment" class="read-more">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="news-card">
                        <div class="news-img">
                            <img src="images/ETH.jpg" alt="Ekonomi">
                            <span class="badge-category cat-ekonomi">Ekonomi</span>
                        </div>

                        <div class="news-body">
                            <span class="news-time">6 Jam lalu</span>
                            <h3>Harga Ethereum Melayang di $3.000 Hari Ini (20/11/25): ETH Masuk Zona “Peluang”, Apa Maksudnya?</h3>
                            <p>Harga Ethereum ETH0.59%-> mengalami penurunan tajam dalam beberapa hari terakhir, menyentuh level terendah dalam dua bulan terakhir. Penurunan ini terjadi seiring meningkatnya volatilitas pasar dan melemahnya kepercayaan investor.</p>
                            <a href="https://pintu.co.id/news/230498-harga-ethereum-hari-ini-20november2025" class="read-more">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
         <div class="col-lg-4">
            <div class="sidebar-widget">
                <h3><i class="bi bi-graph-up-arrow"></i> Paling Populer</h3>

                <div class="popular-item">
                    <span class="popular-num">01</span>
                    <div>
                        <h4>Kebijakan Baru Transportasi MRT Jakarta Mulai Diberlakukan</h4>
                        <span class="popular-read">20k Pembaca</span>
                    </div>
                </div>

                <div class="popular-item">
                    <span class="popular-num">02</span>
                    <div>
                        <h4>Harga Emas Antam Kembali Menyentuh Level Tertinggi&hellip;</h4>
                        <span class="popular-read">15k Pembaca</span>
                    </div>
                </div>

                <div class="popular-item">
                    <span class="popular-num">03</span>
                    <div>
                        <h4>Inovasi Mobil Listrik Lokal Siap Produksi Massal Tahun Depan</h4>
                        <span class="popular-read">12 Pembaca</span>
                    </div>
                </div>

                <div class="popular-item">
                    <span class="popular-num">04</span>
                    <div>
                        <h4>estinasi Wisata Tersembunyi di Indonesia Timur yang Wajib&hellip;</h4>
                        <span class="popular-read">10k Pembaca</span>
                    </div>
                </div>
            </div>

            <div class="sidebar-widget">
                <h3>Kategori Populer</h3>
                <div class="tag-list">
                <span class="tag-pill">Nasional</span>
                    <span class="tag-pill">Internasional</span>
                    <span class="tag-pill">Gadget</span>
                    <span class="tag-pill">Otomotif</span>
                    <span class="tag-pill">Kuliner</span>
                    <span class="tag-pill">Kesehatan</span>
                    <span class="tag-pill">Pendidikan</span>
                </div>
            </div>

            <div class="newsletter-box">
                <h3>Update Berita di Email Anda</h3>
                <p>Dapatkan rangkuman berita pilihan setiap pagi langsung ke inbox Anda.</p>
                <input type="email" placeholder="Alamat Email">
                <button type="button">Berlangganan Gratis</button>
            </div>
         </div>

    </div>

</section>

@endsection
