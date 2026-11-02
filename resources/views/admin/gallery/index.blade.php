@extends('layouts.admin.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    body { background-color: #f4f1ea; color: #1a1a1a; font-family: 'Inter', sans-serif; }
    
    .page-title { font-family: 'Playfair Display', serif; font-weight: 700; color: #000; font-size: 2rem; letter-spacing: -1px; }
    .sub-title { color: #c5a059; font-weight: 800; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 2px; }

    /* Luxury Card Form */
    .lux-card {
        background: #fff; border: 2px solid #1a1a1a; border-radius: 0;
        box-shadow: 8px 8px 0px rgba(197, 160, 89, 0.2); padding: 25px;
    }

    /* Upload Area & Preview */
    .upload-box {
        width: 100%; max-width: 200px; aspect-ratio: 1/1;
        border: 2px dashed #c5a059; background: #fafafa;
        display: flex; align-items: center; justify-content: center;
        overflow: hidden; margin: 0 auto 15px; position: relative;
    }
    #image-preview { width: 100%; height: 100%; object-fit: cover; display: none; }
    .placeholder-icon { color: #c5a059; text-align: center; font-size: 0.7rem; font-weight: 700; }

    .lux-input { border: 2px solid #eee; border-radius: 0; padding: 10px; font-size: 0.9rem; }
    .lux-input:focus { border-color: #c5a059; box-shadow: none; }

    .btn-upload {
        background: #1a1a1a; color: #fff; border: none; border-radius: 0;
        font-weight: 800; text-transform: uppercase; letter-spacing: 1px;
        padding: 10px 20px; transition: 0.3s;
    }
    .btn-upload:hover { background: #c5a059; }

    /* Gallery Grid */
    .gallery-item {
        position: relative; border: 2px solid #1a1a1a; overflow: hidden;
        aspect-ratio: 1/1; background: #000;
    }
    .gallery-item img { width: 100%; height: 100%; object-fit: cover; transition: 0.5s; opacity: 0.9; }
    .gallery-item:hover img { transform: scale(1.1); opacity: 1; }

    /* Mini Delete Button */
    .btn-delete-gallery {
        position: absolute; top: 5px; end: 5px;
        width: 32px; height: 32px; background: rgba(211, 47, 47, 0.9);
        color: white; border: none; font-size: 1rem;
        display: flex; align-items: center; justify-content: center;
        z-index: 10; transition: 0.3s;
    }
    .btn-delete-gallery:hover { background: #b71c1c; transform: scale(1.1); }

    .caption-badge {
        position: absolute; bottom: 0; left: 0; right: 0;
        background: rgba(0,0,0,0.7); color: white;
        font-size: 0.65rem; padding: 5px 8px; text-transform: uppercase;
        font-weight: 600; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
    }

    @media (max-width: 768px) {
        .lux-card { padding: 15px; }
    }
</style>

<div class="container py-4 px-lg-5">
    
    <div class="mb-5 border-start border-4 border-dark ps-3">
        <span class="sub-title">FA.STORYBUCKET</span>
        <h1 class="page-title mb-0">Manajemen Gallery</h1>
    </div>

    <div class="lux-card mb-5">
        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="upload-box" id="preview-container">
                        <img id="image-preview" src="#">
                        <div class="placeholder-icon" id="placeholder">
                            <i class="fa-solid fa-cloud-arrow-up fa-2x mb-1"></i><br>PREVIEW
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="fw-bold small mb-1 text-uppercase">Pilih File Foto</label>
                            <input type="file" name="image" id="gallery-input" class="form-control lux-input" required accept="image/*">
                        </div>
                        <div class="col-12">
                            <label class="fw-bold small mb-1 text-uppercase">Caption Singkat (Opsional)</label>
                            <input type="text" name="caption" class="form-control lux-input" placeholder="Contoh: Wedding Bouquet Order #12">
                        </div>
                        <div class="col-12 mt-4">
                            <button class="btn btn-upload w-100 py-3 shadow-sm">
                                <i class="fa-solid fa-plus me-2"></i> Tambah ke Gallery
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="row g-3">
        @foreach($galleries as $item)
        <div class="col-6 col-md-3">
            <div class="gallery-item shadow-sm">
                <img src="{{ asset('storage/'.$item->image) }}" alt="Gallery Item">
                
                @if($item->caption)
                    <div class="caption-badge">{{ $item->caption }}</div>
                @endif

                <form id="delete-gallery-{{ $item->id }}" action="{{ route('admin.gallery.destroy', $item->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="button" onclick="confirmDeleteGallery('{{ $item->id }}')" class="btn-delete-gallery" title="Hapus">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    // 1. Live Preview Script
    document.getElementById('gallery-input').onchange = function (evt) {
        const [file] = this.files;
        if (file) {
            const preview = document.getElementById('image-preview');
            const placeholder = document.getElementById('placeholder');
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
            placeholder.style.display = 'none';
        }
    };

    // 2. Toast Notifikasi
    const Toast = Swal.mixin({
        toast: true, position: 'top-end', showConfirmButton: false,
        timer: 2000, timerProgressBar: true, background: '#1a1a1a', color: '#fff'
    });

    @if(session('success'))
        Toast.fire({ icon: 'success', title: "{{ session('success') }}", iconColor: '#c5a059' });
    @endif

    // 3. Mini Delete Confirmation
    function confirmDeleteGallery(id) {
        Swal.fire({
            title: 'HAPUS FOTO?',
            icon: 'warning',
            iconColor: '#c5a059',
            width: '260px',
            showCancelButton: true,
            confirmButtonColor: '#1a1a1a',
            cancelButtonColor: '#d33',
            confirmButtonText: 'YA',
            cancelButtonText: 'BATAL',
            background: '#ffffff',
            customClass: { popup: 'mini-alert-lux' }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-gallery-' + id).submit();
            }
        });
    }
</script>

<style>
    .mini-alert-lux { border-radius: 0 !important; border: 2px solid #1a1a1a !important; font-family: 'Inter', sans-serif; }
    .swal2-title { font-size: 1.1rem !important; font-weight: 800 !important; }
</style>

@endsection