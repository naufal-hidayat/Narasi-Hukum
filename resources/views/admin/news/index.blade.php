@extends('layouts.admin')

@section('title', 'Daftar Berita')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Daftar Berita</h2>
    <a href="{{ route('admin.news.create') }}" class="btn btn-primary mb-3">Tambah Berita</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($news as $index => $newsItem)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $newsItem->title }}</td>
                <td>
                    <a href="{{ route('admin.news.edit', $newsItem->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.news.destroy', $newsItem->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus berita ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection