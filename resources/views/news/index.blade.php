@extends('layouts.app')

@section('title', 'Berita')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4" style="font-weight: bold; color: #D71314;">Berita Terbaru</h2>

    @foreach($news as $newsItem)
    <div class="card mb-4 shadow-sm border-0 news-card" style="transition: transform 0.3s ease; border-radius: 10px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset('storage/' . $newsItem->image) }}" class="img-fluid rounded-start" alt="{{ $newsItem->title }}" style="border-top-left-radius: 10px; border-bottom-left-radius: 10px; object-fit: cover; height: 100%;">
            </div>
            <div class="col-md-8 d-flex align-items-center">
                <div class="card-body">
                    <h5 class="card-title mb-1" style="font-size: 20px; font-weight: bold; color: #333;">
                        {{ $newsItem->title }}
                    </h5>
                    <p class="card-text text-muted mb-2" style="font-size: 12px;">
                        Dipublikasikan pada: {{ $newsItem->published_at->format('d M Y') }}
                    </p>
                    <!-- <p class="card-text mb-3" style="font-size: 14px;">
                        {{ Str::limit($newsItem->content, 100) }}
                    </p> -->
                    <a href="{{ route('news.show', $newsItem->id) }}" class="btn btn-outline-danger" style="font-size: 14px;">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>

<!-- CSS untuk efek hover pada card -->
<style>
    .news-card:hover {
        transform: translateY(-10px);
    }
</style>
@endsection
