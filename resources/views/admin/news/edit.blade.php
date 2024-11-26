@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Edit Berita</h2>

    <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Konten</label>
            <textarea class="form-control" id="content" name="content" rows="5" required>{{ $news->content }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <div class="mb-3">
            <label for="imageSebelumnya" class="form-label">Gambar Sebelumnya :</label>
            <img src="{{ asset('storage/' . $news->image) }}" class="img-fluid" 
                 alt="" style="height: 200px; object-fit: cover; border-radius: 15px;">
        </div>
        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{'admin.news.index'}}"> <button class="btn btn-primary">Back</button></a>
    </form>
</div>
@endsection
