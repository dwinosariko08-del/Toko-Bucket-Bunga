@extends('layouts.admin.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    body {
        background-color: #f4f1ea;
        color: #1a1a1a;
        font-family: 'Inter', sans-serif;
    }

    .page-title {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        color: #000000;
        font-size: clamp(1.8rem, 5vw, 2.5rem);
        letter-spacing: -1px;
    }

    .sub-title {
        color: #c5a059;
        font-weight: 800;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    /* Luxury Card Style */
    .luxury-card {
        background: #ffffff;
        border: 2px solid #1a1a1a;
        border-radius: 0;
        box-shadow: 10px 10px 0px rgba(197, 160, 89, 0.2);
        max-width: 600px; /* Dibuat lebih ramping agar elegan */
    }

    /* Form Styling */
    .form-label {
        font-weight: 800;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 1px;
        color: #c5a059;
        margin-bottom: 10px;
    }

    .custom-input {
        border: 2px solid #1a1a1a;
        border-radius: 0;
        padding: 12px 15px;
        font-weight: 600;
        font-size: 0.95rem;
        transition: 0.3s;
    }

    .custom-input:focus {
        border-color: #c5a059;
        box-shadow: 5px 5px 0px rgba(197, 160, 89, 0.1);
        outline: none;
    }

    /* Button Styling */
    .btn-save {
        background: #1a1a1a;
        color: #ffffff;
        border-radius: 0;
        padding: 15px 30px;
        font-size: 0.8rem;
        font-weight: 800;
        letter-spacing: 2px;
        transition: 0.3s;
        border: none;
        text-transform: uppercase;
        width: 100%;
    }

    .btn-save:hover {
        background: #c5a059;
        color: white;
        transform: translateY(-2px);
    }

    .input-group-text {
        background: #1a1a1a;
        color: #c5a059;
        border: 2px solid #1a1a1a;
        border-radius: 0;
        font-weight: bold;
    }
</style>

<div class="container-fluid py-4 px-lg-5">
    
    <div class="mb-5 border-start border-4 border-dark ps-3">
        <span class="sub-title">FA.STORYBUCKET</span>
        <h1 class="page-title mb-0">Pengaturan Kontak</h1>
    </div>

    <div class="luxury-card p-4 p-md-5">
        <form method="POST" action="{{ route('admin.settings.update') }}">
            @csrf

            <div class="mb-4">
                <label class="form-label">Nomor WhatsApp Utama</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-brands fa-whatsapp text-xl"></i></span>
                    <input type="text" 
                           name="whatsapp" 
                           class="form-control custom-input" 
                           value="{{ $setting->whatsapp }}" 
                           placeholder="6285240099322">
                </div>
                <div class="mt-2">
                    <small class="text-muted italic" style="font-size: 0.75rem;">
                        *Gunakan format kode negara (Contoh: 62852...)
                    </small>
                </div>
            </div>

            <button type="submit" class="btn btn-save shadow-sm">
                <i class="fa-solid fa-floppy-disk me-2"></i> Simpan Perubahan
            </button>
        </form>
    </div>

    <div class="mt-5 border-end border-4 border-dark pe-3 text-end" style="max-width: 600px;">
        <span class="d-block fw-bold" style="font-size: 0.8rem; letter-spacing: 1px;">SISTEM KEAMANAN</span>
        <small class="text-muted">Perubahan data akan langsung berdampak pada tombol chat di Landing Page.</small>
    </div>
</div>

<script>
    // Toast Notification untuk Sukses
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        background: '#1a1a1a',
        color: '#ffffff',
    });

    @if(session('success'))
        Toast.fire({
            icon: 'success',
            iconColor: '#c5a059',
            title: "{{ session('success') }}"
        });
    @endif
</script>
@endsection