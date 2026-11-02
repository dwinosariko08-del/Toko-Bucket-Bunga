@extends('layouts.landing.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

<style>
    /* Global Styles */
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    
    /* Swiper Gallery Styling */
    .gallerySwiper { padding: 20px 0 60px 0 !important; }
    .gallery-slide {
        width: 280px; 
        height: 380px;
        transition: all 0.5s ease;
    }
    @media (min-width: 768px) {
        .gallery-slide { width: 320px; height: 450px; }
    }
    .swiper-slide-active { transform: scale(1.05); z-index: 10; }

    /* Frame Foto Gallery */
    .gallery-frame-container {
        width: 100%; height: 100%;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        cursor: zoom-in;
    }

    /* Fancybox Custom Style */
    .fancybox__backdrop { background: rgba(26, 26, 26, 0.95) !important; }


    
</style>

@php
    $hero = \App\Models\Hero::first(); // Ambil hero image dari database
@endphp

<section id="home" class="min-h-screen pt-44 pb-20 px-8 flex flex-col items-center justify-center text-center relative overflow-hidden">
    <div class="absolute top-40 left-[-50px] w-32 h-32 bg-[#fceae8] rounded-full filter blur-3xl opacity-60 animate-pulse"></div>
    <div class="absolute bottom-40 right-[-50px] w-40 h-40 bg-[#e2a9a1] rounded-full filter blur-3xl opacity-30 animate-pulse"></div>

    <div class="mb-14 relative inline-block">
        <div class="hero-frame mx-auto">
            <img src="{{ asset('storage/'.$hero->image) }}" class="w-full h-full object-cover animate-ken-burns" alt="Buket bunga segar">
        </div>
        
        <div class="absolute -bottom-8 -right-4 bg-white px-8 py-6 rounded-2xl shadow-2xl border border-[#fceae8] transform rotate-3">
            <span class="gold-gradient text-[10px] tracking-[4px] uppercase font-bold block">
                Best Seller
            </span>
            <span class="serif italic text-xl">
                FA.STORYBUCKET
            </span>
        </div>
    </div>

    <div class="max-w-2xl">
        <h2 class="serif text-5xl md:text-7xl italic leading-tight mb-8 text-[#4a4238]">
            Rangkaian <span class="text-[#e2a9a1]">Cerita</span> <br>dalam Bucket
        </h2>
        <p class="text-[10px] tracking-[6px] uppercase opacity-50 mb-12 leading-loose">Maksimal Pemesanan H-8 Bisa Pesan Dadakan Dengan Catatan Jika Bahan Tersedia</p>
        <a href="#catalog" class="btn-order px-10 py-5 inline-block">JELAJAHI KOLEKSI</a>
    </div>
</section>

<section id="about" class="py-24 bg-white mx-6 rounded-[50px] px-10 text-center border border-[#fceae8] shadow-sm">
    <span class="text-[9px] tracking-[5px] uppercase opacity-40 block mb-6">      {{ $about->section_title }}</span>
    <h3 class="serif text-4xl italic mb-12"> {{ $about->headline }}</h3>
    <div class="grid md:grid-cols-3 gap-12">
        <div class="space-y-4">
            <div class="text-2xl text-[#e2a9a1]">01</div>
            <h4 class="text-[11px] font-bold tracking-widest uppercase"> {{ $about->item1_title }}</h4>
            <p class="text-xs leading-loose opacity-60">{{ $about->item1_desc }}</p>
        </div>
        <div class="space-y-4">
            <div class="text-2xl text-[#e2a9a1]">02</div>
            <h4 class="text-[11px] font-bold tracking-widest uppercase">{{ $about->item2_title }}</h4>
            <p class="text-xs leading-loose opacity-60">{{ $about->item2_desc }}</p>
        </div>
        <div class="space-y-4">
            <div class="text-2xl text-[#e2a9a1]">03</div>
            <h4 class="text-[11px] font-bold tracking-widest uppercase">{{ $about->item3_title }}</h4>
            <p class="text-xs leading-loose opacity-60">{{ $about->item3_desc }}</p>
        </div>
    </div>
</section>

<section id="catalog" class="py-20 px-4 md:px-12 bg-white">
    <div class="text-center mb-12">
        <span class="text-[8px] tracking-[5px] uppercase opacity-40 block mb-2">Pilihan Terbaik</span>
        <h3 class="serif text-4xl italic text-[#4a4238]">Katalog FA.STORYBUCKET</h3>
        <div class="h-[1px] w-12 bg-[#e2a9a1] mx-auto mt-4"></div>
    </div>

    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-10 max-w-7xl mx-auto">
        @forelse ($products as $product)
            <div class="group flex flex-col h-full">
                <div class="relative aspect-[3/4] overflow-hidden rounded-2xl bg-[#fdfaf9] shadow-sm">
                    <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}"
                         class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                    <div class="absolute top-3 left-3">
                        <span class="bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-[8px] font-bold tracking-widest text-[#4a4238] shadow-sm">NEW</span>
                    </div>
                </div>
                <div class="mt-4 flex-grow flex flex-col items-center">
                    <h4 class="uppercase text-[9px] font-bold tracking-[2px] text-[#4a4238] mb-1 text-center truncate w-full px-2">
                        {{ $product->name }}
                    </h4>
                    <p class="serif italic text-sm text-[#e2a9a1] mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <div class="flex flex-col w-full gap-2 mt-auto px-1">
                        <a href="{{ url('/product/'.$product->id) }}" class="text-[8px] tracking-[2px] font-bold uppercase py-3 border border-[#4a4238]/20 rounded-full text-[#4a4238] hover:bg-[#4a4238] hover:text-white transition-all text-center">Detail</a>
                        <a href="https://wa.me/{{ $setting->whatsapp }}?text=Halo%20FA.STORYBUCKET,%20saya%20ingin%20memesan%20rangkaian%20{{ urlencode($product->name) }}"
                           target="_blank" class="text-[8px] tracking-[2px] font-bold uppercase py-3 bg-[#4a4238] rounded-full text-white hover:bg-[#e2a9a1] transition-all text-center shadow-md">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-20 text-center"><p class="serif italic text-lg opacity-30 tracking-widest">Koleksi sedang diperbarui...</p></div>
        @endforelse
    </div>
