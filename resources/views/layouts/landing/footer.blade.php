<footer id="contact" class="bg-[#1a1a1a] text-[#fdfaf9] pt-24 pb-12 px-6 rounded-t-[60px] text-center">
    <div class="max-w-4xl mx-auto">
        <h2 class="serif text-5xl md:text-7xl italic font-bold mb-4 tracking-tighter">FA.STORYBUCKET</h2>
        <p class="text-[9px] tracking-[6px] uppercase opacity-40 mb-12">Rangkaian Cerita di Setiap Kelopak</p>

        <div class="flex justify-center space-x-6 mb-16">
            <a href="https://www.instagram.com/fa.storybucket?igsh=MW90enpkMnQ2eHNsNA==" target="_blank" class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center hover:bg-[#e2a9a1] hover:border-[#e2a9a1] transition-all duration-500 group">
                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
            </a>
            <a href="https://www.tiktok.com/@fa.storybucket?_r=1&_t=ZS-92hyyLopg64" target="_blank" class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center hover:bg-[#e2a9a1] hover:border-[#e2a9a1] transition-all duration-500">
                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.036 2.612-.01 3.91-.01.08 1.53.63 3.05 1.61 4.22 1.05 1.25 2.55 2.05 4.14 2.26v3.83c-1.4-.1-2.78-.6-3.95-1.44-.3-.21-.58-.45-.84-.71-.02 2.37.03 4.74-.02 7.12-.08 2.27-.85 4.54-2.45 6.22-1.8 1.93-4.5 2.83-7.14 2.45-2.6-.33-4.93-2.15-5.96-4.58-1.12-2.58-.8-5.7 1.01-7.98 1.4-1.81 3.65-2.85 5.92-2.71v3.91c-.8-.11-1.63.07-2.3.52-.72.48-1.17 1.32-1.16 2.18.01 1.05.7 2.06 1.72 2.33 1.01.27 2.15-.09 2.82-.9.45-.55.67-1.25.66-1.96V0l.02.02z"/></svg>
            </a>
        </div>

        <div class="grid md:grid-cols-2 gap-12 mb-20">
            <div class="space-y-4">
                <p class="text-[8px] tracking-[4px] uppercase opacity-30 font-bold">Studio Kami</p>
                <button onclick="toggleMaps()" class="group">
                    <p class="serif italic text-xl md:text-2xl hover:text-[#e2a9a1] transition-all">
                        Taunan, Kec. Jaken, Pati <br>
                        Jawa Tengah 59184
                    </p>
                    <span class="text-[8px] tracking-[3px] opacity-40 uppercase border-b border-[#e2a9a1]/30 pb-1 mt-3 inline-block">Buka Maps Studio</span>
                </button>
            </div>
            <div class="space-y-4">
                <p class="text-[8px] tracking-[4px] uppercase opacity-30 font-bold">Hubungi Pelayanan</p>
                <a href="https://wa.me/{{ $setting->whatsapp }}" class="serif italic text-2xl md:text-3xl hover:text-[#e2a9a1] transition-all">
                    +62 852 4009 9322
                </a>
                <p class="text-[7px] tracking-[2px] opacity-20 uppercase">Tersedia Setiap Hari 08:00 - 20:00</p>
            </div>
        </div>

        <div class="border-t border-white/5 pt-12">
            <p class="text-[7px] tracking-[5px] opacity-20 uppercase mb-2">Hak Cipta © 2026 FA.STORYBUCKET</p>
            <p class="text-[6px] tracking-[3px] opacity-10 uppercase italic">Handcrafted Memories from Pati</p>
        </div>
    </div>
</footer>

<div id="mapsModal" class="fixed inset-0 z-[100] bg-black/90 flex items-center justify-center p-4 opacity-0 pointer-events-none transition-opacity duration-500">
    <div class="relative w-full max-w-4xl bg-white rounded-[30px] overflow-hidden shadow-2xl">
        <button onclick="toggleMaps()" class="absolute top-4 right-4 z-10 bg-black/50 text-white w-10 h-10 rounded-full flex items-center justify-center backdrop-blur-md hover:bg-black transition-colors">✕</button>
        
        <div class="aspect-video w-full">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15847.79482580509!2d111.2123741980055!3d-6.776097911856359!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e772fec82efe355%3A0xb327261d213c272d!2sSarihsa%20Makeup!5e0!3m2!1sid!2sid!4v1767275624988!5m2!1sid!2sid" 
                class="w-full h-full border-0" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        <div class="p-6 bg-white text-center">
            <h4 class="serif italic text-[#4a4238] text-xl">FA.STORYBUCKET Studio</h4>
            <p class="text-[9px] tracking-widest uppercase opacity-50 mt-1">Taunan, Tegalarum, Kec. Jaken, Kabupaten Pati</p>
            
            <a href="https://maps.app.goo.gl/SxaKxX5WyonHZUom6" 
               target="_blank" 
               class="mt-4 inline-block bg-[#4a4238] text-white text-[9px] font-bold tracking-[3px] px-8 py-3 rounded-full hover:bg-[#A67B74] transition-colors">
               NAVIGASI SEKARANG
            </a>
        </div>
    </div>
</div>
<script>
    function toggleMaps() {
        const modal = document.getElementById('mapsModal');
        if (modal.classList.contains('opacity-0')) {
            modal.classList.remove('opacity-0', 'pointer-events-none');
            document.body.style.overflow = 'hidden';
        } else {
            modal.classList.add('opacity-0', 'pointer-events-none');
            document.body.style.overflow = 'auto';
        }
    }
</script>