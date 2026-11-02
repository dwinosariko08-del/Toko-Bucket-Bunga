@extends('layouts.admin.app')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    body { background-color: #f4f1ea; color: #1a1a1a; font-family: 'Inter', sans-serif; }
    
    .form-container {
        background: #ffffff; border: 2px solid #1a1a1a;
        box-shadow: 10px 10px 0px rgba(197, 160, 89, 0.2);
        padding: 30px; max-width: 800px; margin: auto;
    }

    .form-label { font-weight: 800; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1px; }

    .lux-input { border: 2px solid #eee; border-radius: 0; padding: 12px; transition: 0.3s; }
    .lux-input:focus { border-color: #c5a059; box-shadow: none; background-color: #fffaf0; }

    /* Container Preview Gambar */
    .preview-wrapper {
        position: relative;
        width: 100%;
        max-width: 300px;
        aspect-ratio: 1/1;
        border: 2px dashed #c5a059;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background-color: #fafafa;
        margin-bottom: 20px;
    }

    #image-preview {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: none; /* Sembunyikan jika belum ada gambar */
    }

    .placeholder-text {
        text-align: center;
        color: #c5a059;
        font-weight: 700;
        font-size: 0.8rem;
        text-transform: uppercase;
    }

    .btn-save {
        background: #1a1a1a; color: white; border-radius: 0;
        padding: 15px; font-weight: 800; letter-spacing: 2px;
        width: 100%; border: none; text-transform: uppercase;
    }
    .btn-save:hover { background: #c5a059; }
</style>

<div class="container py-4">
    <div class="mb-5 border-start border-4 border-dark ps-3">
        <span class="text-uppercase fw-bold text-muted small" style="letter-spacing: 2px;">FA.STORYBUCKET</span>
        <h1 style="font-family: 'Playfair Display', serif; font-weight: 700;">{{ isset($product) ? 'Edit Mahakarya' : 'Tambah Produk' }}</h1>
    </div>

    <div class="form-container">
        <form method="POST" enctype="multipart/form-data" 
              action="{{ isset($product) ? route('products.update', $product) : route('products.store') }}">
            @csrf
            @if(isset($product)) @method('PUT') @endif

            <div class="mb-4">
                <label class="form-label d-block text-center">Visual Preview</label>
                <div class="preview-wrapper mx-auto shadow-sm" id="preview-container">
                    @if(isset($product) && $product->image)
                        <img src="{{ asset('storage/'.$product->image) }}" id="image-preview" style="display: block;">
                        <div class="placeholder-text d-none" id="placeholder">Pilih Gambar</div>
                    @else
                        <img src="" id="image-preview">
                        <div class="placeholder-text" id="placeholder">
                            <i class="fa-solid fa-camera fa-2x mb-2"></i><br>Belum Ada Gambar
                        </div>
                    @endif
                </div>
                <input type="file" class="form-control lux-input" name="image" id="image-input" accept="image/*" {{ isset($product) ? '' : 'required' }}>
            </div>

            <div class="mb-4">
                <label class="form-label">Nama Produk</label>
                <input type="text" class="form-control lux-input" name="name" value="{{ $product->name ?? '' }}" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Deskripsi</label>
                <textarea class="form-control lux-input" name="description" required>{{ $product->description ?? '' }}</textarea>
            </div>

            <div class="mb-4">
                <label class="form-label">Harga (IDR)</label>
                <input type="number" class="form-control lux-input" name="price" value="{{ $product->price ?? '' }}" required>
            </div>

            <button type="submit" class="btn-save shadow-sm">
                {{ isset($product) ? 'Perbarui Data' : 'Simpan ke Katalog' }}
            </button>
            
            <div class="text-center mt-3">
                <a href="{{ route('products.index') }}" class="text-decoration-none text-dark fw-bold small">BATALKAN</a>
            </div>
        </form>
    </div>
</div>

<script>
    // Logika Preview Gambar
    const imageInput = document.getElementById('image-input');
    const imagePreview = document.getElementById('image-preview');
    const placeholder = document.getElementById('placeholder');

    imageInput.onchange = evt => {
        const [file] = imageInput.files;
        if (file) {
            // Tampilkan preview
            imagePreview.src = URL.createObjectURL(file);
            imagePreview.style.display = 'block';
            // Sembunyikan teks placeholder
            placeholder.classList.add('d-none');
        }
    }
</script>
@endsection