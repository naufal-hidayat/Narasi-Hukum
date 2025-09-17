@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="container my-5">
    <div class="row g-4">
        <!-- Kolom Kiri: Artikel Terbaru -->
        <div class="col-md-4">
            <h3 class="fw-bold mb-4 text-danger border-start border-3 border-danger ps-2">
                Terbaru
            </h3>
            @foreach($articles as $article)
                <a href="{{ route('articles.show', $article->id) }}" class="text-decoration-none text-dark">
                    <div class="card mb-3 shadow-sm border-0 hover-card">
                        <div class="row g-0 align-items-center">
                            <div class="col-4">
                                <img src="{{ asset('storage/' . $article->image) }}" 
                                     class="img-fluid rounded-start" 
                                     alt="{{ $article->title }}" 
                                     style="height: 100px; object-fit: cover; width: 100%;">
                            </div>
                            <div class="col-8">
                                <div class="card-body p-2">
                                    <h6 class="card-title fw-semibold mb-1 text-truncate">
                                        {{ $article->title }}
                                    </h6>
                                    <small class="text-muted">
                                        {{ $article->published_at->format('d M Y') }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>        

        <!-- Kolom Kanan: Carousel Headline -->
        <div class="col-md-8">
            <div id="headlineCarousel" class="carousel slide rounded overflow-hidden shadow-sm mb-4" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($headlines as $key => $headline)
                        <a href="{{ route('news.show', $headline->id) }}" class="text-decoration-none text-white">
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $headline->image) }}" 
                                     class="d-block w-100" 
                                     alt="{{ $headline->title }}" 
                                     style="height: 400px; object-fit: cover;">
                                <div class="headline-overlay d-flex align-items-end">
                                    <div class="p-3 w-100">
                                        <h5 class="fw-bold">{{ $headline->title }}</h5>
                                        <small>{{ $headline->published_at->format('d M Y') }}</small>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#headlineCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#headlineCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>

            <!-- Daftar Berita Thumbnail -->
            <div class="row g-3">
                @foreach($news as $newsItem)
                    <div class="col-md-4">
                        <a href="{{ route('news.show', $newsItem->id) }}" class="text-decoration-none text-dark">
                            <div class="card h-100 shadow-sm border-0 hover-card">
                                <img src="{{ asset('storage/' . $newsItem->image) }}" 
                                     class="card-img-top" 
                                     alt="{{ $newsItem->title }}" 
                                     style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h6 class="fw-semibold text-truncate">{{ $newsItem->title }}</h6>
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
    /* Hover efek untuk semua card */
    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 12px;
        overflow: hidden;
    }

    .hover-card:hover {
        transform: translateY(-5px) scale(1.01);
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15);
    }

    /* Overlay headline */
    .headline-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.7), rgba(0,0,0,0));
        color: white;
    }

    /* Truncate judul */
    .text-truncate {
        display: -webkit-box;
        -webkit-line-clamp: 2; 
        -webkit-box-orient: vertical;  
        overflow: hidden;
    }
</style>
