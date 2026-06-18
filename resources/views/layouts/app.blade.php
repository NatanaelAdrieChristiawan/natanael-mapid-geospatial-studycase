<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">

    {{-- Dynamic SEO Engine --}}
    <title>{{ $seo['title'] ?? 'Natanael Adrie Christiawan | Fullstack Developer' }}</title>
    <meta name="description" content="{{ $seo['description'] ?? 'Portfolio Profesional Natanael Adrie' }}">
    <meta name="keywords" content="{{ $seo['keywords'] ?? 'Web Developer, GIS' }}">
    <link rel="canonical" href="{{ $seo['url'] ?? url('/') }}">

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $seo['url'] ?? url('/') }}">
    <meta property="og:title" content="{{ $seo['title'] ?? 'Natanael Adrie' }}">
    <meta property="og:description" content="{{ $seo['description'] ?? 'Portfolio Profesional Natanael Adrie' }}">

    {{-- Twitter --}}
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ $seo['url'] ?? url('/') }}">
    <meta property="twitter:title" content="{{ $seo['title'] ?? 'Natanael Adrie' }}">
    <meta property="twitter:description" content="{{ $seo['description'] ?? 'Portfolio Profesional Natanael Adrie' }}">

    {{-- Prefetch other pages for instant navigation --}}
    @if(request()->routeIs('home'))
        <link rel="prefetch" href="{{ route('map') }}">
    @else
        <link rel="prefetch" href="{{ route('home') }}">
    @endif

    {{-- Fonts - preconnect for speed --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css'])

    {{-- Alpine JS via CDN --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @stack('styles')
</head>
<body class="bg-slate-950 text-slate-100 font-sans antialiased selection:bg-blue-500/30 selection:text-blue-300 overflow-x-hidden">

    {{-- Animated Background Gradient Mesh --}}
    <div class="bg-gradient-mesh"></div>

    {{-- Cursor Fluid Gradient Blob (Desktop only) --}}
    <div class="cursor-blob hidden md:block" id="cursorBlob"></div>

    {{-- Premium Glassmorphism Navbar --}}
    <nav class="sticky top-0 z-50 bg-slate-950/70 backdrop-blur-md border-b border-slate-900/80 transition-all duration-300"
         x-data="{ isOpen: false }"
         :class="{ 'shadow-lg shadow-black/20': isOpen }">
        <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">

            {{-- Logo / Branding --}}
            <a href="{{ route('home') }}" class="group flex items-center gap-2.5">
                <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-blue-600 to-indigo-500 flex items-center justify-center text-white font-extrabold text-lg shadow-lg shadow-blue-500/20 group-hover:scale-105 transition-transform duration-300">
                    N
                </div>
                <div class="flex flex-col">
                    <span class="font-bold tracking-tight text-white group-hover:text-blue-400 transition-colors">Natanael Adrie Christiawan</span>
                    <span class="text-[10px] text-slate-500 font-mono -mt-1 group-hover:text-slate-400 transition-colors">FULLSTACK & GIS</span>
                </div>
            </a>

            {{-- Desktop Navigation Menu --}}
            <div class="hidden md:flex items-center gap-8 text-[13px] font-semibold tracking-wider uppercase">
                <a href="{{ route('home') }}"
                   class="{{ request()->routeIs('home') ? 'text-blue-500' : 'text-slate-400 hover:text-white' }} tracking-wide transition-colors duration-300">
                    Overview
                </a>
                <a href="{{ route('map') }}"
                   class="{{ request()->routeIs('map') ? 'text-blue-500' : 'text-slate-400 hover:text-white' }} tracking-wide transition-colors duration-300 flex items-center gap-1.5">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                    </span>
                    Live Map GIS
                </a>
                <a href="mailto:natanaelac04@gmail.com" class="px-4 py-2 rounded-lg bg-slate-900 hover:bg-slate-800 text-white border border-slate-800 transition-all duration-300">
                    Hire Me
                </a>
            </div>

            {{-- Mobile Menu Trigger --}}
            <button @click="isOpen = !isOpen" class="md:hidden text-slate-400 hover:text-white focus:outline-none">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path x-show="!isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    <path x-show="isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" style="display: none;"/>
                </svg>
            </button>
        </div>

        {{-- Mobile Overlay Menu --}}
        <div x-show="isOpen"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="md:hidden bg-slate-950/95 border-b border-slate-900 px-6 py-6 space-y-4 shadow-xl">
            <a href="{{ route('home') }}" class="block text-slate-300 hover:text-blue-400 font-medium py-2">Overview</a>
            <a href="{{ route('map') }}" class="block text-slate-300 hover:text-blue-400 font-medium py-2">Live Map GIS</a>
            <a href="mailto:natanaelac04@gmail.com" class="block w-full text-center py-2.5 rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-semibold">Contact</a>
        </div>
    </nav>

    {{-- Main Content Space --}}
    <main class="relative z-10">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="border-t border-slate-900 py-12 bg-slate-950/40 relative z-10">
        <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-6 text-sm text-slate-500">
            <div class="flex items-center gap-3">
                <span class="font-mono text-[12px] text-slate-600">© 2026 NATANAEL ADRIE CHRISTIAWAN. ALL RIGHTS RESERVED.</span>
            </div>
            <div class="flex items-center gap-6 text-xs font-mono uppercase tracking-widest">
                <a href="https://github.com" class="hover:text-blue-400 transition-colors">GitHub</a>
                <a href="https://www.linkedin.com/in/natanael-adrie-christiawan" class="hover:text-blue-400 transition-colors">LinkedIn</a>
                <a href="{{ route('map') }}" class="hover:text-blue-400 transition-colors">Live Map GIS</a>
            </div>
        </div>
    </footer>

    {{-- ============================================
         GLOBAL SCRIPTS (Cursor + Reveal + Tilt)
         All use requestAnimationFrame for 60fps
         ============================================ --}}
    <script>
    document.addEventListener('DOMContentLoaded', () => {

        // ─── CURSOR FLUID GRADIENT BLOB (Desktop only) ───
        const blob = document.getElementById('cursorBlob');
        if (blob && window.matchMedia('(pointer: fine)').matches) {
            let blobX = 0, blobY = 0, targetX = 0, targetY = 0;

            document.addEventListener('mousemove', (e) => {
                targetX = e.clientX;
                targetY = e.clientY;
            }, { passive: true });

            function animateBlob() {
                // Smooth lerp for fluid magnetic effect
                blobX += (targetX - blobX) * 0.08;
                blobY += (targetY - blobY) * 0.08;
                blob.style.transform = `translate(${blobX - 300}px, ${blobY - 300}px)`;
                requestAnimationFrame(animateBlob);
            }
            animateBlob();
        }

        // ─── SCROLL-REVEAL with IntersectionObserver ───
        const revealEls = document.querySelectorAll('.reveal, .reveal-left, .reveal-scale');
        if (revealEls.length > 0) {
            const revealObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                        revealObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

            revealEls.forEach(el => revealObserver.observe(el));
        }

        // ─── 3D TILT EFFECT on Cards ───
        const tiltCards = document.querySelectorAll('.tilt-card');
        tiltCards.forEach(card => {
            let rafId = null;

            card.addEventListener('mousemove', (e) => {
                if (rafId) cancelAnimationFrame(rafId);
                rafId = requestAnimationFrame(() => {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;
                    const rotateX = ((y - centerY) / centerY) * -8;
                    const rotateY = ((x - centerX) / centerX) * 8;
                    card.style.transform = `perspective(800px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale3d(1.02, 1.02, 1.02)`;
                });
            }, { passive: true });

            card.addEventListener('mouseleave', () => {
                if (rafId) cancelAnimationFrame(rafId);
                card.style.transform = 'perspective(800px) rotateX(0) rotateY(0) scale3d(1, 1, 1)';
            });
        });

    });
    </script>

    @stack('scripts')
</body>
</html>
