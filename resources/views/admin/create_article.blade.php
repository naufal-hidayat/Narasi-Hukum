@extends('layouts.app')

@section('title', 'Tambah Artikel')

@section('content')
<div class="container">
    <h1>Tambah Artikel</h1>

    <form method="POST" action="{{ route('admin.articles.store') }}" enctype="multipart/form-data">
        @csrf
    
        <!-- Form untuk judul, konten, dan gambar artikel -->
        <div class="form-group">
            <label for="title">Judul Artikel</label>
            <input type="text" class="form-control" name="title" required>
        </div>
    
        <div class="form-group">
            <label for="content">Konten</label>
            <textarea class="form-control" name="content" rows="5" required></textarea>
        </div>
    
        <div class="form-group">
            <label for="image">Gambar (Opsional)</label>
            <input type="file" class="form-control" name="image">
        </div>
    
        <!-- Jika artikel merupakan jawaban dari pertanyaan konsultasi -->
        <input type="hidden" name="consultation_id" value="{{ $consultation->id ?? '' }}">
    
        <button type="submit" class="btn btn-primary mt-3">Simpan Artikel</button>
    </form>    
</div>
@endsection
