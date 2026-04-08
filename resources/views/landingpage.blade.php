<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simagang - Landing Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        html {
            scroll-behavior: smooth;
        }
        body {
            font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }
        .hero-glow {
            background: radial-gradient(circle at top left, rgba(56, 189, 248, 0.25), transparent 35%),
                        radial-gradient(circle at bottom right, rgba(59, 130, 246, 0.2), transparent 30%);
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-900">
    <div class="min-h-screen">
        <header class="sticky top-0 z-50 bg-white/90 backdrop-blur-xl border-b border-slate-200 shadow-sm">
            <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-8">
                <a href="#hero" class="flex items-center gap-3 text-slate-900">
                    <img src="{{ url('storage/vendor/logo_komdigi.png') }}" alt="Komdigi" class="h-12 w-12 rounded-full border border-slate-200 bg-slate-100 p-1" />
                    <div class="leading-none">
                        <h1 class="text-xl font-extrabold tracking-tight font-etna text-slate-900">
                            <span class="text-sky-600">SI</span><span class="text-slate-900">MA</span><span class="text-sky-500">GA</span><span class="text-cyan-500">NG</span>
                        </h1>
                        <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Sistem Manajemen Magang</p>
                    </div>
                </a>

                <nav class="hidden items-center gap-6 text-sm font-medium text-slate-600 lg:flex">
                    <a href="#hero" class="rounded-full px-3 py-2 transition hover:bg-slate-100 hover:text-slate-900">Beranda</a>
                    <a href="#process" class="rounded-full px-3 py-2 transition hover:bg-slate-100 hover:text-slate-900">Proses</a>
                    <a href="#usage" class="rounded-full px-3 py-2 transition hover:bg-slate-100 hover:text-slate-900">Penggunaan</a>
                    <a href="#testimonials" class="rounded-full px-3 py-2 transition hover:bg-slate-100 hover:text-slate-900">Testimoni</a>
                    <a href="#partners" class="rounded-full px-3 py-2 transition hover:bg-slate-100 hover:text-slate-900">Partner</a>
                </nav>

                <div class="flex items-center gap-3">
                    <a href="{{ route('login') }}" class="inline-flex items-center rounded-full bg-sky-600 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-sky-500/20 transition hover:bg-sky-500">Login</a>
                </div>
            </div>
        </header>

        <main>
            <section id="hero" class="hero-glow relative overflow-hidden bg-gradient-to-b from-sky-100 via-slate-100 to-white py-24 sm:py-32">
                <div class="absolute inset-x-0 top-0 h-48 bg-gradient-to-b from-sky-200/70 to-transparent"></div>
                <div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
                    <div class="flex flex-col justify-center gap-8">
                        <div class="inline-flex items-center rounded-full bg-slate-100 px-4 py-2 text-sm font-semibold text-sky-700 shadow-sm shadow-sky-200/70">
                            <span class="mr-2 inline-flex h-2.5 w-2.5 rounded-full bg-sky-500"></span>
                            Sistem manajemen magang mudah dan modern
                        </div>
                        <div class="space-y-6">
                            <h2 class="text-4xl font-extrabold tracking-tight text-slate-950 sm:text-5xl">Kelola Magang dengan Cepat, Aman, dan Terstruktur</h2>
                            <p class="max-w-2xl text-lg leading-8 text-slate-600">Simagang membantu siswa, mentor, dan admin bekerja bersama dalam satu platform terintegrasi untuk absensi, logbook, laporan, dan penilaian magang.</p>
                        </div>
                        <div class="flex flex-wrap gap-4">
                            <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-full bg-sky-600 px-6 py-3 text-base font-semibold text-white shadow-lg shadow-sky-500/20 transition hover:bg-sky-500">Mulai Sekarang</a>
                            <a href="#process" class="inline-flex items-center justify-center rounded-full border border-slate-300 bg-white px-6 py-3 text-base font-semibold text-slate-700 transition hover:bg-slate-100">Lihat Alur</a>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="relative overflow-hidden rounded-[2rem] border border-slate-200 bg-white/90 p-6 shadow-2xl shadow-slate-300/10 backdrop-blur-xl">
                            <div class="absolute -left-10 top-10 h-24 w-24 rounded-full bg-sky-200/80 blur-3xl"></div>
                            <div class="absolute -right-10 bottom-10 h-24 w-24 rounded-full bg-slate-200/80 blur-3xl"></div>
                            <div class="relative space-y-6">
                                <div class="rounded-[1.75rem] border border-slate-200 bg-slate-50 p-6 shadow-inner shadow-slate-200/60">
                                    <div class="flex items-center justify-between text-slate-600">
                                        <div class="flex items-center gap-3">
                                            <span class="inline-flex h-10 w-10 items-center justify-center rounded-3xl bg-sky-500 text-white"><i class="fas fa-user-graduate"></i></span>
                                            <div>
                                                <p class="text-sm font-semibold text-slate-900">Intern</p>
                                                <p class="text-xs text-slate-500">Kirim logbook dan absensi</p>
                                            </div>
                                        </div>
                                        <span class="text-sm font-semibold text-sky-600">Aktif</span>
                                    </div>
                                    <div class="mt-6 space-y-3">
                                        <div class="h-3 rounded-full bg-slate-200"></div>
                                        <div class="h-3 rounded-full bg-slate-200 w-5/6"></div>
                                        <div class="h-3 rounded-full bg-slate-200 w-4/6"></div>
                                    </div>
                                </div>
                                <div class="grid gap-4 sm:grid-cols-2">
                                    <div class="rounded-[1.75rem] border border-slate-200 bg-slate-50 p-5 shadow-sm">
                                        <p class="text-sm text-slate-500">Absensi</p>
                                        <p class="mt-3 text-2xl font-semibold text-slate-900">Harian</p>
                                    </div>
                                    <div class="rounded-[1.75rem] border border-slate-200 bg-slate-50 p-5 shadow-sm">
                                        <p class="text-sm text-slate-500">Laporan</p>
                                        <p class="mt-3 text-2xl font-semibold text-slate-900">Review</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="process" class="bg-white py-20">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="mx-auto mb-14 max-w-2xl text-center">
                        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-sky-600">Proses Alur Magang</p>
                        <h2 class="mt-4 text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">Langkah sederhana untuk setiap pengguna</h2>
                        <p class="mt-4 text-lg leading-8 text-slate-600">Mulai dari pendaftaran hingga sertifikat, semua proses dipandu dengan tampilan yang mudah dipahami.</p>
                    </div>
                    <div class="grid gap-6 md:grid-cols-3">
                        <div class="rounded-[2rem] border border-slate-200 bg-sky-50 p-8 shadow-sm">
                            <div class="inline-flex h-14 w-14 items-center justify-center rounded-3xl bg-sky-600 text-white"><i class="fas fa-user-plus text-xl"></i></div>
                            <h3 class="mt-6 text-xl font-semibold text-slate-900">Daftar & Profil</h3>
                            <p class="mt-3 text-slate-600">Isi data peserta dan pilih institusi dengan cepat.</p>
                        </div>
                        <div class="rounded-[2rem] border border-slate-200 bg-sky-50 p-8 shadow-sm">
                            <div class="inline-flex h-14 w-14 items-center justify-center rounded-3xl bg-sky-600 text-white"><i class="fas fa-calendar-check text-xl"></i></div>
                            <h3 class="mt-6 text-xl font-semibold text-slate-900">Absensi & Logbook</h3>
                            <p class="mt-3 text-slate-600">Catat kehadiran dan aktivitas magang setiap hari.</p>
                        </div>
                        <div class="rounded-[2rem] border border-slate-200 bg-sky-50 p-8 shadow-sm">
                            <div class="inline-flex h-14 w-14 items-center justify-center rounded-3xl bg-sky-600 text-white"><i class="fas fa-award text-xl"></i></div>
                            <h3 class="mt-6 text-xl font-semibold text-slate-900">Laporan & Sertifikat</h3>
                            <p class="mt-3 text-slate-600">Review laporan akhir dan terbitkan sertifikat digital.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="usage" class="bg-slate-50 py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <!-- HEADER -->
            <div class="mx-auto mb-16 max-w-2xl text-center">
                <p class="text-sm font-semibold uppercase tracking-[0.3em] text-sky-600">Penggunaan</p>
                <h2 class="mt-4 text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">
                    Tutorial Penggunaan Aplikasi
                </h2>
                <p class="mt-4 text-lg leading-8 text-slate-600">
                    Ikuti langkah-langkah berikut untuk memahami alur penggunaan aplikasi secara cepat dan mudah.
                </p>
            </div>

            <div class="space-y-24">

                <!-- STEP 1 -->
                <div class="grid lg:grid-cols-2 gap-12 items-center">

                    <!-- IMAGE -->
                    <div>
                        <img src="{{ asset('storage/tutorial/dashboardLP.png') }}"
                            class="w-full rounded-3xl shadow-xl transition duration-300 hover:scale-105"
                            alt="Login">
                    </div>

                    <!-- TEXT -->
                    <div>
                        <div class="flex items-center gap-4 mb-5">
                            <div class="h-14 w-14 flex items-center justify-center rounded-2xl bg-sky-600 text-white shadow">
                                <i class="fas fa-play text-xl"></i>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-sky-600 uppercase">Langkah 1</p>
                                <h3 class="text-2xl font-bold text-slate-900">Masuk & Pilih Role</h3>
                            </div>
                        </div>
                        <p class="text-slate-600 leading-relaxed">
                            Login ke dalam sistem menggunakan akun yang telah terdaftar, lalu pilih role seperti Intern,
                            Mentor, atau Admin untuk mengakses fitur sesuai kebutuhan.
                        </p>
                    </div>

                </div>

                <!-- STEP 2 (REVERSE) -->
                <div class="grid lg:grid-cols-2 gap-12 items-center">

                    <!-- TEXT -->
                    <div class="lg:order-1 order-2">
                        <div class="flex items-center gap-4 mb-5">
                            <div class="h-14 w-14 flex items-center justify-center rounded-2xl bg-sky-600 text-white shadow">
                                <i class="fas fa-calendar-check text-xl"></i>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-sky-600 uppercase">Langkah 2</p>
                                <h3 class="text-2xl font-bold text-slate-900">Kelola Absensi & Logbook</h3>
                            </div>
                        </div>
                        <p class="text-slate-600 leading-relaxed">
                            Catat kehadiran harian dan isi logbook aktivitas magang secara rutin agar perkembangan kerja
                            dapat dipantau dengan lebih terstruktur.
                        </p>
                    </div>

                    <!-- IMAGE -->
                    <div class="lg:order-2 order-1">
                        <img src="{{ asset('storage/tutorial/absensi.png') }}"
                            class="w-full rounded-3xl shadow-xl transition duration-300 hover:scale-105"
                            alt="Absensi">
                    </div>

                </div>

                <!-- STEP 3 -->
                <div class="grid lg:grid-cols-2 gap-12 items-center">

                    <!-- IMAGE -->
                    <div>
                        <img src="{{ asset('storage/tutorial/laporan.png') }}"
                            class="w-full rounded-3xl shadow-xl transition duration-300 hover:scale-105"
                            alt="Laporan">
                    </div>

                    <!-- TEXT -->
                    <div>
                        <div class="flex items-center gap-4 mb-5">
                            <div class="h-14 w-14 flex items-center justify-center rounded-2xl bg-sky-600 text-white shadow">
                                <i class="fas fa-file-alt text-xl"></i>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-sky-600 uppercase">Langkah 3</p>
                                <h3 class="text-2xl font-bold text-slate-900">Upload Laporan</h3>
                            </div>
                        </div>
                        <p class="text-slate-600 leading-relaxed">
                            Upload laporan akhir magang dan lihat feedback dari mentor untuk evaluasi hasil kerja secara menyeluruh.
                        </p>
                    </div>

                </div>

            </div>
        </div>
    </section>

            <section id="testimonials" class="bg-sky-50 py-20">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="mx-auto mb-14 max-w-2xl text-center">
                        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-sky-600">Testimoni</p>
                        <h2 class="mt-4 text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">Dipercaya oleh banyak institusi</h2>
                        <p class="mt-4 text-lg leading-8 text-slate-600">Berbagai kampus dan sekolah sudah menggunakan Komdigi untuk memanajemen magang.</p>
                    </div>
                    <div class="grid gap-6 lg:grid-cols-3">
                        <div class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm">
                            <p class="text-slate-600">“Komdigi membuat magang terstruktur dan mudah diawasi. Semua data tersimpan rapih.”</p>
                            <div class="mt-6">
                                <p class="font-semibold text-slate-900">Mentor</p>
                                <p class="text-sm text-slate-500">Universitas Hasanuddin</p>
                            </div>
                        </div>
                        <div class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm">
                            <p class="text-slate-600">“Siswa lebih disiplin karena laporan dan absensi bisa dipantau secara real time.”</p>
                            <div class="mt-6">
                                <p class="font-semibold text-slate-900">Peserta Magang</p>
                                <p class="text-sm text-slate-500">SMK Telkom Makassar</p>
                            </div>
                        </div>
                        <div class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm">
                            <p class="text-slate-600">“Platformnya responsif dan tampilan sangat bersih — cocok untuk program kampus dan industri.”</p>
                            <div class="mt-6">
                                <p class="font-semibold text-slate-900">Koordinator Magang</p>
                                <p class="text-sm text-slate-500">Universitas Negeri Makassar</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="partners" class="bg-white py-20">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="mx-auto mb-12 max-w-2xl text-center">
                        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-sky-600">Partner</p>
                        <h2 class="mt-4 text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">Institusi yang pernah magang di Komdigi</h2>
                    </div>
                    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        <div class="rounded-[1.75rem] border border-slate-200 bg-slate-50 p-6 text-center text-slate-700 shadow-sm">Universitas Hasanuddin</div>
                        <div class="rounded-[1.75rem] border border-slate-200 bg-slate-50 p-6 text-center text-slate-700 shadow-sm">Universitas Negeri Makassar</div>
                        <div class="rounded-[1.75rem] border border-slate-200 bg-slate-50 p-6 text-center text-slate-700 shadow-sm">Universitas DIPA Makassar</div>
                        <div class="rounded-[1.75rem] border border-slate-200 bg-slate-50 p-6 text-center text-slate-700 shadow-sm">Universitas Islam Negeri Alauddin Makassar</div>
                        <div class="rounded-[1.75rem] border border-slate-200 bg-slate-50 p-6 text-center text-slate-700 shadow-sm">Universitas Bosowa</div>
                        <div class="rounded-[1.75rem] border border-slate-200 bg-slate-50 p-6 text-center text-slate-700 shadow-sm">Universitas Sulawesi Barat</div>
                        <div class="rounded-[1.75rem] border border-slate-200 bg-slate-50 p-6 text-center text-slate-700 shadow-sm">Universitas Multimedia Nusantara</div>
                        <div class="rounded-[1.75rem] border border-slate-200 bg-slate-50 p-6 text-center text-slate-700 shadow-sm">SMK Telkom Makassar</div>
                        <div class="rounded-[1.75rem] border border-slate-200 bg-slate-50 p-6 text-center text-slate-700 shadow-sm">SMK Handayani Makassar</div>
                        <div class="rounded-[1.75rem] border border-slate-200 bg-slate-50 p-6 text-center text-slate-700 shadow-sm">SMK Negeri 5 Gowa</div>
                    </div>
                </div>
            </section>

            <section class="bg-sky-600 py-20">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="grid gap-8 lg:grid-cols-2 lg:items-center">
                        <div class="space-y-4 text-white">
                            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-sky-200">Siap mulai magang</p>
                            <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">Mulai magang lebih cepat dengan Komdigi</h2>
                            <p class="max-w-xl text-lg leading-8 text-sky-100">Buat akun, pilih role, dan mulai kelola magang dengan tampilan yang bersih dan modern.</p>
                        </div>
                        <div class="rounded-[2rem] border border-white/20 bg-white/10 p-6 shadow-xl shadow-sky-800/20 backdrop-blur-xl">
                            <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
                                <input type="email" placeholder="Alamat email Anda" class="min-w-0 flex-1 rounded-full border border-white/20 bg-white/20 px-4 py-3 text-white placeholder-slate-200 outline-none focus:border-white/40 focus:ring-2 focus:ring-white/20" />
                                <button class="rounded-full bg-white px-6 py-3 text-sm font-semibold text-slate-950 transition hover:bg-slate-100">Get Started</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
