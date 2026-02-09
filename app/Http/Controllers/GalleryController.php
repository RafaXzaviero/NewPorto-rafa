<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    // Tampilkan Halaman Utama
    public function index()
    {
        // Ambil data terbaru dari database
        $galleries = Gallery::latest()->get();
        return view('welcome', compact('galleries'));
    }

    // Simpan Data & Foto
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
            'description' => 'nullable',
        ]);

        // Upload Foto
        $imagePath = $request->file('image')->store('galleries', 'public');

        // Simpan ke Database
        Gallery::create([
            'title' => $request->title,
            'category' => $request->category,
            'image_path' => $imagePath,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Kegiatan berhasil ditambahkan!');
    }

    // Hapus Data
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        // Hapus file foto dari folder
        if (Storage::disk('public')->exists($gallery->image_path)) {
            Storage::disk('public')->delete($gallery->image_path);
        }

        $gallery->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
