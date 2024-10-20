@extends('layouts.app')

@section('title', $article->title)

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Konten Artikel -->
        <div class="col-md-8 mb-4">
            <!-- Gambar besar di atas -->
            <div class="mb-4">
                <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid rounded" alt="{{ $article->title }}" style="object-fit: cover; width: 100%; height: 400px;">
            </div>
            <h1 style="font-size: 32px; font-weight: bold; color: #343a40;">{{ $article->title }}</h1>
            <p class="text-muted" style="font-size: 14px;">Dipublikasikan pada {{ $article->published_at->format('d M Y') }}</p>
            <hr>
            <div class="content" style="font-size: 16px; line-height: 1.8;">
                {!! nl2br(e($article->content)) !!}
            </div>

            <!-- Tombol kembali -->
            <a href="{{ route('articles.index') }}" class="btn btn-secondary mt-4">Kembali ke Daftar Artikel</a>
            <a href="{{ route('home') }}" class="btn btn-outline-danger mt-4">Kembali ke Beranda</a>
        </div>

        <!-- Daftar Artikel di sebelah kanan -->
        <div class="col-md-4">
            <h3>Artikel Terkait</h3>
            <ul class="list-group">
                @foreach($relatedArticles as $relatedArticle)
                <li class="list-group-item">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('storage/' . $relatedArticle->image) }}" alt="{{ $relatedArticle->title }}" class="img-thumbnail me-3" style="width: 60px; height: 60px; object-fit: cover;">
                        <!-- Link yang terlihat seperti teks biasa -->
                        <a href="{{ route('articles.show', $relatedArticle->id) }}" class="text-decoration-none article-link">
                            {{ $relatedArticle->title }}
                        </a>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<!-- CSS untuk membuat link seperti teks biasa -->
<style>
    .article-link {
        color: inherit; /* Warna sama seperti teks normal */
        text-decoration: none; /* Hilangkan garis bawah */
        cursor: pointer; /* Tetap gunakan pointer untuk menunjukkan bahwa ini bisa diklik */
    }
    .article-link:hover {
        color: #D71314; /* Tambahkan sedikit efek hover */
    }
</style>
@endsection
