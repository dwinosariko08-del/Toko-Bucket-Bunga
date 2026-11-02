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

    .luxury-card {
        background: #ffffff;
        border: 2px solid #1a1a1a;
        border-radius: 0;
        box-shadow: 10px 10px 0px rgba(197, 160, 89, 0.2);
    }

    .section-divider {
        border-top: 2px solid #1a1a1a;
        margin: 30px 0;
        opacity: 1;
    }

    .form-label {
        font-weight: 800;
        text-transform: uppercase;
        font-size: 0.7rem;
        letter-spacing: 1px;
        color: #c5a059;
        margin-bottom: 8px;
    }

    .custom-control {
        border: 2px solid #1a1a1a;
        border-radius: 0;
        padding: 12px;
        font-weight: 600;
        transition: 0.3s;
    }

    .custom-control:focus {
        border-color: #c5a059;
        box-shadow: 5px 5px 0px rgba(197, 160, 89, 0.1);
        outline: none;
    }

    .point-header {
        background: #1a1a1a;
        color: #c5a059;
        display: inline-block;
        padding: 5px 15px;
        font-weight: 800;
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 15px;
    }

    .btn-save {
        background: #1a1a1a;
        color: #ffffff;
        border-radius: 0;
        padding: 15px 40px;
        font-size: 0.8rem;
        font-weight: 800;
        letter-spacing: 2px;
        transition: 0.3s;
        border: none;
        text-transform: uppercase;
    }

    .btn-save:hover {
        background: #c5a059;
        color: white;
        transform: translateY(-2px);
    }
</style>

<div class="container-fluid py-4 px-lg-5">
     <div class="mb-5 border-start border-4 border-dark ps-3">
        <span class="sub-title">FA.STORYBUCKET</span>
        <h1 class="page-title mb-0">Atur About</h1>
    </div>
    </div>


    <form action="{{ route('admin.about.update') }}" method="POST">
        @csrf

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="luxury-card p-4 h-100">
                    <div class="point-header">Identitas Utama</div>
                    
                    <div class="mb-4">
                        <label class="form-label">Judul Kecil (Pre-Title)</label>
                        <input type="text" name="section_title" class="form-control custom-control"
                               value="{{ $about->section_title }}" placeholder="Contoh: OUR STORY">
                    </div>

                    <div class="mb-0">
                        <label class="form-label">Judul Utama (Headline)</label>
                        <input type="text" name="headline" class="form-control custom-control"
                               value="{{ $about->headline }}" placeholder="Contoh: Sentuhan Bunga Berkualitas">
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="luxury-card p-4">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="point-header">Keunggulan 01</div>
                            <input type="text" name="item1_title" class="form-control custom-control mb-2"
                                   value="{{ $about->item1_title }}" placeholder="Judul Poin 1">
                            <textarea name="item1_desc" class="form-control custom-control"
                                      rows="3" placeholder="Deskripsi singkat poin 1">{{ $about->item1_desc }}</textarea>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="point-header">Keunggulan 02</div>
                            <input type="text" name="item2_title" class="form-control custom-control mb-2"
                                   value="{{ $about->item2_title }}" placeholder="Judul Poin 2">
                            <textarea name="item2_desc" class="form-control custom-control"
                                      rows="3" placeholder="Deskripsi singkat poin 2">{{ $about->item2_desc }}</textarea>
                        </div>

                        <div class="col-md-12">
                            <div class="point-header">Keunggulan 03</div>
                            <input type="text" name="item3_title" class="form-control custom-control mb-2"
                                   value="{{ $about->item3_title }}" placeholder="Judul Poin 3">
                            <textarea name="item3_desc" class="form-control custom-control"
                                      rows="3" placeholder="Deskripsi singkat poin 3">{{ $about->item3_desc }}</textarea>
                        </div>
                    </div>

                    <div class="mt-5 text-end">
                        <button type="submit" class="btn btn-save shadow-sm">
                            <i class="fa-solid fa-check-double me-2"></i> Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="mt-5 border-end border-4 border-dark pe-3 text-end">
        <span class="d-block fw-bold" style="font-size: 0.8rem; letter-spacing: 1px;">KONTEN AKTIF</span>
        <small class="text-muted">Terakhir diperbarui pada: {{ $about->updated_at->format('d M Y, H:i') }} WIB</small>
    </div>
</div>

<script>
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