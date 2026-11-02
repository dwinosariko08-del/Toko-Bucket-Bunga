<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * SIMPAN TESTIMONIAL (POST ONLY)
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'city'    => 'nullable|string|max:100',
            'message' => 'required|string|max:500',
        ]);

        Testimonial::create($request->only(
            'name',
            'city',
            'message'
        ));

        return redirect()->back()
            ->with('success', 'Terima kasih atas testimoni Anda 💖');
    }

    /**
     * ADMIN: Lihat semua testimonial
     */
    public function adminIndex()
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * ADMIN: Hapus testimonial
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonials')
            ->with('success', 'Testimoni berhasil dihapus');
    }
}
