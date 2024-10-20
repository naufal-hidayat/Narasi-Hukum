@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')
<div class="container">
    <h1>Tambah Berita</h1>

    <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul Berita</label>
            <input type="text" class="form-control" name="title" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Konten Berita</label>
            <textarea class="form-control" name="content" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar</label>
            <input type="file" class="form-control" name="image" required>
        </div>

        <div class="mb-3">
            <label for="published_at" class="form-label">Tanggal Publikasi</label>
            <input type="date" class="form-control" name="published_at" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan Berita</button>
    </form>
</div>
@endsection
