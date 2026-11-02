@extends('layouts.admin.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,700&family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    body { background-color: #f4f1ea; color: #1a1a1a; font-family: 'Inter', sans-serif; }
    
    .page-title { font-family: 'Playfair Display', serif; font-weight: 700; color: #000; font-size: clamp(1.8rem, 5vw, 2.5rem); letter-spacing: -1px; }
    .sub-title { color: #c5a059; font-weight: 800; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 2px; }

    /* Luxury Card Form */
    .luxury-card { background: #ffffff; border: 2px solid #1a1a1a; box-shadow: 10px 10px 0px rgba(197, 160, 89, 0.2); padding: 40px; max-width: 800px; border-radius: 0; }

    /* Custom File Upload */
    .file-upload-input { width: 100%; padding: 15px; border: 2px dashed #1a1a1a; background: #fdfaf9; cursor: pointer; font-weight: 700; font-size: 0.8rem; text-transform: uppercase; transition: 0.3s; border-radius: 0; }
    .file-upload-input:hover { background: #fceae8; border-color: #c5a059; }

    /* Preview Frame */
    .preview-container { margin-top: 25px; border: 1px solid #eee; padding: 15px; background: #fff; position: relative; }
    .preview-frame { width: 100%; height: 450px; overflow: hidden; background: #eee; border: 1px solid #1a1a1a; }
    .preview-frame img { width: 100%; height: 100%; object-fit: cover; }

    .badge-status { position: absolute; top: 25px; left: 25px; background: #1a1a1a; color: #c5a059; padding: 5px 15px; font-size: 0.7rem; font-weight: 800; letter-spacing: 1px; z-index: 10; }

    /* Button Update */
    .btn-update { background: #1a1a1a; color: #fff; border: none; padding: 15px 40px; font-weight: 800; text-transform: uppercase; letter-spacing: 2px; font-size: 0.85rem; transition: 0.3s; width: 100%; margin-top: 30px; border-radius: 0; }
    .btn-update:hover { background: #c5a059; color: #fff; transform: translateY(-3px); }

    /* --- SWEETALERT CUSTOM CSS (MINI & NORMAL CASE) --- */
    .mini-alert-lux { 
        border-radius: 0 !important; 
        border: 2px solid #1a1a1a !important; 
        font-family: 'Inter', sans-serif !important; 
    }
    .swal2-title.text-normal { 
        font-size: 1.1rem !important; 
        font-weight: 700 !important; 
        text-transform: none !important; /* Agar tidak kapital */
        letter-spacing: 0 !important;
    }
    .swal2-confirm.btn-lux {
        border-radius: 0 !important;
        font-size: 0.75rem !important;
        text-transform: none !important;
        font-weight: 700 !important;
        padding: 8px 25px !important;
    }
</style>

<div class="container-fluid py-4 px-lg-5">
   <div class="mb-5 border-start border-4 border-dark ps-3">
        <span class="sub-title">FA.STORYBUCKET</span>
        <h1 class="page-title mb-0">Kelola Hero Image</h1>
    </div>

    <div class="luxury-card mx-auto">
        <form action="{{ route('admin.hero.update', $hero->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="d-block fw-bold text-uppercase mb-3" style="font-size: 0.75rem; letter-spacing: 1px;">
                    Unggah Gambar Baru
                </label>
                <input type="file" name="image" id="imageInput" class="file-upload-input" accept="image/*" required>
                <small class="text-muted d-block mt-2 italic">*Rekomendasi ukuran: 1080x1440 px (Portrait)</small>
            </div>

            <div class="preview-container">
                <span class="badge-status uppercase" id="previewStatus">Tampilan Saat Ini</span>
                <div class="preview-frame">
                    <img id="imgPreview" src="{{ asset('storage/'.$hero->image) }}" alt="Hero Preview">
                </div>
            </div>

            <button type="submit" class="btn-update shadow-sm">
                <i class="fa-solid fa-cloud-arrow-up me-2"></i> Perbarui Visual Utama
            </button>
        </form>
    </div>

    <div class="mt-5 text-center">
        <p class="text-muted" style="font-size: 0.8rem;">
            <i class="fa-solid fa-circle-info me-1"></i> 
            Gambar ini akan muncul sebagai Hero Section di Landing Page FA.STORYBUCKET.
        </p>
    </div>
</div>

<script>
    // Fitur Instant Preview
    const imageInput = document.getElementById('imageInput');
    const imgPreview = document.getElementById('imgPreview');
    const previewStatus = document.getElementById('previewStatus');

    // Toast Config Minimalis
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        background: '#1a1a1a',
        color: '#ffffff',
    });

    imageInput.onchange = evt => {
        const [file] = imageInput.files;
        if (file) {
            imgPreview.src = URL.createObjectURL(file);
            previewStatus.innerHTML = "Pratinjau Terpilih";
            previewStatus.style.background = "#c5a059";
            previewStatus.style.color = "#1a1a1a";
            
            Toast.fire({
                icon: 'success',
                title: 'Pratinjau visual diperbarui',
                iconColor: '#c5a059'
            });
        }
    }

    // Alert Sukses (SESUAI REQUEST: Mini 260px & Tidak Kapital Semua)
    @if(session('success'))
        Swal.fire({
            title: 'Berhasil diperbarui', 
            text: 'Visual Hero FA.STORYBUCKET sudah ganti.',
            icon: 'success',
            iconColor: '#c5a059',
            width: '260px', // Mini sesuai gallery
            confirmButtonText: 'Ok',
            confirmButtonColor: '#1a1a1a',
            background: '#ffffff',
            customClass: {
                popup: 'mini-alert-lux',
                title: 'text-normal',
                confirmButton: 'btn-lux'
            }
        });
    @endif
</script>
@endsection