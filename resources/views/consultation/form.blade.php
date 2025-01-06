@extends('layouts.app')

@section('title', 'Konsultasi')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card p-4 shadow-lg" style="width: 500px;">
        <div class="card-body text-center">
            <h3 class="mb-4" style="color: #D71314; font-weight: bold;">Ingin Konsultasi Tentang Hukum?</h3>

            <p style="color: #555;">Jika Anda memiliki pertanyaan atau membutuhkan klarifikasi, jangan ragu untuk menghubungi kami melalui form di bawah ini.</p>
            <ul class="list-unstyled">
                <li>🔹 Konsultasi Terpercaya</li>
                <li>🔹 Respon Cepat</li>
                <li>🔹 Profesional di Bidangnya</li>
            </ul>

            <!-- Tombol untuk Menampilkan Modal -->
            <button type="button" class="btn btn-danger w-100 mb-3" data-bs-toggle="modal" data-bs-target="#consultationModal">
                Kirim Pertanyaan
            </button>

            <!-- Modal Form Konsultasi -->
            <div class="modal fade" id="consultationModal" tabindex="-1" aria-labelledby="consultationModalLabel" aria-hidden="true">
                <div class="modal-dialog text-start">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="consultationModalLabel">Form Konsultasi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('consultation.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email aktif" required>
                                </div>
                                <div class="mb-3">
                                    <label for="question" class="form-label">Pertanyaan</label>
                                    <textarea class="form-control" id="question" name="question" rows="4" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-success w-100">Kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol Chat WhatsApp -->
            <a href="https://wa.me/6289676948053" target="_blank" class="btn btn-success w-100 mt-3">Chat Ke WhatsApp</a>
        </div>
    </div>
</div>

<!-- Notifikasi Pop-up -->
@if(session('success'))
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Berhasil!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ session('success') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();
    </script>
@endif

@endsection
