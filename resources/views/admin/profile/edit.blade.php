@extends('layouts.admin.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    body { background-color: #f4f1ea; color: #1a1a1a; font-family: 'Inter', sans-serif; }
    
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

    /* CONTAINER FORM MEWAH */
    .form-container-lux {
        background: #ffffff;
        border: 2px solid #1a1a1a;
        box-shadow: 10px 10px 0px rgba(197, 160, 89, 0.2);
        padding: 40px;
        max-width: 700px; /* Dibuat ramping agar tidak melebar */
    }

    /* LABEL STYLE */
    .lux-label {
        display: block;
        font-weight: 800;
        text-transform: uppercase;
        font-size: 0.7rem;
        letter-spacing: 1px;
        color: #c5a059;
        margin-bottom: 8px;
    }

    /* INPUT STYLE */
    .lux-input {
        width: 100%;
        border: 2px solid #1a1a1a;
        border-radius: 0;
        padding: 12px 15px;
        font-size: 0.95rem;
        font-weight: 600;
        color: #1a1a1a;
        transition: 0.3s;
        background: #fff;
    }

    .lux-input:focus {
        border-color: #c5a059;
        outline: none;
        background-color: #fffcf5;
        box-shadow: 5px 5px 0px rgba(197, 160, 89, 0.1);
    }

    /* DIVIDER */
    .lux-hr {
        border: 0;
        border-top: 2px solid #1a1a1a;
        margin: 30px 0;
        opacity: 1;
    }

    /* BUTTON */
    .btn-save-lux {
        background: #1a1a1a;
        color: #ffffff;
        border: none;
        border-radius: 0;
        padding: 15px 30px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 0.8rem;
        width: 100%;
        transition: 0.3s;
    }

    .btn-save-lux:hover {
        background: #c5a059;
        color: white;
        transform: translateY(-2px);
    }

    .error-msg {
        color: #d33;
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        margin-top: 5px;
        display: block;
    }
</style>

<div class="container-fluid py-4 px-lg-5">
    
    <div class="mb-5 border-start border-4 border-dark ps-3">
        <span class="sub-title">FA.STORYBUCKET</span>
        <h1 class="page-title mb-0">Pengaturan Akun Admin</h1>
    </div>

    <div class="form-container-lux">
        <form action="{{ route('admin.profile.update') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="lux-label">Email Admin</label>
                <input type="email" name="email" class="lux-input" 
                       value="{{ $admin->email }}" required placeholder="your@email.com">
            </div>

            <div class="lux-hr"></div>

            <div class="mb-4">
                <label class="lux-label">Password Lama <span class="text-dark">(WAJIB)</span></label>
                <input type="password" name="current_password" class="lux-input" 
                       required placeholder="KONFIRMASI PASSWORD SAAT INI">
                @error('current_password')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="lux-label">Password Baru (Opsional)</label>
                <input type="password" name="password" class="lux-input" 
                       placeholder="ISI JIKA INGIN MENGGANTI">
            </div>

            <div class="mb-5">
                <label class="lux-label">Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation" class="lux-input" 
                       placeholder="ULANGI PASSWORD BARU">
            </div>

            <button type="submit" class="btn-save-lux shadow-sm">
                <i class="fa-solid fa-floppy-disk me-2"></i> Simpan Perubahan Akun
            </button>
        </form>
    </div>

    <div class="mt-5 text-muted small">
        <p class="mb-0 fw-bold text-dark" style="letter-spacing: 1px;">FA.STORYBUCKET ADMIN PANEL</p>
        <p>Gunakan kombinasi password yang kuat untuk keamanan toko bunga online Anda.</p>
    </div>
</div>

<script>
    @if(session('success'))
        Swal.fire({
            title: 'SUKSES',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonColor: '#1a1a1a',
            customClass: { popup: 'mini-alert-lux' }
        });
    @endif
</script>
@endsection