</section>

<section id="gallery" class="py-24 bg-[#fdf2f2]/40 overflow-hidden">
    <div class="text-center mb-16 px-6">
        <span class="text-[10px] tracking-[6px] uppercase opacity-40">Pic Set From</span>
        <h3 class="serif text-4xl italic mt-2 text-[#4a4238]">FA.STORYBUCKET</h3>
    </div>

    <div class="swiper gallerySwiper px-6">
        <div class="swiper-wrapper">
            @foreach($galleries as $gallery)
                <div class="swiper-slide gallery-slide">
                    <a href="{{ asset('storage/'.$gallery->image) }}" 
                       data-fancybox="gallery" 
                       data-caption="{{ $gallery->caption ?? 'FA.STORYBUCKET Collection' }}"
                       class="gallery-frame-container block">
                        <img src="{{ asset('storage/'.$gallery->image) }}" 
                             alt="{{ $gallery->caption }}"
                             class="w-full h-full object-cover transition-all duration-700 hover:brightness-90">
                    </a>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination !static mt-10"></div>
    </div>
</section>

<section id="testimonials" class="py-24 bg-white overflow-hidden">
    <div class="text-center mb-16 px-6">
        <span class="text-[10px] tracking-[6px] uppercase opacity-40">Apa Kata Mereka</span>
        <h3 class="serif text-4xl italic mt-2 text-[#4a4238]">Kesan Mendalam</h3>
    </div>

    <div class="flex overflow-x-auto gap-8 px-6 pb-12 snap-x no-scrollbar max-w-7xl mx-auto md:grid md:grid-cols-3 md:overflow-visible">
        @foreach($testimonials as $testi)
            <div class="min-w-[85%] md:min-w-0 snap-center bg-[#fdfaf9] p-10 rounded-[40px] border border-[#fceae8] flex flex-col items-center text-center transition-all hover:shadow-xl">
                <div class="text-[#e2a9a1] text-3xl mb-6">“</div>
                <p class="serif italic text-lg text-[#4a4238] leading-relaxed mb-8 flex-grow">{{ $testi->message }}</p>
                <div class="h-px w-10 bg-[#e2a9a1] mb-6"></div>
                <h4 class="text-[10px] font-bold tracking-[3px] uppercase text-[#4a4238]">{{ $testi->name }}</h4>
                <p class="text-[8px] tracking-[2px] uppercase opacity-40 mt-1">{{ $testi->city ?? 'Pelanggan Setia' }}</p>
            </div>
        @endforeach
    </div>

    <div class="max-w-2xl mx-auto px-6 mt-20">
        <div class="bg-[#fdfaf9] rounded-[50px] p-8 md:p-12 border border-[#fceae8] shadow-sm">
            <div class="text-center mb-10">
                <h4 class="serif text-2xl italic text-[#4a4238]">Bagikan Pengalaman Anda</h4>
                <p class="text-[9px] tracking-[3px] uppercase opacity-50 mt-2">Biarkan dunia tahu cerita Anda bersama FA.STORYBUCKET</p>
            </div>
            <form action="{{ route('testimonial.store') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <input type="text" name="name" required placeholder="Nama Lengkap" class="w-full bg-white border border-[#fceae8] rounded-full px-6 py-4 text-xs focus:outline-none focus:border-[#e2a9a1]">
                    <input type="text" name="city" placeholder="Asal Kota" class="w-full bg-white border border-[#fceae8] rounded-full px-6 py-4 text-xs focus:outline-none focus:border-[#e2a9a1]">
                </div>
                <textarea name="message" required rows="4" placeholder="Ceritakan kesan Anda..." class="w-full bg-white border border-[#fceae8] rounded-[30px] px-6 py-5 text-xs focus:outline-none focus:border-[#e2a9a1] resize-none"></textarea>
                <div class="text-center"><button type="submit" class="btn-order px-12 py-5 shadow-lg">KIRIM TESTIMONI</button></div>
            </form>
        </div>
    </div>
</section>

<div class="fixed bottom-8 right-8 z-[100] flex items-center">
    <div class="bg-white text-black px-4 py-2 rounded-lg shadow-xl border border-[#e2a9a1] mr-3 mb-1 animate-bounce d-none d-md-block" 
         style="font-size: 0.85rem; font-weight: 700; letter-spacing: 0.5px;">
        Butuh Bantuan?
        <div class="absolute right-[-6px] top-1/2 -translate-y-1/2 w-3 h-3 bg-white border-r border-b border-[#e2a9a1] rotate-[-45deg]"></div>
    </div>

    <a href="https://wa.me/{{ $setting->whatsapp }}?text=Halo%20FA.STORYBUCKET%21%20Saya%20ingin%20menanyakan%20koleksi%20bouquet%20bunga%20dan%20stok%20terbaru%20hari%20ini.%20Bisa%20dibantu%3F"
       class="bg-[#25D366] text-white w-16 h-16 rounded-full flex items-center justify-center shadow-2xl hover:scale-110 hover:bg-[#20ba5a] transition-all border-4 border-white"
       target="_blank"
       title="Hubungi Kami di WhatsApp">

        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" viewBox="0 0 16 16">
            <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.06 3.973L0 16l4.104-1.076a7.864 7.864 0 0 0 3.888 1.029h.003c4.369 0 7.926-3.559 7.93-7.93a7.856 7.856 0 0 0-2.325-5.697zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
        </svg>
    </a>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
    // Init Pop-up Fancybox
    Fancybox.bind("[data-fancybox]", {
        Carousel: { transition: "fade" },
        Images: { zoom: true },
    });

    // Init Slider Swiper
    var swiper = new Swiper(".gallerySwiper", {
        slidesPerView: "auto",
        centeredSlides: true,
        spaceBetween: 25,
        loop: true,
        autoplay: { delay: 3500, disableOnInteraction: false },
        pagination: { el: ".swiper-pagination", clickable: true },
    });

    function toggleMenu() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('translate-x-full');
        document.body.style.overflow = sidebar.classList.contains('translate-x-full') ? 'auto' : 'hidden';
    }
</script>
@endsection
