@extends('layouts.app')

@push('styles')
{{-- Structured Data Schema.org --}}
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "Person",
    "name": "Natanael Adrie Christiawan",
    "jobTitle": "Fullstack Web Developer & App Engineer",
    "address": {
        "@@type": "PostalAddress",
        "addressLocality": "Kartasura, Sukoharjo",
        "addressRegion": "Jawa Tengah",
        "postalCode": "57165"
    },
    "email": "natanaelac04@gmail.com",
    "url": "{{ url('/') }}",
    "alumniOf": {
        "@@type": "EducationalOrganization",
        "name": "Telkom University"
    },
    "sameAs": [
        "https://www.linkedin.com/in/natanael-adrie-christiawan",
        "https://natanael-portofolio.vercel.app/"
    ]
}
</script>
@endpush

@section('content')
<div class="relative min-h-screen" x-data="{ modalOpen: false, modalUrl: '', modalTitle: '' }">

    {{-- Hero Section --}}
    <section class="max-w-6xl mx-auto px-6 pt-24 pb-16 md:pt-36 md:pb-24">
        <div class="grid md:grid-cols-12 gap-12 items-center">

            {{-- Deskripsi Profil & Tagline --}}
            <div class="md:col-span-7 space-y-6">
                <div class="reveal inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-blue-500/10 border border-blue-500/25 text-blue-400 text-xs font-mono font-medium tracking-wide">
                    <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse"></span>
                    Tersedia untuk Magang & Kerja Praktik
                </div>
                <h1 class="reveal reveal-delay-1 text-4xl md:text-6xl font-extrabold tracking-tight text-white leading-[1.1] md:leading-none">
                    Membangun Solusi Digital Masa Depan Dengan <span class="bg-gradient-to-r from-blue-400 via-indigo-400 to-sky-400 bg-clip-text text-transparent">Presisi & Estetika</span>
                </h1>
                <p class="reveal reveal-delay-2 text-base md:text-lg text-slate-400 max-w-2xl leading-relaxed">
                    Saya <strong class="text-white">Natanael Adrie Christiawan</strong>, pengembang perangkat lunak tersertifikasi BNSP & mahasiswa S1 Informatika di Telkom University. Berbekal pengalaman membangun proyek komersial di Malaysia & Indonesia, saya merancang solusi web berskala tinggi, performa kencang, dan integrasi geospatial yang mulus.
                </p>
                <div class="reveal reveal-delay-3 flex flex-wrap gap-4 pt-4">
                    <a href="{{ route('map') }}" class="px-6 py-3.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white rounded-xl font-semibold text-sm tracking-wide shadow-xl shadow-blue-500/20 hover:shadow-blue-500/30 transform hover:-translate-y-0.5 transition-all duration-300">
                        Jelajahi Live Map GIS
                    </a>
                    <a href="#projects" class="px-6 py-3.5 bg-slate-900 hover:bg-slate-800 text-slate-300 hover:text-white border border-slate-800 rounded-xl font-semibold text-sm tracking-wide transition-all duration-300">
                        Lihat Rekam Jejak Proyek
                    </a>
                </div>
            </div>

            {{-- Kartu Profil Digital dengan Foto --}}
            <div class="md:col-span-5 flex justify-center">
                <div class="reveal-scale relative group w-full max-w-[300px]">
                    <div class="absolute inset-0 bg-gradient-to-b from-blue-500 to-indigo-600 rounded-2xl blur-xl opacity-20 group-hover:opacity-30 transition-opacity duration-500"></div>
                    <div class="relative bg-slate-900 border border-slate-800/80 rounded-2xl p-6 shadow-2xl tilt-card">
                        {{-- Profile Photo --}}
                        <div class="w-full aspect-[2/3] rounded-xl overflow-hidden mb-5 relative">
                            <img src="{{ asset('img/FotoNatanael.jpg') }}"
                                 alt="Natanael Adrie Christiawan - Fullstack Developer"
                                 class="profile-photo w-full h-full object-cover"
                                 loading="eager">
                        </div>
                        <h2 class="text-lg font-bold text-white mb-0.5">Natanael Adrie C.</h2>
                        <p class="text-xs text-slate-500 font-mono mb-4">Web & App Developer</p>

                        <div class="space-y-3 pt-3 border-t border-slate-800 text-[12px] font-mono">
                            <div class="flex justify-between">
                                <span class="text-slate-500">LOKASI:</span>
                                <span class="text-slate-300 text-right">Bandung, ID</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-500">SERTIFIKASI:</span>
                                <span class="text-blue-400">BNSP</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-500">STUDI:</span>
                                <span class="text-slate-300">Telkom University</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- Technical Skills Segment --}}
    <section class="border-y border-slate-900 bg-slate-950/20 py-20 relative">
        <div class="max-w-6xl mx-auto px-6">
            <div class="max-w-xl mb-12">
                <h2 class="reveal text-xs font-bold text-blue-500 tracking-widest uppercase font-mono mb-2">Technical Capabilities</h2>
                <h3 class="reveal reveal-delay-1 text-2xl font-extrabold text-white">Kompetensi Inti dalam Membawa Ide Menjadi Aplikasi Siap Produksi</h3>
            </div>

            <div class="grid md:grid-cols-3 gap-8">

                {{-- Backend Development --}}
                <div class="reveal reveal-delay-1 tilt-card bg-slate-900/50 border border-slate-850 p-6 rounded-2xl hover:border-slate-800 transition-all duration-300">
                    <div class="text-blue-500 font-mono text-xs font-bold uppercase mb-4">01 // Backend Suite</div>
                    <h4 class="text-lg font-bold text-white mb-3">Arsitektur & API</h4>
                    <p class="text-sm text-slate-400 mb-4">Membangun logika bisnis yang tangguh, aman, dan berkecepatan tinggi.</p>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-2.5 py-1 rounded bg-slate-950 text-slate-300 text-xs font-mono">PHP (Laravel)</span>
                        <span class="px-2.5 py-1 rounded bg-slate-950 text-slate-300 text-xs font-mono">MySQL / PostgreSQL</span>
                        <span class="px-2.5 py-1 rounded bg-slate-950 text-slate-300 text-xs font-mono">SQLite</span>
                        <span class="px-2.5 py-1 rounded bg-slate-950 text-slate-300 text-xs font-mono">REST API</span>
                    </div>
                </div>

                {{-- Interactive Frontend --}}
                <div class="reveal reveal-delay-2 tilt-card bg-slate-900/50 border border-slate-850 p-6 rounded-2xl hover:border-slate-800 transition-all duration-300">
                    <div class="text-indigo-400 font-mono text-xs font-bold uppercase mb-4">02 // Interactive Interface</div>
                    <h4 class="text-lg font-bold text-white mb-3">Antarmuka Responsif</h4>
                    <p class="text-sm text-slate-400 mb-4">Slicing antarmuka modern yang interaktif, ramah perangkat mobile, dan mulus.</p>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-2.5 py-1 rounded bg-slate-950 text-slate-300 text-xs font-mono">React.js / Next.js</span>
                        <span class="px-2.5 py-1 rounded bg-slate-950 text-slate-300 text-xs font-mono">Tailwind CSS</span>
                        <span class="px-2.5 py-1 rounded bg-slate-950 text-slate-300 text-xs font-mono">Vite / Alpine.js</span>
                        <span class="px-2.5 py-1 rounded bg-slate-950 text-slate-300 text-xs font-mono">Vue.js</span>
                    </div>
                </div>

                {{-- Mobile & AR Integration --}}
                <div class="reveal reveal-delay-3 tilt-card bg-slate-900/50 border border-slate-850 p-6 rounded-2xl hover:border-slate-800 transition-all duration-300">
                    <div class="text-sky-400 font-mono text-xs font-bold uppercase mb-4">03 // Mobile & Advanced</div>
                    <h4 class="text-lg font-bold text-white mb-3">Mobile & Spasial</h4>
                    <p class="text-sm text-slate-400 mb-4">Pengembangan aplikasi mobile multiplatform dan ekosistem visual spasial.</p>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-2.5 py-1 rounded bg-slate-950 text-slate-300 text-xs font-mono">Flutter / Dart</span>
                        <span class="px-2.5 py-1 rounded bg-slate-950 text-slate-300 text-xs font-mono">Firebase</span>
                        <span class="px-2.5 py-1 rounded bg-slate-950 text-slate-300 text-xs font-mono">Unity & Vuforia AR</span>
                        <span class="px-2.5 py-1 rounded bg-slate-950 text-slate-300 text-xs font-mono">GIS Integration</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Case Studies & Commercial Projects Section --}}
    <section id="projects" class="max-w-6xl mx-auto px-6 py-20 md:py-28">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div class="max-w-xl">
                <h2 class="reveal text-xs font-bold text-blue-500 tracking-widest uppercase font-mono mb-2">Commercial Real-world Experience</h2>
                <h3 class="reveal reveal-delay-1 text-3xl font-extrabold text-white">Portofolio Klien Internasional & Domestik Terbaik</h3>
            </div>
            <div class="reveal text-sm text-slate-500 font-mono">
                [ TOTAL PROJECT SHOWN: 6 ]
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-8">

            {{-- Proyek 1: Ataka Sarana Indonesia --}}
            <article class="reveal reveal-delay-1 tilt-card group bg-slate-900/40 border border-slate-850 p-6 rounded-2xl hover:border-slate-700/85 transition-all duration-300 flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start mb-4">
                        <span class="px-3 py-1 rounded bg-slate-950 text-xs font-mono text-indigo-400 border border-indigo-500/10">Manufacturing & Engineering</span>
                        <span class="text-xs text-slate-500 font-mono">2024</span>
                    </div>
                    <h4 class="text-xl font-bold text-white group-hover:text-blue-400 transition-colors duration-300 mb-2">Ataka Sarana Indonesia</h4>
                    <p class="text-sm text-slate-400 mb-6 leading-relaxed">Website company profile interaktif skala manufaktur dengan animasi premium interaktif. Dilengkapi sistem CMS berbasis Filament untuk kebebasan kelola konten.</p>
                </div>
                <div class="flex flex-wrap items-center justify-between gap-4 pt-4 border-t border-slate-800/60">
                    <div class="flex gap-2">
                        <span class="text-[10px] font-mono text-slate-500">Laravel</span>
                        <span class="text-[10px] font-mono text-slate-500">Filament</span>
                        <span class="text-[10px] font-mono text-slate-500">GSAP</span>
                        <span class="text-[10px] font-mono text-slate-500">Alpine.js</span>
                    </div>
                    <a href="https://atakasarana.id/" target="_blank" rel="noopener" class="text-xs font-semibold text-blue-400 hover:text-blue-300 flex items-center gap-1">
                        Live Site <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                    </a>
                </div>
            </article>

            {{-- Proyek 2: EuroPlas Malaysia --}}
            <article class="reveal reveal-delay-2 tilt-card group bg-slate-900/40 border border-slate-850 p-6 rounded-2xl hover:border-slate-700/85 transition-all duration-300 flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start mb-4">
                        <span class="px-3 py-1 rounded bg-slate-950 text-xs font-mono text-blue-400 border border-blue-500/10">Malaysia Client</span>
                        <span class="text-xs text-slate-500 font-mono">2024</span>
                    </div>
                    <h4 class="text-xl font-bold text-white group-hover:text-blue-400 transition-colors duration-300 mb-2">EuroPlas Landing Page</h4>
                    <p class="text-sm text-slate-400 mb-6 leading-relaxed">Website landing page berkecepatan tinggi untuk korporasi bahan baku plastik skala industri di Malaysia. Fokus pada desain responsif dan SEO.</p>
                </div>
                <div class="flex flex-wrap items-center justify-between gap-4 pt-4 border-t border-slate-800/60">
                    <div class="flex gap-2">
                        <span class="text-[10px] font-mono text-slate-500">React.js</span>
                        <span class="text-[10px] font-mono text-slate-500">Tailwind CSS</span>
                        <span class="text-[10px] font-mono text-slate-500">Vite</span>
                    </div>
                    <a href="https://evrplas.com/" target="_blank" rel="noopener" class="text-xs font-semibold text-blue-400 hover:text-blue-300 flex items-center gap-1">
                        Live Site <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                    </a>
                </div>
            </article>

            {{-- Proyek 3: MariRenov Premium Service --}}
            <article class="reveal reveal-delay-3 tilt-card group bg-slate-900/40 border border-slate-850 p-6 rounded-2xl hover:border-slate-700/85 transition-all duration-300 flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start mb-4">
                        <span class="px-3 py-1 rounded bg-slate-950 text-xs font-mono text-indigo-400 border border-indigo-500/10">Construction & Interior</span>
                        <span class="text-xs text-slate-500 font-mono">2024</span>
                    </div>
                    <h4 class="text-xl font-bold text-white group-hover:text-blue-400 transition-colors duration-300 mb-2">MariRenov Indonesia</h4>
                    <p class="text-sm text-slate-400 mb-6 leading-relaxed">Pengembangan platform pemasaran jasa konstruksi dan renovasi rumah premium. Memiliki struktur interaktif yang berorientasi pada peningkatan konversi.</p>
                </div>
                <div class="flex flex-wrap items-center justify-between gap-4 pt-4 border-t border-slate-800/60">
                    <div class="flex gap-2">
                        <span class="text-[10px] font-mono text-slate-500">React.js</span>
                        <span class="text-[10px] font-mono text-slate-500">Tailwind CSS</span>
                        <span class="text-[10px] font-mono text-slate-500">Vite</span>
                    </div>
                    <a href="https://www.marirenov.com/" target="_blank" rel="noopener" class="text-xs font-semibold text-blue-400 hover:text-blue-300 flex items-center gap-1">
                        Live Site <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                    </a>
                </div>
            </article>

            {{-- Proyek 4: Serval Pest Management --}}
            <article class="reveal reveal-delay-4 tilt-card group bg-slate-900/40 border border-slate-850 p-6 rounded-2xl hover:border-slate-700/85 transition-all duration-300 flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start mb-4">
                        <span class="px-3 py-1 rounded bg-slate-950 text-xs font-mono text-sky-400 border border-sky-500/10">Malaysia Enterprise</span>
                        <span class="text-xs text-slate-500 font-mono">2024</span>
                    </div>
                    <h4 class="text-xl font-bold text-white group-hover:text-blue-400 transition-colors duration-300 mb-2">Serval Pest Management</h4>
                    <p class="text-sm text-slate-400 mb-6 leading-relaxed">Antarmuka landing page berkecepatan tinggi yang dirancang khusus untuk korporasi penyedia layanan penanggulangan hama di Malaysia.</p>
                </div>
                <div class="flex flex-wrap items-center justify-between gap-4 pt-4 border-t border-slate-800/60">
                    <div class="flex gap-2">
                        <span class="text-[10px] font-mono text-slate-500">React.js</span>
                        <span class="text-[10px] font-mono text-slate-500">Tailwind CSS</span>
                        <span class="text-[10px] font-mono text-slate-500">Vite</span>
                    </div>
                    <a href="https://servalpestmanagement.com" target="_blank" rel="noopener" class="text-xs font-semibold text-blue-400 hover:text-blue-300 flex items-center gap-1">
                        Live Site <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                    </a>
                </div>
            </article>

            {{-- Proyek 5: Ataka Technology Indonesia --}}
            <article class="reveal reveal-delay-5 tilt-card group bg-slate-900/40 border border-slate-850 p-6 rounded-2xl hover:border-slate-700/85 transition-all duration-300 flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start mb-4">
                        <span class="px-3 py-1 rounded bg-slate-950 text-xs font-mono text-blue-400 border border-blue-500/10">IT Enterprise</span>
                        <span class="text-xs text-slate-500 font-mono">2024</span>
                    </div>
                    <h4 class="text-xl font-bold text-white group-hover:text-blue-400 transition-colors duration-300 mb-2">Ataka Technology Indonesia</h4>
                    <p class="text-sm text-slate-400 mb-6 leading-relaxed">Company profile modern dengan interaksi konten yang andal. Pengelolaan berkas dan dokumentasi terintegrasi aman menggunakan Filament.</p>
                </div>
                <div class="flex flex-wrap items-center justify-between gap-4 pt-4 border-t border-slate-800/60">
                    <div class="flex gap-2">
                        <span class="text-[10px] font-mono text-slate-500">Laravel</span>
                        <span class="text-[10px] font-mono text-slate-500">Filament</span>
                        <span class="text-[10px] font-mono text-slate-500">Tailwind CSS</span>
                    </div>
                    <a href="https://ataka.co.id/" target="_blank" rel="noopener" class="text-xs font-semibold text-blue-400 hover:text-blue-300 flex items-center gap-1">
                        Live Site <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                    </a>
                </div>
            </article>

            {{-- Proyek 6: UGM Assets Management System (PKL) --}}
            <article class="reveal reveal-delay-6 tilt-card group bg-slate-900/40 border border-slate-850 p-6 rounded-2xl hover:border-slate-700/85 transition-all duration-300 flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start mb-4">
                        <span class="px-3 py-1 rounded bg-slate-950 text-xs font-mono text-emerald-400 border border-emerald-500/10">Academic & Institutional</span>
                        <span class="text-xs text-slate-500 font-mono">2023 (6 Bulan)</span>
                    </div>
                    <h4 class="text-xl font-bold text-white group-hover:text-blue-400 transition-colors duration-300 mb-2">UGM Asset Management System</h4>
                    <p class="text-sm text-slate-400 mb-6 leading-relaxed">Pengalaman Praktek Kerja Lapangan (PKL) di Sekolah Vokasi UGM dalam mengoptimalkan antarmuka dan struktur backend sistem administrasi internal kampus.</p>
                </div>
                <div class="flex flex-wrap items-center justify-between gap-4 pt-4 border-t border-slate-800/60">
                    <div class="flex gap-2">
                        <span class="text-[10px] font-mono text-slate-500">Laravel</span>
                        <span class="text-[10px] font-mono text-slate-500">Web Component</span>
                        <span class="text-[10px] font-mono text-slate-500">MySQL</span>
                    </div>
                    <span class="text-xs font-semibold text-slate-500 flex items-center gap-1">
                        UGM Internal Project
                    </span>
                </div>
            </article>

        </div>
    </section>

    {{-- Certifications Section (Full Width - Sports section removed) --}}
    <section class="bg-slate-900/30 border-t border-slate-900 py-20">
        <div class="max-w-6xl mx-auto px-6">
            <div class="max-w-xl mb-10">
                <h2 class="reveal text-xs font-bold text-blue-500 tracking-widest uppercase font-mono mb-2">Certification</h2>
                <h3 class="reveal reveal-delay-1 text-2xl font-extrabold text-white">Sertifikasi Kompetensi Resmi</h3>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                {{-- Junior Web Developer --}}
                <div class="reveal reveal-delay-1 tilt-card p-5 bg-slate-900/50 border border-slate-850 rounded-xl hover:border-slate-800 transition-all duration-300 flex flex-col justify-between">
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="text-sm font-bold text-white mb-1">Junior Web Developer</h4>
                            <p class="text-xs text-slate-500 font-mono">Dikeluarkan oleh: Badan Nasional Sertifikasi Profesi (BNSP)</p>
                        </div>
                        <span class="text-[10px] font-mono bg-blue-500/10 text-blue-400 px-2.5 py-1 rounded flex-shrink-0 ml-4">AKTIF S/D 2027</span>
                    </div>
                    <div class="mt-5 pt-4 border-t border-slate-800/60 flex justify-end">
                        <button @click="modalUrl = '{{ asset('img/certificate/Sertifikat BNSP Siswa_SMKN  2 Surakarta_Natanael.pdf') }}'; modalTitle = 'Sertifikat Junior Web Developer - BNSP'; modalOpen = true"
                                class="px-3.5 py-2 bg-blue-600/10 hover:bg-blue-600/20 text-blue-400 border border-blue-500/20 hover:border-blue-500/30 text-[11px] font-bold rounded-lg transition-all flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            Lihat Sertifikat
                        </button>
                    </div>
                </div>

                {{-- Asisten Pemrogram Junior --}}
                <div class="reveal reveal-delay-2 tilt-card p-5 bg-slate-900/50 border border-slate-850 rounded-xl hover:border-slate-800 transition-all duration-300 flex flex-col justify-between">
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="text-sm font-bold text-white mb-1">Asisten Pemrogram Junior</h4>
                            <p class="text-xs text-slate-500 font-mono">Lembaga Sertifikasi: PT. Abad Jaya Senantiasa</p>
                        </div>
                        <span class="text-[10px] font-mono bg-emerald-500/10 text-emerald-400 px-2.5 py-1 rounded flex-shrink-0 ml-4">Rata-rata: 90</span>
                    </div>
                    <div class="mt-5 pt-4 border-t border-slate-800/60 flex justify-end">
                        <button @click="modalUrl = '{{ asset('img/certificate/Sertifikat_Industri_NatanaelAC.pdf') }}'; modalTitle = 'Sertifikat Asisten Pemrogram Junior'; modalOpen = true"
                                class="px-3.5 py-2 bg-emerald-600/10 hover:bg-emerald-600/20 text-emerald-400 border border-emerald-500/20 hover:border-emerald-500/30 text-[11px] font-bold rounded-lg transition-all flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            Lihat Sertifikat
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Modal Pop-up Sertifikat --}}
    <div x-show="modalOpen" 
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @keydown.escape.window="modalOpen = false"
         style="display: none;">
         
        <div class="relative w-full max-w-4xl bg-slate-900 border border-slate-800 rounded-2xl shadow-2xl overflow-hidden flex flex-col h-[85vh]"
             @click.away="modalOpen = false"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="scale-95 translate-y-4"
             x-transition:enter-end="scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="scale-100 translate-y-0"
             x-transition:leave-end="scale-95 translate-y-4">
             
            {{-- Modal Header --}}
            <div class="px-6 py-4 border-b border-slate-800 flex items-center justify-between bg-slate-950/80">
                <h3 class="text-sm font-bold text-white font-mono uppercase tracking-wider" x-text="modalTitle"></h3>
                <button @click="modalOpen = false" class="text-slate-400 hover:text-white transition-colors p-1.5 rounded-lg hover:bg-slate-800">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            {{-- Modal Body (PDF Viewer) --}}
            <div class="flex-1 bg-slate-950 p-2 relative">
                <template x-if="modalUrl">
                    <iframe :src="modalUrl" class="w-full h-full border-0 rounded-xl" type="application/pdf"></iframe>
                </template>
            </div>
            
            {{-- Modal Footer --}}
            <div class="px-6 py-3 border-t border-slate-800 bg-slate-950/80 flex justify-end">
                <button @click="modalOpen = false" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white text-xs font-semibold rounded-lg transition-colors">
                    Tutup
                </button>
            </div>
        </div>
    </div>

</div>
@endsection
