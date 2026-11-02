<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function edit()
    {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'section_title' => 'required',
            'headline'      => 'required',

            'item1_title' => 'required',
            'item1_desc'  => 'required',

            'item2_title' => 'required',
            'item2_desc'  => 'required',

            'item3_title' => 'required',
            'item3_desc'  => 'required',
        ]);

        $about = About::first();
        $about->update($request->all());

        return back()->with('success', 'Konten About berhasil diperbarui ✨');
    }
}
