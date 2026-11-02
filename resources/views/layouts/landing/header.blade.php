<nav class="fixed top-0 w-full z-50 glass-nav">
    <div class="flex justify-between items-center px-6 py-5 md:px-12">
        <button onclick="toggleMenu()" class="text-[9px] tracking-[4px] font-bold text-[#4a4238]">MENU</button>
        
        <div class="text-center">
            <h1 class="serif text-xl md:text-2xl font-bold tracking-[4px] text-[#A67B74]">FA.STORYBUCKET</h1>
            <p class="text-[6px] md:text-[7px] tracking-[5px] uppercase opacity-50 -mt-1">Rangkaian Cerita Terbaik</p>
        </div>
        
        <a href="https://wa.me/{{ $setting->whatsapp }}" class="text-lg hover:scale-125 transition-transform duration-300">
            <span class="relative flex h-3 w-3 inline-block -top-3 -right-3">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#e2a9a1] opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-[#e2a9a1]"></span>
            </span>
            🌸
        </a>
    </div>
</nav>

<div id="sidebar" class="fixed inset-0 z-[60] bg-[#fdfaf9] translate-x-full transition-transform duration-700 flex flex-col items-center justify-center space-y-10">
    <button onclick="toggleMenu()" class="absolute top-10 right-10 text-[10px] tracking-widest uppercase font-bold text-[#4a4238]">
        Tutup [x]
    </button>
    
    <div class="mb-6 opacity-20 text-center">
        <h2 class="serif text-sm tracking-[8px]">FA.STORYBUCKET</h2>
    </div>

    <nav class="flex flex-col items-center space-y-8">
        <a href="#home" onclick="toggleMenu()" class="serif text-4xl md:text-5xl italic font-light text-[#4a4238] hover:text-[#e2a9a1] transition-colors">Beranda</a>
        <a href="#about" onclick="toggleMenu()" class="serif text-4xl md:text-5xl italic font-light text-[#4a4238] hover:text-[#e2a9a1] transition-colors">Tentang Kami</a>
        <a href="#catalog" onclick="toggleMenu()" class="serif text-4xl md:text-5xl italic font-light text-[#4a4238] hover:text-[#e2a9a1] transition-colors">Koleksi</a>
        <a href="#gallery" onclick="toggleMenu()" class="serif text-4xl md:text-5xl italic font-light text-[#4a4238] hover:text-[#e2a9a1] transition-colors">Galeri</a>
        <a href="#testimonials" onclick="toggleMenu()" class="serif text-4xl md:text-5xl italic font-light text-[#4a4238] hover:text-[#e2a9a1] transition-colors">Testimoni</a>
    </nav>

    <div class="absolute bottom-20 text-center">
        <p class="text-[8px] tracking-[4px] uppercase opacity-40">Pati, Jawa Tengah</p>
    </div>
</div>