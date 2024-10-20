@extends('layouts.app')

@section('title', $newsItem->title)

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Konten Berita -->
        <div class="col-md-8 mb-4">
            <!-- Gambar besar di atas -->
            <div class="mb-4">
                <img src="{{ asset('storage/' . $newsItem->image) }}" class="img-fluid rounded" alt="{{ $newsItem->title }}" style="object-fit: cover; width: 100%; height: 400px;">
            </div>
            <h1 style="font-size: 32px; font-weight: bold; color: #800000;">{{ $newsItem->title }}</h1>
            <p class="text-muted" style="font-size: 14px;">Dipublikasikan pada {{ $newsItem->published_at->format('d M Y') }}</p>
            <hr>
            <div class="content" style="font-size: 16px; line-height: 1.8;">
                {!! nl2br(e($newsItem->content)) !!}
            </div>

            <!-- Tombol kembali -->
            <a href="{{ route('news.index') }}" class="btn btn-secondary mt-4">Kembali ke Daftar Berita</a>
            <a href="{{ route('home') }}" class="btn btn-outline-danger mt-4">Kembali ke Beranda</a>
        </div>

        <!-- Daftar Berita di sebelah kanan -->
        <div class="col-md-4">
            <h3>Berita Terkait</h3>
            <ul class="list-group">
                @foreach($relatedNews as $news)
                <li class="list-group-item">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="img-thumbnail me-3" style="width: 60px; height: 60px; object-fit: cover;">
                        <!-- Link yang terlihat seperti teks biasa -->
                        <a href="{{ route('news.show', $news->id) }}" class="text-decoration-none news-link">
                            {{ $news->title }}
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
    .news-link {
        color: inherit; /* Warna sama seperti teks normal */
        text-decoration: none; /* Hilangkan garis bawah */
        cursor: pointer; /* Tetap gunakan pointer untuk menunjukkan bahwa ini bisa diklik */
    }
    .news-link:hover {
        color: #D71314; /* Tambahkan sedikit efek hover */
    }
</style>
@endsection
