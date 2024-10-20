<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultationController extends Controller
{
    // Tampilkan Form Konsultasi
    public function create()
    {
        return view('consultation.form');
    }

    // Simpan Pertanyaan ke Database
    public function store(Request $request)
    {
        // Pengecekan apakah user sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login untuk mengirim pertanyaan.');
        }

        // Validasi input
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'question' => 'required|string|max:1000',
        ]);

        // Simpan pertanyaan
        Consultation::create($data);

        // Redirect dengan notifikasi berhasil
        return redirect()->route('consultation.form')->with('success', 'Pertanyaan Anda telah dikirim.');
    }

}
