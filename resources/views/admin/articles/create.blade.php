@extends('layouts.admin')

@section('title', $consultation ? 'Balas Pertanyaan Konsultasi' : 'Buat Artikel Baru')

@section('content')
<div class="container mt-5">
    <h3 class="mb-4 text-center">{{ $consultation ? 'Balas Pertanyaan: ' . $consultation->question : 'Buat Artikel Baru' }}</h3>

    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="consultation_id" value="{{ $consultation ? $consultation->id : '' }}">

        <div class="mb-3">
            <label for="title" class="form-label">Judul Artikel</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Konten</label>
            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar (Opsional)</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <button type="submit" class="btn btn-primary">{{ $consultation ? 'Kirim Balasan' : 'Simpan Artikel' }}</button>
    </form>
</div>
@endsection