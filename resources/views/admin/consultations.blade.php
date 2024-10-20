@extends('layouts.admin')

@section('title', 'Daftar Pertanyaan Konsultasi')

@section('content')
<div class="container mt-5">
    <h3 class="mb-4 text-center">Daftar Pertanyaan Konsultasi</h3>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Pertanyaan</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($consultations as $index => $consultation)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $consultation->name }}</td>
                <td>{{ $consultation->email }}</td>
                <td>{{ $consultation->question }}</td>
                <td>{{ $consultation->created_at->format('d M Y H:i') }}</td>
                <td>
                    @if($consultation->answered)
                        <span class="badge bg-success">Sudah Dijawab</span>
                    @else
                        <span class="badge bg-warning">Belum Dijawab</span>
                    @endif
                </td>
                <td>
                    @if(!$consultation->answered)
                        <!-- Button untuk balas pertanyaan -->
                        <a href="{{ route('admin.articles.create', ['consultation_id' => $consultation->id]) }}" class="btn btn-primary btn-sm">Balas Pertanyaan</a>
                    @else
                        <!-- Jika sudah dijawab, tampilkan status -->
                        <button class="btn btn-secondary btn-sm" disabled>Sudah Dijawab</button>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada pertanyaan konsultasi.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
