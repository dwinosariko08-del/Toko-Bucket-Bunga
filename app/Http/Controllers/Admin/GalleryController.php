<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
            'caption' => 'nullable|string'
        ]);

        $path = $request->file('image')->store('gallery', 'public');

        Gallery::create([
            'image' => $path,
            'caption' => $request->caption
        ]);

        return back()->with('success','Foto berhasil ditambahkan');
    }

    public function destroy(Gallery $gallery)
    {
        Storage::disk('public')->delete($gallery->image);
        $gallery->delete();

        return back()->with('success','Foto dihapus');
    }
}
