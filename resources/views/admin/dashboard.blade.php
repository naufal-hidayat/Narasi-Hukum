@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Dashboard Admin</h2>

    <div class="row">
        <div class="col-md-6">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Berita</h5>
                    <p class="card-text">{{ $newsCount }} Berita</p>
                    <a href="{{ route('admin.news.index') }}" class="btn btn-light mt-2">Kelola Berita</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Artikel</h5>
                    <p class="card-text">{{ $articlesCount }} Artikel</p>
                    <a href="{{ route('admin.articles.index') }}" class="btn btn-light mt-2">Kelola Artikel</a>
                </div>
            </div>
        </div>
    </div>

    <h3 class="mt-4">Berita Terbaru</h3>
    <ul class="list-group mb-4">
        @foreach($latestNews as $news)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $news->title }} ({{ $news->created_at->format('d M Y') }})
            <div>
                <a href="{{ route('admin.news.edit', $news->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.news.destroy', $news->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus berita ini?')">Hapus</button>
                </form>
            </div>
        </li>
        @endforeach
    </ul>

    <h3>Artikel Terbaru</h3>
    <ul class="list-group">
        @foreach($latestArticles as $article)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $article->title }} ({{ $article->created_at->format('d M Y') }})
            <div>
                <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus artikel ini?')">Hapus</button>
                </form>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection
