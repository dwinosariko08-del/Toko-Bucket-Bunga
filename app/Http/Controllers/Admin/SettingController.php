<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::first();
        return view('admin.wa.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'whatsapp' => 'required|string'
        ]);

        Setting::first()->update([
            'whatsapp' => $request->whatsapp
        ]);

        return back()->with('success', 'Nomor WhatsApp berhasil diperbarui');
    }
}
