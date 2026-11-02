@extends('layouts.admin.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,700&family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
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

    /* SEARCH BOX */
    .search-wrapper {
        position: relative;
        max-width: 400px;
    }
    .search-input {
        width: 100%;
        padding: 12px 20px 12px 45px;
        background: #ffffff;
        border: 2px solid #1a1a1a;
        border-radius: 0;
        font-size: 0.85rem;
        font-weight: 600;
        transition: 0.3s;
        outline: none;
    }
    .search-input:focus {
        border-color: #c5a059;
        box-shadow: 5px 5px 0px rgba(197, 160, 89, 0.1);
    }
    .search-icon {
        position: absolute;
        left: 18px;
        top: 50%;
        transform: translateY(-50%);
        color: #1a1a1a;
        font-size: 0.9rem;
    }

    /* CARD LUXURY */
    .luxury-card {
        background: #ffffff;
        border: 2px solid #1a1a1a;
        border-radius: 0;
        box-shadow: 10px 10px 0px rgba(197, 160, 89, 0.2);
        overflow: hidden;
    }

    /* TABEL RATA KANAN */
    .custom-table { margin-bottom: 0; }
    .custom-table thead { background: #1a1a1a; }
    .custom-table th {
        border: none;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 2px;
        color: #c5a059 !important;
        padding: 20px;
        font-weight: 800;
        text-align: right;
    }
    .custom-table th:first-child, .custom-table td:first-child {
        text-align: left;
    }

    .custom-table td {
        vertical-align: middle;
        padding: 15px 20px;
        border-bottom: 1px solid #eee;
        font-size: 1rem;
        color: #111;
        text-align: right;
    }

    /* Styling Teks Produk */
    .prod-name { 
        font-weight: 800; 
        font-size: 1.05rem; 
        color: #000; 
        line-height: 1.2;
    }
    .prod-sku { 
        color: #c5a059; 
        font-weight: 700; 
        font-size: 0.7rem; 
        letter-spacing: 1px;
    }
    .price-text { font-weight: 800; font-size: 1.1rem; color: #1a1a1a; }

    .img-wrapper {
        width: 65px; height: 65px; overflow: hidden;
        border: 2px solid #1a1a1a; background: #000;
    }
    .img-wrapper img { width: 100%; height: 100%; object-fit: cover; }

    .btn-add {
        background: #1a1a1a; color: #ffffff; border-radius: 0;
        padding: 12px 25px; font-size: 0.8rem; font-weight: 800;
        letter-spacing: 1px; transition: 0.3s; border: none;
        text-decoration: none; text-transform: uppercase;
    }
    .btn-add:hover { background: #c5a059; color: white; }

    .btn-action {
        width: 42px; height: 42px; display: inline-flex; 
        align-items: center; justify-content: center;
        transition: 0.2s; border: 1.5px solid #1a1a1a;
        background: white; color: #1a1a1a; font-size: 1rem;
    }
    .btn-action:hover { background: #1a1a1a; color: white; }
    .btn-delete:hover { background: #d33; border-color: #d33; color: white; }

    /* Action Wrapper Rata Kanan */
    .action-container {
        display: flex;
        justify-content: flex-end;
        gap: 8px;
    }

    /* --- SWEETALERT CUSTOM CSS (NORMAL CASE & LUXURY MINI) --- */
    .mini-alert-lux { 
        border-radius: 0 !important; 
        border: 2px solid #1a1a1a !important; 
        font-family: 'Inter', sans-serif !important; 
    }
    .swal2-title.lux-title-normal { 
        font-size: 1.1rem !important; 
        font-weight: 700 !important; 
        text-transform: none !important; 
        font-family: 'Playfair Display', serif !important;
        letter-spacing: 0 !important;
        color: #000 !important;
    }
    .swal2-html-container {
        font-size: 0.85rem !important;
        text-transform: none !important;
    }
    .lux-confirm-btn { 
        background-color: #1a1a1a !important; 
        border-radius: 0 !important; 
        font-weight: 800 !important; 
        font-size: 0.75rem !important; 
        padding: 10px 20px !important; 
        text-transform: none !important; 
    }
    .lux-cancel-btn { 
        background-color: #d33 !important; 
        border-radius: 0 !important; 
        font-weight: 800 !important; 
        font-size: 0.75rem !important; 
        padding: 10px 20px !important; 
        text-transform: none !important; 
    }

    @media (max-width: 768px) {
        .custom-table thead { display: none; }
        .custom-table tr {
            display: block; margin-bottom: 15px;
            border: 2px solid #1a1a1a; padding: 10px; background: #fff;
        }
        .custom-table td {
            display: flex; justify-content: space-between; align-items: center;
            padding: 10px 5px; border: none; border-bottom: 1px dotted #ddd;
            text-align: right;
        }
        .custom-table td::before {
            content: attr(data-label); font-weight: 800;
            text-transform: uppercase; font-size: 0.65rem; color: #c5a059;
        }
    }
</style>

<div class="container-fluid py-4 px-lg-5">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-4 gap-3">
        <div class="mb-5 border-start border-4 border-dark ps-3">
            <span class="sub-title">FA.STORYBUCKET</span>
            <h1 class="page-title mb-0">Koleksi Produk</h1>
        </div>
        <div class="d-flex flex-column flex-md-row gap-3">
            <div class="search-wrapper">
                <i class="fa-solid fa-magnifying-glass search-icon"></i>
                <input type="text" id="searchInput" class="search-input" placeholder="Cari nama atau SKU...">
            </div>
            <a href="{{ route('products.create') }}" class="btn btn-add shadow-sm">
                <i class="fa-solid fa-plus me-2"></i> Tambah Produk
            </a>
        </div>
    </div>

    <div class="luxury-card">
        <div class="table-responsive">
            <table class="table custom-table" id="productTable">
                <thead>
                    <tr>
                        <th width="100" style="text-align: left;">Visual</th>
                        <th>Informasi Produk</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $p)
                    <tr class="product-row">
                        <td data-label="Visual">
                            <div class="img-wrapper">
                                <img src="{{ asset('storage/'.$p->image) }}" alt="{{ $p->name }}">
                            </div>
                        </td>
                        <td data-label="Produk">
                            <div class="d-flex flex-column align-items-end"> 
                                <span class="prod-name mb-1">{{ $p->name }}</span>
                                <span class="prod-sku">FSB-{{ str_pad($p->id, 4, '0', STR_PAD_LEFT) }}</span>
                            </div>
                        </td>
                        <td data-label="Harga">
                            <div class="price-text">Rp {{ number_format($p->price,0,',','.') }}</div>
                        </td>
                        <td data-label="Aksi">
                            <div class="action-container">
                                <a href="{{ route('products.edit',$p->id) }}" class="btn-action" title="Edit">
                                    <i class="fa-solid fa-pen-nib"></i>
                                </a>

                                <form id="delete-form-{{ $p->id }}" method="POST" action="{{ route('products.destroy',$p->id) }}" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="button" onclick="confirmDelete('{{ $p->id }}', '{{ $p->name }}')" class="btn-action btn-delete">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4 border-end border-4 border-dark pe-3 text-end"> 
        <span class="d-block fw-bold" style="font-size: 0.8rem; letter-spacing: 1px;">DATABASE TERVERIFIKASI</span>
        <small class="text-muted"><span id="productCount">{{ $products->count() }}</span> Item Terdaftar dalam Katalog FA.STORYBUCKET</small>
    </div>
</div>

<script>
    // Search Logic
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const value = this.value.toLowerCase();
        const rows = document.querySelectorAll('.product-row');
        let visibleCount = 0;

        rows.forEach(row => {
            const productName = row.querySelector('.prod-name').textContent.toLowerCase();
            const productSKU = row.querySelector('.prod-sku').textContent.toLowerCase();

            if (productName.includes(value) || productSKU.includes(value)) {
                row.style.display = "";
                visibleCount++;
            } else {
                row.style.display = "none";
            }
        });

        document.getElementById('productCount').textContent = visibleCount;
    });

    // Custom Luxury Alert (Normal Case & Mini Width)
    function confirmDelete(id, name) {
        Swal.fire({
            title: 'Hapus produk?',
            text: 'Yakin ingin menghapus ' + name + '?',
            icon: 'warning',
            iconColor: '#c5a059',
            width: '280px',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true,
            background: '#ffffff',
            customClass: { 
                popup: 'mini-alert-lux',
                title: 'lux-title-normal',
                confirmButton: 'lux-confirm-btn',
                cancelButton: 'lux-cancel-btn'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }

    // Toast Success Notification
    @if(session('success'))
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2500,
            timerProgressBar: true,
            background: '#1a1a1a',
            color: '#fff'
        });
        Toast.fire({
            icon: 'success',
            title: "{{ session('success') }}",
            iconColor: '#c5a059'
        });
    @endif
</script>
@endsection