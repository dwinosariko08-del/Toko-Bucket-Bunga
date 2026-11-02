@extends('layouts.landing.app')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,600;1,400&family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
<style>
    .serif { font-family: 'Cormorant Garamond', serif; }
    .sans { font-family: 'Montserrat', sans-serif; }
    
    .product-frame {
        border-radius: 180px 180px 20px 20px;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(226, 169, 161, 0.15);
    }

    .btn-luxury {
        background: #4a4238;
        color: white;
        border-radius: 50px;
        letter-spacing: 3px;
        font-weight: 600;
        font-size: 11px;
        transition: all 0.4s;
        text-transform: uppercase;
    }

    .btn-luxury:hover {
        background: #e2a9a1;
        transform: scale(1.02);
    }

    .breadcrumb-text {
        font-size: 9px;
        letter-spacing: 3px;
        text-transform: uppercase;
        opacity: 0.5;
    }
</style>

<div class="sans min-h-screen bg-[#fdfaf9] pt-32 pb-20">
    <div class="container mx-auto px-6">
        
        <div class="mb-12 text-center md:text-left">
            <a href="{{ url('/') }}" class="breadcrumb-text hover:text-[#e2a9a1]">Beranda</a>
            <span class="mx-3 opacity-20">/</span>
            <span class="breadcrumb-text text-[#e2a9a1]">Detail Produk</span>
        </div>

        <div class="flex flex-col md:flex-row gap-12 lg:gap-20 items-center md:items-start">
            
            <div class="w-full md:w-1/2 lg:w-5/12">
                <div class="product-frame bg-white p-2">
                    <img src="{{ asset('storage/'.$product->image) }}" 
                         alt="{{ $product->name }}" 
                         class="w-full h-auto object-cover rounded-[175px_175px_15px_15px]">
                </div>
            </div>

            <div class="w-full md:w-1/2 lg:w-7/12 py-4">
                <span class="text-[10px] tracking-[5px] text-[#e2a9a1] uppercase font-bold block mb-4">Koleksi</span>
                
                <h1 class="serif text-5xl md:text-6xl italic text-[#4a4238] mb-6 leading-tight">
                    {{ $product->name }}
                </h1>
                
                <div class="h-px w-16 bg-[#e2a9a1] mb-8"></div>
                
                <div class="mb-10 text-[#4a4238] opacity-70 leading-relaxed text-sm md:text-base max-w-lg">
                    {{ $product->description }}
                </div>

                <div class="mb-12">
                    <p class="text-[10px] tracking-[3px] uppercase opacity-40 mb-2 font-bold">dengan harga</p>
                    <h2 class="serif text-4xl text-[#A67B74]">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </h2>
                </div>

                <div class="flex flex-col gap-4 max-w-sm">
                    <a target="_blank"
                       href="https://wa.me/{{ $setting->whatsapp }}?text=Halo%20FA.STORYBUCKET,%20saya%20tertarik%20dengan%20rangkaian%20{{ urlencode($product->name) }}."
                       class="btn-luxury py-5 px-8 text-center shadow-lg flex items-center justify-center gap-3">
                       <span>🌹</span> Pesan Melalui WhatsApp
                    </a>
                    <p class="text-[8px] tracking-[2px] uppercase text-center opacity-40 mt-2">
                        * Melayani pengiriman ke seluruh Indonesia
                    </p>
                    
                </div>

                <div class="mt-16 grid grid-cols-2 gap-8 border-t border-[#4a4238]/5 pt-8">
                    <div>
                        <h4 class="text-[9px] font-bold tracking-widest uppercase mb-2">Kesegaran</h4>
                        <p class="text-xs opacity-50">Bertahan 5-7 hari dengan perawatan tepat.</p>
                    </div>
                    <div>
                        <h4 class="text-[9px] font-bold tracking-widest uppercase mb-2">Pengiriman</h4>
                        <p class="text-xs opacity-50">Ambil Di Tempat / COD / Kirim Paket</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection