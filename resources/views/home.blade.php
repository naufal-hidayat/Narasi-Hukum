@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Kolom Kiri: Artikel Terbaru -->
        <div class="col-md-4">
            <h3 class="mb-4" style="font-weight: bold; color: #D71314;">Terbaru</h3>
            @foreach($articles as $article)
            <a href="{{ route('articles.show', $article->id) }}" class="text-decoration-none" style="color: inherit;">
                <div class="card mb-3 border-0">
                    <div class="row g-0 align-items-center">
                        <div class="col-4">
                            <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid rounded-start" 
                                alt="{{ $article->title }}" style="height: 100px; object-fit: cover; width: 100%;">
                        </div>
                        <div class="col-8">
                            <div class="card-body p-2">
                                <h5 class="card-title mb-1" style="font-size: 14px; margin-left: 5px;">{{ $article->title }}</h5>
                                <p class="card-text text-muted" style="font-size: 12px; margin-left: 5px;">
                                    {{ $article->published_at->format('d M Y') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>        

        <!-- Kolom Kanan: Carousel Headline -->
        <div class="col-md-8">
            <div id="headlineCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($headlines as $key => $headline)
                    <a href="{{ route('news.show', $headline->id) }}" class="text-decoration-none" style="color: inherit;">
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/' . $headline->image) }}" class="d-block w-100" 
                                alt="{{ $headline->title }}" style="height: 400px; object-fit: cover;">
                            <div class="headline-overlay d-flex align-items-end">
                                <div class="p-3 text-white w-100">
                                    <h5 class="mb-1">{{ $headline->title }}</h5>
                                    <p class="mb-0" style="font-size: 12px;">
                                        {{ $headline->published_at->format('d M Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#headlineCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#headlineCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <!-- Daftar Berita Thumbnail -->
            <div class="row">
                @foreach($news as $newsItem)
                <div class="col-md-4">
                    <a href="{{ route('news.show', $newsItem->id) }}" class="text-decoration-none" style="color: inherit;">
                        <div class="card mb-3">
                            <img src="{{ asset('storage/' . $newsItem->image) }}" class="card-img-top" 
                                alt="{{ $newsItem->title }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h6 class="card-title">{{ $newsItem->title }}</h6>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    /* Tambahkan shadow dan efek hover untuk kolom artikel terbaru */
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 10px;
        overflow: hidden; /* Untuk mencegah elemen dalam card keluar */
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
    }

    .card img {
        border-radius: 10px 0 0 10px; /* Menyesuaikan gambar di sisi kiri */
    }

    .card-body {
        padding: 10px; /* Menambah jarak di dalam card */
    }
    
    /* CSS untuk efek overlay headline */
    .headline-overlay {
        border-radius: 15px;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(214, 79, 79, 0.705), rgba(211, 67, 67, 0));
        color: white;
        padding: 15px;
    }

    /* Penambahan style untuk merapikan bagian Terbaru */
    .card-body h5.card-title, .card-body p.card-text {
        margin-left: 8px;
    }
</style>
