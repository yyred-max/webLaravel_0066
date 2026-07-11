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


<!-- Berita Terbaru -->


@endsection
