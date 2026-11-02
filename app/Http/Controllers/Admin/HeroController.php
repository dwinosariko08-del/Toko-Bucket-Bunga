<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hero;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function index()
    {
        $hero = Hero::first();
        return view('admin.hero.index', compact('hero'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        $hero = Hero::findOrFail($id);

        // Hapus image lama jika ada
        if ($hero->image && Storage::disk('public')->exists($hero->image)) {
            Storage::disk('public')->delete($hero->image);
        }

        $path = $request->file('image')->store('hero', 'public');
        $hero->update(['image' => $path]);

        return redirect()->back()->with('success', 'Hero image berhasil diperbarui.');
    }
}
