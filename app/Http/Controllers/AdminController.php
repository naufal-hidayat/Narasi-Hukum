<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\News;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConsultationAnswered;

class AdminController extends Controller
{
    // Tampilkan Dashboard
    public function dashboard()
    {
        $newsCount = News::count(); // Hitung total berita
        $articlesCount = Article::count(); // Hitung total artikel
        $latestNews = News::latest()->take(5)->get(); // Berita terbaru
        $latestArticles = Article::latest()->take(5)->get(); // Artikel terbaru

        return view('admin.dashboard', compact('newsCount', 'articlesCount', 'latestNews', 'latestArticles'));
    }

    // Tampilkan Daftar Berita
    public function indexNews()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    // Form Tambah Berita
    public function createNews()
    {
        return view('admin.news.create');
    }

    // Simpan Berita Baru
    public function storeNews(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image',
            'published_at' => 'required|date',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        News::create($data);
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    // Form Edit Berita
    public function editNews($id)
    {
        $news = News::findOrFail($id);
        // dd($news);
        return view('admin.news.edit', compact('news'));
    }

    // Update Berita
    public function updateNews(Request $request, News $news)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image',
            // 'published_at' => 'nullable|date',

        ]);

        // $data['published_at'] = $data['published_at'] ?? now();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }
        
        $news->update($data);
        
        // dd($news);
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui.');
    }

    // Hapus Berita
    public function destroyNews(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus.');
    }

    // Tampilkan Daftar Artikel
    public function indexArticles()
    {
        $articles = Article::all();
        return view('admin.articles.index', compact('articles'));
    }

    public function createArticle(Request $request)
{
    // Cek apakah ini pembuatan artikel balasan untuk konsultasi atau artikel biasa
    $consultation = null;
    if ($request->has('consultation_id')) {
        $consultation = Consultation::find($request->consultation_id);
    }
    return view('admin.articles.create', compact('consultation'));
}

public function storeArticle(Request $request)
{
    // Validasi data artikel, termasuk consultation_id jika ada
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|image',
        'published_at' => 'nullable|date',
        'consultation_id' => 'nullable|integer|exists:consultations,id',
    ]);

    // Simpan gambar jika ada
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('images', 'public');
    }

    // Set default published_at jika tidak ada
    $data['published_at'] = $data['published_at'] ?? now();

    // Buat artikel baru
    $article = Article::create($data);

    // Jika ini adalah artikel balasan untuk konsultasi
    if ($request->filled('consultation_id')) {
        $consultation = Consultation::findOrFail($request->consultation_id);
        $consultation->answered = true;
        $consultation->save();

        // Kirim email ke user yang bertanya
        $this->sendConsultationAnsweredEmail($consultation, $article);
    }

    return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil ditambahkan.');
}

protected function sendConsultationAnsweredEmail(Consultation $consultation, Article $article)
{
    $data = [
        'user_name' => $consultation->name,
        'article_title' => $article->title,
        'article_link' => route('articles.show', $article->id),
    ];

    Mail::to($consultation->email)->send(new ConsultationAnswered($data));
}

    // Form Edit Artikel
    public function editArticle(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    // Update Artikel
    public function updateArticle(Request $request, Article $article)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $article->update($data);
        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    // Hapus Artikel
    public function destroyArticle(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dihapus.');
    }

    public function consultations()
    {
        // Ambil semua pertanyaan konsultasi, urutkan dari yang terbaru
        $consultations = Consultation::latest()->get();

        // Tampilkan view dengan data pertanyaan
        return view('admin.consultations', compact('consultations'));
    }
}
