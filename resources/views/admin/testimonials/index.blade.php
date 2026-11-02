@extends('layouts.admin.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    /* Dasar Layout */
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

    /* Search Box Luxury */
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

    /* Card Luxury */
    .luxury-card {
        background: #ffffff;
        border: 2px solid #1a1a1a;
        border-radius: 0;
        box-shadow: 10px 10px 0px rgba(197, 160, 89, 0.2);
        overflow: hidden;
    }

    /* Styling Tabel Rata Kanan */
    .custom-table { margin-bottom: 0; width: 100%; border-collapse: collapse; }
    .custom-table thead { background: #1a1a1a; }
    .custom-table th {
        border: none;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 2px;
        color: #c5a059 !important;
        padding: 20px;
        font-weight: 800;
        text-align: right; /* Rata Kanan */
    }
    .custom-table td {
        vertical-align: middle;
        padding: 20px;
        border-bottom: 1px solid #eee;
        font-size: 0.95rem;
        color: #111;
        text-align: right; /* Rata Kanan */
    }

    /* Info Testi - Align End untuk Rata Kanan */
    .testi-name { font-weight: 800; font-size: 1.1rem; color: #000; display: block; line-height: 1.2; }
    .testi-city { color: #c5a059; font-weight: 700; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; }
    .testi-message { font-style: italic; color: #444; line-height: 1.6; max-width: 500px; margin-left: auto; }
    .date-badge { font-size: 0.75rem; font-weight: 600; color: #888; }

    /* Tombol Aksi */
    .btn-action {
        width: 42px; height: 42px; display: inline-flex; 
        align-items: center; justify-content: center;
        transition: 0.2s; border: 1.5px solid #1a1a1a;
        background: white; color: #1a1a1a; font-size: 1rem;
        cursor: pointer;
    }
    .btn-action:hover { background: #d33; border-color: #d33; color: white; }

    /* Responsif Mobile */
    @media (max-width: 768px) {
        .custom-table thead { display: none; }
        .custom-table tr {
            display: block; margin-bottom: 15px;
            border: 2px solid #1a1a1a; padding: 15px; background: #fff;
        }
        .custom-table td {
            display: flex; justify-content: space-between; align-items: center;
            padding: 10px 0; border: none; border-bottom: 1px dotted #ddd;
            text-align: right;
        }
        .custom-table td::before {
            content: attr(data-label); font-weight: 800;
            text-transform: uppercase; font-size: 0.65rem; color: #c5a059;
        }
        .testi-message { max-width: 60%; margin-left: 0; }
    }

    .mini-alert-lux { border-radius: 0 !important; border: 2px solid #1a1a1a !important; }
</style>

<div class="container-fluid py-4 px-lg-5">
    
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-4 gap-3">
     <div class="mb-5 border-start border-4 border-dark ps-3">
        <span class="sub-title">FA.STORYBUCKET</span>
        <h1 class="page-title mb-0">Testimonial Pelanggan</h1>
    </div>
        
        <div class="search-wrapper">
            <i class="fa-solid fa-magnifying-glass search-icon"></i>
            <input type="text" id="testiSearch" class="search-input" placeholder="CARI NAMA ATAU KOTA...">
        </div>
    </div>

    <div class="luxury-card">
        <div class="table-responsive">
            <table class="table custom-table" id="testiTable">
                <thead>
                    <tr>
                        <th>Pengirim</th>
                        <th>Pesan Kesan</th>
                        <th width="150">Tanggal</th>
                        <th width="100">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $testi)
                    <tr class="testi-row">
                        <td data-label="Pengirim">
                            <div class="d-flex flex-column align-items-end">
                                <span class="testi-name">{{ $testi->name }}</span>
                                <span class="testi-city">{{ $testi->city ?? 'Pelanggan Setia' }}</span>
                            </div>
                        </td>
                        <td data-label="Pesan">
                            <p class="testi-message mb-0">"{{ $testi->message }}"</p>
                        </td>
                        <td data-label="Tanggal">
                            <span class="date-badge">{{ $testi->created_at->format('d M Y') }}</span>
                        </td>
                        <td data-label="Aksi">
                            <div class="d-flex justify-content-end">
                                <form id="delete-form-{{ $testi->id }}" action="{{ route('admin.testimonials.destroy', $testi->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="button" onclick="confirmDelete('{{ $testi->id }}', '{{ $testi->name }}')" class="btn-action" title="Hapus">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="py-5 text-center">
                            <span class="serif italic opacity-30">Belum ada testimonial yang masuk...</span>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div id="noResult" class="py-5 text-center d-none">
            <i class="fa-solid fa-comment-slash d-block mb-3 opacity-20" style="font-size: 3rem;"></i>
            <span class="fw-bold opacity-50 uppercase tracking-widest">Testimonial tidak ditemukan</span>
        </div>
    </div>

    <div class="mt-4 border-end border-4 border-dark pe-3 text-end">
        <span class="d-block fw-bold" style="font-size: 0.8rem; letter-spacing: 1px;">FEEDBACK TERVERIFIKASI</span>
        <small class="text-muted"><span id="testiCount">{{ $testimonials->count() }}</span> Cerita Pelanggan di FA.STORYBUCKET</small>
    </div>
</div>

<script>
    // FITUR SEARCH REAL-TIME
    document.getElementById('testiSearch').addEventListener('keyup', function() {
        const value = this.value.toLowerCase();
        const rows = document.querySelectorAll('.testi-row');
        let visibleCount = 0;

        rows.forEach(row => {
            const name = row.querySelector('.testi-name').textContent.toLowerCase();
            const city = row.querySelector('.testi-city').textContent.toLowerCase();

            if (name.includes(value) || city.includes(value)) {
                row.style.display = "";
                visibleCount++;
            } else {
                row.style.display = "none";
            }
        });

        document.getElementById('testiCount').textContent = visibleCount;
        const noResult = document.getElementById('noResult');
        if (visibleCount === 0 && rows.length > 0) {
            noResult.classList.remove('d-none');
            document.querySelector('thead').style.display = 'none';
        } else {
            noResult.classList.add('d-none');
            if (window.innerWidth > 768) document.querySelector('thead').style.display = 'table-header-group';
        }
    });

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2500,
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

    function confirmDelete(id, name) {
        Swal.fire({
            title: 'HAPUS TESTI?',
            text: "Dari: " + name,
            icon: 'warning',
            iconColor: '#c5a059',
            width: '280px',
            showCancelButton: true,
            confirmButtonColor: '#1a1a1a',
            cancelButtonColor: '#d33',
            confirmButtonText: 'HAPUS',
            cancelButtonText: 'BATAL',
            background: '#ffffff',
            customClass: {
                popup: 'mini-alert-lux',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
@endsection