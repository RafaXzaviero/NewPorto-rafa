<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rafael Albion Savero | Portofolio</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Konfigurasi Tailwind -->
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: { sans: ['"Plus Jakarta Sans"', 'sans-serif'] },
                    colors: {
                        brand: { 50: '#f0f9ff', 400: '#38bdf8', 500: '#0ea5e9', 600: '#0284c7', 900: '#0f172a' },
                        accent: { 400: '#818cf8', 500: '#6366f1' }
                    },
                    animation: { 'float': 'float 6s ease-in-out infinite', 'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite' },
                    keyframes: { float: { '0%, 100%': { transform: 'translateY(0)' }, '50%': { transform: 'translateY(-20px)' } } }
                }
            }
        }
    </script>
    <style>
        body { background-color: #0f172a; color: #e2e8f0; }
        .glass-nav { background: rgba(15, 23, 42, 0.7); backdrop-filter: blur(12px); border-bottom: 1px solid rgba(255, 255, 255, 0.05); }
        .glass-card { background: rgba(30, 41, 59, 0.5); backdrop-filter: blur(8px); border: 1px solid rgba(255, 255, 255, 0.05); transition: all 0.3s ease; }
        .glass-card:hover { border-color: rgba(56, 189, 248, 0.3); transform: translateY(-5px); background: rgba(30, 41, 59, 0.8); }
        .text-gradient { background: linear-gradient(135deg, #38bdf8 0%, #818cf8 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .timeline-line::before { content: ''; position: absolute; top: 0; left: 23px; height: 100%; width: 2px; background: #334155; z-index: 0; }
        .modal { transition: opacity 0.3s ease, pointer-events 0.3s ease; }
        .modal.hidden { opacity: 0; pointer-events: none; }
        .modal.flex { opacity: 1; pointer-events: auto; }
    </style>
</head>
<body class="antialiased selection:bg-brand-500 selection:text-white">

    <!-- Navbar -->
    <nav class="fixed w-full z-50 glass-nav transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <div class="flex-shrink-0 cursor-pointer" onclick="window.scrollTo(0,0)">
                    <span class="text-2xl font-bold tracking-tighter text-white">RaV<span class="text-brand-400">.</span>Dev</span>
                </div>
                
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-6">
                        <a href="#home" class="text-slate-300 hover:text-brand-400 px-3 py-2 rounded-md text-sm font-medium transition-colors">Beranda</a>
                        <a href="#about" class="text-slate-300 hover:text-brand-400 px-3 py-2 rounded-md text-sm font-medium transition-colors">Tentang</a>
                        <a href="#organization" class="text-slate-300 hover:text-brand-400 px-3 py-2 rounded-md text-sm font-medium transition-colors">Organisasi</a>
                        <a href="#skills" class="text-slate-300 hover:text-brand-400 px-3 py-2 rounded-md text-sm font-medium transition-colors">Keahlian</a>
                        <a href="#gallery" class="text-slate-300 hover:text-brand-400 px-3 py-2 rounded-md text-sm font-medium transition-colors">Galeri</a>
                        
                        <!-- LOGIKA LOGIN AUTHENTICATION -->
                        @if (Route::has('login'))
                            @auth
                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="text-red-400 border border-red-400 hover:bg-red-400 hover:text-white px-4 py-2 rounded-full text-sm font-semibold transition-all">
                                        Logout
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="text-brand-400 border border-brand-400 hover:bg-brand-400 hover:text-white px-4 py-2 rounded-full text-sm font-semibold transition-all">
                                    Login Admin
                                </a>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="min-h-screen flex items-center justify-center pt-20 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6 text-center lg:text-left">
                    <div class="inline-block px-4 py-1.5 rounded-full border border-brand-500/30 bg-brand-500/10 backdrop-blur-sm">
                        <span class="text-brand-400 text-sm font-semibold tracking-wide uppercase">Available for Hire</span>
                    </div>
                    <h1 class="text-5xl lg:text-7xl font-extrabold text-white leading-tight">
                        Hi, I'm <br> <span class="text-gradient">Rafael Albion Savero</span>
                    </h1>
                    <p class="text-xl text-slate-400 max-w-2xl mx-auto lg:mx-0 leading-relaxed">
                        Seorang Mahasiswa pengembang web yang berfokus pada <span class="text-white font-medium">Laravel</span> & <span class="text-white font-medium">Modern Tech Stack</span>.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start pt-4">
                        <a href="#gallery" class="px-8 py-4 bg-white text-slate-900 rounded-full font-bold hover:bg-slate-200 transition-all flex items-center justify-center gap-2">
                            Lihat Galeri <i class="fas fa-arrow-right"></i>
                        </a>
                        <div class="flex gap-4 items-center justify-center">
                            <a href="https://github.com/RafaXzaviero" target="_blank" class="w-12 h-12 rounded-full border border-slate-700 flex items-center justify-center text-slate-400 hover:text-white hover:border-brand-400 hover:bg-brand-500/10 transition-all">
                                <i class="fab fa-github text-xl"></i>
                            </a>
                            <a href="https://www.linkedin.com/in/rafaelalbionsavero/" target="_blank" class="w-12 h-12 rounded-full border border-slate-700 flex items-center justify-center text-slate-400 hover:text-white hover:border-brand-400 hover:bg-brand-500/10 transition-all">
                                <i class="fab fa-linkedin-in text-xl"></i>
                            </a>
                            <a href="https://www.instagram.com/svrorafael_/" target="_blank" class="w-12 h-12 rounded-full border border-slate-700 flex items-center justify-center text-slate-400 hover:text-white hover:border-brand-400 hover:bg-brand-500/10 transition-all">
                                <i class="fab fa-instagram text-xl"></i>
                            </a>
        
                        </div>
                    </div>
                </div>
                <div class="relative hidden lg:block">
                     <div class="absolute inset-0 bg-gradient-to-tr from-brand-600 to-accent-500 rounded-full blur-[100px] opacity-20 animate-pulse-slow"></div>
                     <div class="relative z-10 glass-card rounded-2xl p-6 transform rotate-3 hover:rotate-0 transition-all duration-500 animate-float border border-slate-700/50">
                        <div class="flex items-center gap-2 mb-4 border-b border-slate-700 pb-4">
                            <div class="w-3 h-3 rounded-full bg-red-500"></div><div class="w-3 h-3 rounded-full bg-yellow-500"></div><div class="w-3 h-3 rounded-full bg-green-500"></div>
                            <div class="ml-auto text-xs text-slate-500 font-mono">Portfolio.php</div>
                        </div>
                        <div class="font-mono text-sm text-slate-300">
                             <span class="text-purple-400">class</span> <span class="text-yellow-400">Rafael</span> <span class="text-purple-400">extends</span> <span class="text-yellow-400">Developer</span> { <br>
                             &nbsp;&nbsp;<span class="text-blue-400">public</span> $skills = [<span class="text-green-400">'Microsoft Office'</span>,<span class="text-green-400">'PHP'</span>,<span class="text-green-400">'JavaScript'</span>,<span class="text-green-400">'Laravel'</span>,<span class="text-green-400">'Tailwind'</span>];
                             <br>}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-24 bg-slate-900/50 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Tentang <span class="text-brand-400">Saya</span></h2>
                <div class="w-20 h-1 bg-brand-500 mx-auto rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="order-2 md:order-1">
                     <p class="text-slate-400 leading-relaxed mb-6 text-lg">
                        Halo! Saya <strong class="text-white">Rafael Albion Savero</strong>. Saya merupakan mahasiswa Teknik Informatika Angkatan 2023 Universitas Dian Nuswantoro Ketertarikan saya pada pengembangan web dimulai ketika saya memutuskan untuk mencoba mengedit tema situs web kustom — ternyata meretas kode HTML & CSS itu sangat menyenangkan! Sejak saat itu, saya terus belajar dan mengasah keterampilan saya dalam pengembangan web.
                    </p>
                    <p class="text-slate-400 leading-relaxed mb-8 text-lg">
                        Saat ini, fokus utama saya adalah membangun produk yang mudah diakses dan inklusif serta pengalaman digital menggunakan <strong class="text-brand-400">Laravel Framework</strong>.
                    </p>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="glass-card p-4 rounded-xl text-center">
                            <h3 class="text-3xl font-bold text-white mb-1">2+</h3>
                            <p class="text-sm text-slate-400">Tahun Pengalaman</p>
                        </div>
                         <div class="glass-card p-4 rounded-xl text-center">
                            <h3 class="text-3xl font-bold text-white mb-1">10+</h3>
                            <p class="text-sm text-slate-400">Proyek Selesai</p>
                        </div>
                    </div>
                </div>
                <div class="order-1 md:order-2 flex justify-center">
                    <div class="relative w-72 h-72 md:w-96 md:h-96">
                        <div class="absolute inset-0 border-2 border-brand-500 rounded-2xl transform rotate-6 translate-x-4 translate-y-4"></div>
                        <div class="absolute inset-0 bg-slate-800 rounded-2xl overflow-hidden glass-card flex items-center justify-center">
                             <img src="storage/galleries/profile.jpg" alt="Rafael Albion Savero" class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-500">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Organization Section -->
    <section id="organization" class="py-24 relative overflow-hidden">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Pengalaman <span class="text-gradient">Organisasi</span></h2>
                <p class="text-slate-400">Perjalanan kepemimpinan dan kontribusi aktif saya</p>
            </div>

            <div class="relative timeline-line pl-8 md:pl-0">
                <!-- Item 1: 2025-2026 -->
                <div class="mb-12 relative md:grid md:grid-cols-2 md:gap-12 md:items-center">
                    <div class="hidden md:block text-right">
                        <span class="text-brand-400 font-bold text-xl">2025 - 2026</span>
                    </div>
                    <div class="absolute left-[-11px] top-1 md:left-1/2 md:-ml-3 w-6 h-6 rounded-full bg-brand-500 border-4 border-slate-900 z-10"></div>
                    <div class="pl-8 md:pl-0">
                        <div class="glass-card p-6 rounded-xl hover:border-brand-500/50 transition-colors">
                            <div class="rounded-lg overflow-hidden bg-slate-800">
                                 <img src="storage/galleries/PA.jpg" alt="Kegiatan BEM" class="w-full h-auto object-contain opacity-80 hover:opacity-100 transition-opacity">
                            </div>
                            <h3 class="text-xl font-bold text-white mt-4">Staff Ahli Divisi Minat dan Bakat</h3>
                            <p class="text-slate-300 font-medium mb-2">BEM FIK UDINUS</p>
                        </div>
                    </div>
                </div>

                <!-- Item 2: 2024-2025 -->
                <div class="mb-12 relative md:grid md:grid-cols-2 md:gap-12 md:items-center">
                    <div class="md:order-2 hidden md:block text-left">
                         <span class="text-brand-400 font-bold text-xl">2024 - 2025</span>
                    </div>
                    <div class="absolute left-[-11px] top-1 md:left-1/2 md:-ml-3 w-6 h-6 rounded-full bg-accent-500 border-4 border-slate-900 z-10"></div>
                    <div class="pl-8 md:pl-0 md:order-1 md:text-right">
                        <div class="glass-card p-6 rounded-xl hover:border-accent-500/50 transition-colors">
                            <div class="rounded-lg overflow-hidden bg-slate-800">
                                <img src="storage/galleries/PT.jpg" alt="Kegiatan BEM" class="w-full h-auto object-contain opacity-80 hover:opacity-100 transition-opacity">
                            </div>
                            <h3 class="text-xl font-bold text-white mt-4">Sekretaris Divisi Minat dan Bakat</h3>
                            <p class="text-slate-300 font-medium mb-2">BEM FIK UDINUS</p>
                        </div>
                    </div>
                </div>

                <!-- Item 3: 2023-2024 -->
                <div class="mb-12 relative md:grid md:grid-cols-2 md:gap-12 md:items-center">
                    <div class="hidden md:block text-right">
                        <span class="text-brand-400 font-bold text-xl">2023 - 2024</span>
                    </div>
                    <div class="absolute left-[-11px] top-1 md:left-1/2 md:-ml-3 w-6 h-6 rounded-full bg-brand-500 border-4 border-slate-900 z-10"></div>
                    <div class="pl-8 md:pl-0">
                        <div class="glass-card p-6 rounded-xl hover:border-brand-500/50 transition-colors">
                            <div class="rounded-lg overflow-hidden bg-slate-800">
                                <img src="storage/galleries/uFd78uDvgX0ZquyKayOcEvvyrqznNudFWrXvbwAz.jpg" alt="Kegiatan BEM" class="w-full h-auto object-contain opacity-80 hover:opacity-100 transition-opacity">
                            </div>
                            <h3 class="text-xl font-bold text-white mt-4">Anggota Aktif Divisi Minat dan Bakat</h3>
                            <p class="text-slate-300 font-medium mb-2">BEM FIK UDINUS</p>
                        </div>
                    </div>
                </div>

                <!-- Item 4: 2021-2022 -->
                <div class="relative md:grid md:grid-cols-2 md:gap-12 md:items-center">
                    <div class="md:order-2 hidden md:block text-left">
                         <span class="text-brand-400 font-bold text-xl">2021 - 2022</span>
                    </div>
                    <div class="absolute left-[-11px] top-1 md:left-1/2 md:-ml-3 w-6 h-6 rounded-full bg-accent-500 border-4 border-slate-900 z-10"></div>
                    <div class="pl-8 md:pl-0 md:order-1 md:text-right">
                        <div class="glass-card p-6 rounded-xl hover:border-accent-500/50 transition-colors">
                            <div class="rounded-lg overflow-hidden bg-slate-800">
                                <img src="storage/galleries/osis.jpg" alt="Kegiatan OSIS" class="w-full h-auto object-contain opacity-80 hover:opacity-100 transition-opacity">
                            </div>
                            <h3 class="text-xl font-bold text-white mt-4">Ketua OSIS</h3>
                            <p class="text-slate-300 font-medium mb-2">SMA Institut Indonesia Semarang</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-24 bg-slate-900/50 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Tech <span class="text-gradient">Stack</span></h2>
                <p class="text-slate-400">Teknologi yang saya gunakan untuk membangun aplikasi</p>
            </div>

            <div class="flex flex-wrap justify-center gap-6">
                <!-- Skill Items -->
                <div class="glass-card p-6 rounded-xl flex flex-col items-center justify-center gap-3 group">
                    <i class="fab fa-laravel text-4xl text-red-500 group-hover:scale-110 transition-transform"></i> <span class="font-medium text-slate-300">Laravel</span>
                </div>
                <div class="glass-card p-6 rounded-xl flex flex-col items-center justify-center gap-3 group">
                    <i class="fab fa-php text-4xl text-indigo-400 group-hover:scale-110 transition-transform"></i> <span class="font-medium text-slate-300">PHP</span>
                </div>
                <div class="glass-card p-6 rounded-xl flex flex-col items-center justify-center gap-3 group">
                    <i class="fab fa-js text-4xl text-yellow-400 group-hover:scale-110 transition-transform"></i> <span class="font-medium text-slate-300">JavaScript</span>
                </div>
                <div class="glass-card p-6 rounded-xl flex flex-col items-center justify-center gap-3 group">
                    <i class="fas fa-code text-4xl text-blue-400 group-hover:scale-110 transition-transform"></i> <span class="font-medium text-slate-300">C++</span>
                </div>
                <div class="glass-card p-6 rounded-xl flex flex-col items-center justify-center gap-3 group">
                    <i class="fas fa-database text-4xl text-blue-400 group-hover:scale-110 transition-transform"></i> <span class="font-medium text-slate-300">MySQL</span>
                </div>
                <div class="glass-card p-6 rounded-xl flex flex-col items-center justify-center gap-3 group">
                    <i class="fab fa-html5 text-4xl text-orange-500 group-hover:scale-110 transition-transform"></i> <span class="font-medium text-slate-300">HTML5</span>
                </div>
                <div class="glass-card p-6 rounded-xl flex flex-col items-center justify-center gap-3 group">
                    <i class="fab fa-css3-alt text-4xl text-blue-500 group-hover:scale-110 transition-transform"></i> <span class="font-medium text-slate-300">Tailwind</span>
                </div>
                <div class="glass-card p-6 rounded-xl flex flex-col items-center justify-center gap-3 group">
                    <i class="fab fa-microsoft text-4xl text-orange-600 group-hover:scale-110 transition-transform"></i> <span class="font-medium text-slate-300">Ms. Office</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery & Activities Section !-->
    <section id="gallery" class="py-24 bg-slate-900/50 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Galeri <span class="text-brand-400">Kegiatan</span></h2>
                <div class="w-20 h-1 bg-brand-500 mx-auto rounded-full"></div>
            </div>

            <!-- Pesan Sukses -->
            @if(session('success'))
                <div class="bg-green-500/20 border border-green-500 text-green-400 px-4 py-3 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <!-- TOMBOL TAMBAH (HANYA MUNCUL JIKA ADMIN LOGIN) -->
            @auth
                <div class="flex justify-end mb-8">
                    <button onclick="toggleModal('crud-modal')" class="bg-brand-600 hover:bg-brand-500 text-white px-6 py-3 rounded-xl shadow-lg flex items-center gap-2 transition-all transform hover:scale-105">
                        <i class="fas fa-plus"></i> Tambah Kegiatan
                    </button>
                </div>
            @endauth

            <!-- Organisasi Section -->
            <div class="mb-12">
                <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl bg-brand-500/20 flex items-center justify-center">
                            <i class="fas fa-users text-brand-400 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-white">Organisasi</h3>
                            <p class="text-slate-400 text-sm">Pengalaman kepemimpinan dan kontribusi aktif saya</p>
                        </div>
                    </div>
                    <a href="https://instagram.com/svrorafael_" target="_blank" class="inline-flex items-center gap-2 text-pink-400 hover:text-pink-300 font-medium transition-colors">
                        <i class="fab fa-instagram"></i> Lihat Kegiatan Organisasi Saya lainnya
                    </a>
                </div>
                
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @php $organisasiGalleries = $galleries->where('category', 'Organisasi') @endphp
                    @if($organisasiGalleries->count() > 0)
                        @foreach($organisasiGalleries as $gallery)
                        <div class="glass-card rounded-2xl overflow-hidden relative group">
                            <div class="aspect-video bg-slate-800">
                                <img src="{{ url('storage/' . $gallery->image_path) }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="{{ $gallery->title }}">
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent opacity-90"></div>
                            <div class="absolute bottom-0 left-0 p-5 w-full">
                                <h3 class="text-white font-bold text-lg">{{ $gallery->title }}</h3>
                                <p class="text-slate-300 text-sm mt-1 line-clamp-2">{{ $gallery->description }}</p>
                                @auth
                                <div class="mt-3 pt-3 border-t border-slate-700">
                                    <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-300 text-sm flex items-center gap-2">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                                @endauth
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="glass-card rounded-xl p-6 flex flex-col items-center justify-center text-center border-dashed border-2 border-slate-700">
                            <i class="fas fa-folder-open text-3xl text-slate-600 mb-2"></i>
                            <p class="text-slate-400 text-sm">Belum ada data organisasi.</p>
                        </div>
                    @endif
                </div>
                
            </div>

            <!-- Sertifikat Section -->
            <div class="mb-12">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-green-500/20 flex items-center justify-center">
                        <i class="fas fa-certificate text-green-400 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-white">Sertifikasi</h3>
                        <p class="text-slate-400 text-sm">Sertifikat dan pelatihan yang telah saya raih</p>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @php $sertifikatGalleries = $galleries->where('category', 'Sertifikat') @endphp
                    @if($sertifikatGalleries->count() > 0)
                        @foreach($sertifikatGalleries as $gallery)
                        <div class="glass-card rounded-2xl overflow-hidden relative group">
                            <div class="aspect-video bg-slate-800">
                                <img src="{{ url('storage/' . $gallery->image_path) }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="{{ $gallery->title }}">
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent opacity-90"></div>
                            <div class="absolute bottom-0 left-0 p-5 w-full">
                                <h3 class="text-white font-bold text-lg">{{ $gallery->title }}</h3>
                                <p class="text-slate-300 text-sm mt-1 line-clamp-2">{{ $gallery->description }}</p>
                                @auth
                                <div class="mt-3 pt-3 border-t border-slate-700">
                                    <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-300 text-sm flex items-center gap-2">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                                @endauth
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="glass-card rounded-xl p-6 flex flex-col items-center justify-center text-center border-dashed border-2 border-slate-700">
                            <i class="fas fa-certificate text-3xl text-slate-600 mb-2"></i>
                            <p class="text-slate-400 text-sm">Belum ada sertifikat.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Proyek Section -->
            <div>
                <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl bg-purple-500/20 flex items-center justify-center">
                            <i class="fas fa-code text-purple-400 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-white">Proyek</h3>
                            <p class="text-slate-400 text-sm">Proyek dan karya yang telah saya buat</p>
                        </div>
                    </div>
                    <a href="https://github.com/RafaXzaviero" target="_blank" class="inline-flex items-center gap-2 text-purple-400 hover:text-purple-300 font-medium transition-colors">
                        <i class="fab fa-github"></i> Lihat Proyek Saya lainnya
                    </a>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @php $proyekGalleries = $galleries->where('category', 'Proyek') @endphp
                    @if($proyekGalleries->count() > 0)
                        @foreach($proyekGalleries as $gallery)
                        <div class="glass-card rounded-2xl overflow-hidden relative group">
                            <div class="aspect-video bg-slate-800">
                                <img src="{{ url('storage/' . $gallery->image_path) }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="{{ $gallery->title }}">
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent opacity-90"></div>
                            <div class="absolute bottom-0 left-0 p-5 w-full">
                                <h3 class="text-white font-bold text-lg">{{ $gallery->title }}</h3>
                                <p class="text-slate-300 text-sm mt-1 line-clamp-2">{{ $gallery->description }}</p>
                                @auth
                                <div class="mt-3 pt-3 border-t border-slate-700">
                                    <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-300 text-sm flex items-center gap-2">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                                @endauth
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="glass-card rounded-xl p-6 flex flex-col items-center justify-center text-center border-dashed border-2 border-slate-700">
                            <i class="fas fa-folder-open text-3xl text-slate-600 mb-2"></i>
                            <p class="text-slate-400 text-sm">Belum ada proyek.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-950 py-8 border-t border-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="text-slate-500 text-sm">
                &copy; 2025 <span class="text-slate-300 font-medium">Rafael Albion Savero</span>. Built with Laravel & Tailwind.
            </div>
            <div class="flex space-x-6">
                <a href="https://github.com/RafaXzaviero" class="text-slate-500 hover:text-white transition-colors"><i class="fab fa-github text-xl"></i></a>
                <a href="https://www.linkedin.com/in/rafaelalbionsavero/" class="text-slate-500 hover:text-white transition-colors"><i class="fab fa-linkedin text-xl"></i></a>
                <a href="https://www.instagram.com/svrorafael_/" class="text-slate-500 hover:text-white transition-colors"><i class="fab fa-instagram text-xl"></i></a>
            </div>
        </div>
    </footer>

    <!-- FORM MODAL (UNTUK UPLOAD KE DATABASE) -->
    <div id="crud-modal" class="modal hidden fixed inset-0 z-[60] flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-slate-950/80 backdrop-blur-sm" onclick="toggleModal('crud-modal')"></div>
        
        <div class="relative bg-slate-900 border border-slate-700 rounded-2xl w-full max-w-lg shadow-2xl overflow-hidden">
            <div class="p-6 border-b border-slate-800 flex justify-between items-center">
                <h3 class="text-xl font-bold text-white">Upload Kegiatan Baru</h3>
                <button onclick="toggleModal('crud-modal')" class="text-slate-400 hover:text-white"><i class="fas fa-times"></i></button>
            </div>
            
            <!-- FORM LARAVEL ASLI -->
            <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
                @csrf 
                
                <div>
                    <label class="block text-slate-400 text-sm font-medium mb-2">Judul Kegiatan</label>
                    <input type="text" name="title" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-brand-500" placeholder="Contoh: Seminar Nasional">
                </div>
                
                <div>
                    <label class="block text-slate-400 text-sm font-medium mb-2">Kategori</label>
                    <select name="category" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-brand-500">
                        <option value="Organisasi">Organisasi</option>
                        <option value="Sertifikat">Sertifikat</option>
                        <option value="Proyek">Proyek</option>
                    </select>
                </div>
                
                <div>
                    <label class="block text-slate-400 text-sm font-medium mb-2">Upload Foto (Wajib)</label>
                    <input type="file" name="image" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2 text-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-brand-600 file:text-white hover:file:bg-brand-500">
                    <p class="text-xs text-slate-500 mt-1">Format: JPG, PNG. Max 2MB.</p>
                </div>
                
                <div>
                    <label class="block text-slate-400 text-sm font-medium mb-2">Deskripsi Singkat</label>
                    <textarea name="description" rows="3" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-brand-500"></textarea>
                </div>
                
                <div class="pt-4 flex justify-end gap-3">
                    <button type="button" onclick="toggleModal('crud-modal')" class="px-4 py-2 rounded-lg text-slate-300 hover:text-white hover:bg-slate-800 transition-colors">Batal</button>
                    <button type="submit" class="px-6 py-2 rounded-lg bg-brand-600 text-white font-semibold hover:bg-brand-500 transition-colors">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleMobileMenu() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        }
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal.classList.contains('hidden')) {
                modal.classList.remove('hidden'); modal.classList.add('flex');
            } else {
                modal.classList.add('hidden'); modal.classList.remove('flex');
            }
        }
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 20) { navbar.classList.add('shadow-lg'); } else { navbar.classList.remove('shadow-lg'); }
        });
    </script>
</body>
</html>