@extends('layouts.app')

@section('title', 'Artikel')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center" style="font-weight: bold; color: #343a40;">Artikel Terbaru</h2>

    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach($articles as $article)
        <div class="col">
            <div class="card h-100 border-0 shadow-sm">
                <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}" style="object-fit: cover; height: 200px;">
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 20px; font-weight: bold;">{{ $article->title }}</h5>
                    <p class="text-muted" style="font-size: 12px;">Dipublikasikan pada: {{ $article->published_at->format('d M Y') }}</p>
                    <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary" style="font-size: 14px; background-color: #D71314">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination dihapus karena tidak lagi digunakan -->
</div>

<!-- CSS untuk efek hover pada card -->
<style>
    .card:hover {
        transform: scale(1.03);
        transition: transform 0.3s ease;
    }
</style>
@endsection
