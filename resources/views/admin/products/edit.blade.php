@extends('layouts.admin.app')

@section('content')
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
        font-size: clamp(1.5rem, 5vw, 2.2rem);
        letter-spacing: -1px;
    }

    .sub-title {
        color: #c5a059;
        font-weight: 800;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        display: block;
    }

    /* Luxury Form Card */
    .form-container {
        background: #ffffff;
        border: 2px solid #1a1a1a;
        border-radius: 0;
        box-shadow: 10px 10px 0px rgba(197, 160, 89, 0.2);
        padding: 30px;
        max-width: 700px;
        margin: auto;
    }

    /* Area Preview Gambar */
    .preview-wrapper {
        width: 100%;
        max-width: 280px;
        aspect-ratio: 1/1;
        border: 2px dashed #c5a059;
        background: #fafafa;
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        position: relative;
    }

    #image-preview {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: {{ isset($product) && $product->image ? 'block' : 'none' }};
    }

    .placeholder-info {
        text-align: center;
        color: #c5a059;
        font-weight: 700;
        font-size: 0.7rem;
        display: {{ isset($product) && $product->image ? 'none' : 'block' }};
    }

    /* Input Styling */
    .form-label {
        font-weight: 800;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 1px;
        color: #1a1a1a;
    }

    .lux-input {
        border: 2px solid #eee;
        border-radius: 0;
        padding: 12px 15px;
        font-size: 1rem;
        color: #1a1a1a;
        transition: 0.3s;
    }

    .lux-input:focus {
        border-color: #c5a059;
        box-shadow: none;
        background-color: #fffaf0;
    }

    /* Button Action */
    .btn-save {
        background: #1a1a1a;
        color: #ffffff;
        border-radius: 0;
        padding: 15px;
        font-size: 0.9rem;
        font-weight: 800;
        letter-spacing: 2px;
        border: none;
        text-transform: uppercase;
        width: 100%;
        transition: 0.3s;
    }

    .btn-save:hover {
        background: #c5a059;
    }

    @media (max-width: 768px) {
        .form-container { padding: 20px; }
    }
</style>

<div class="container py-4 px-lg-5">
    
    <div class="mb-5 border-start border-4 border-dark ps-3">
        <span class="sub-title">{{ isset($product) ? 'FA.STORYBUCKET' : 'Registrasi Baru' }}</span>
        <h1 class="page-title">{{ isset($product) ? 'Edit Produk' : 'Tambah Produk' }}</h1>
    </div>

    <div class="form-container">
        <form method="POST" enctype="multipart/form-data" 
              action="{{ isset($product) ? route('products.update', $product) : route('products.store') }}">
            @csrf
            @if(isset($product)) @method('PUT') @endif

            <div class="mb-4 text-center">
                <label class="form-label d-block text-start">Visual Produk</label>
                <div class="preview-wrapper shadow-sm">
                    <img id="image-preview" src="{{ isset($product) && $product->image ? asset('storage/'.$product->image) : '#' }}">
                    <div class="placeholder-info" id="placeholder-text">
                        <i class="fa-solid fa-camera fa-2x mb-2"></i><br>
                        PILIH FOTO PRODUK
                    </div>
                </div>
                <input type="file" class="form-control lux-input" name="image" id="input-image" accept="image/*" {{ isset($product) ? '' : 'required' }}>
                <small class="text-muted d-block mt-2" style="font-size: 0.7rem;">*Gunakan rasio 1:1 untuk hasil terbaik di katalog.</small>
            </div>

            <div class="mb-4">
                <label class="form-label">Nama Produk</label>
                <input type="text" class="form-control lux-input" name="name" 
                       placeholder="Masukkan nama produk..." 
                       value="{{ $product->name ?? '' }}" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Deskripsi Produk</label>
                <textarea class="form-control lux-input" name="description" rows="4" 
                          placeholder="Jelaskan detail keindahan produk..." required>{{ $product->description ?? '' }}</textarea>
            </div>

            <div class="mb-5">
                <label class="form-label">Harga (Rp)</label>
                <input type="number" class="form-control lux-input" name="price" 
                       placeholder="Contoh: 150000" 
                       value="{{ $product->price ?? '' }}" required>
            </div>

            <div class="d-flex flex-column gap-3">
                <button type="submit" class="btn-save shadow-sm">
                    <i class="fa-solid fa-floppy-disk me-2"></i> SIMPAN PERUBAHAN
                </button>
                <a href="{{ route('products.index') }}" class="text-center text-decoration-none text-muted fw-bold small">
                    BATALKAN & KEMBALI
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('input-image').onchange = function (evt) {
        const [file] = this.files;
        if (file) {
            const preview = document.getElementById('image-preview');
            const placeholder = document.getElementById('placeholder-text');
            
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
            placeholder.style.display = 'none';
        }
    };
</script>

@endsection