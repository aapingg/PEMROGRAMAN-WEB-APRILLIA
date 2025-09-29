<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(), // Mengambil ID user yang sedang login
        ]);

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();
        if ($user->role === 'admin' || $user->id === $article->user_id) {
            $article->delete();
            return redirect()->route('articles.index')->with('success', 'Artikel berhasil dihapus!');
        }

        // Jika tidak diizinkan, kembalikan error
        return abort(403, 'ANDA TIDAK PUNYA AKSES UNTUK MENGHAPUS ARTIKEL INI');
    

        $this->authorize('delete', $article);

    $article->delete();
    return redirect()->route('articles.index')->with('success', 'Artikel berhasil dihapus!');
    }

    
}
