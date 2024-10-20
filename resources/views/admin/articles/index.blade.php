@extends('layouts.admin')

@section('title', 'Daftar Artikel')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Daftar Artikel</h2>
    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary mb-3">Tambah Artikel</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $index => $article)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $article->title }}</td>
                <td>
                    <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus artikel ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
