@extends('layouts.app')

@section('title', 'Daftar Lowongan Magang')

@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=DM+Mono:wght@400;500&display=swap');

    * { font-family: 'Plus Jakarta Sans', sans-serif; }
    .mono { font-family: 'DM Mono', monospace; }

    body { background: #f3f7ff; }

    .dash-bg {
        min-height: 100vh;
        background:
            radial-gradient(circle at top right, rgba(99,102,241,.12), transparent 30%),
            linear-gradient(135deg, #eef4ff 0%, #f5f7ff 40%, #edf3ff 100%);
    }

    /* ── HERO ── */
    .hero-card {
        position: relative;
        overflow: hidden;
        border-radius: 28px;
        background: linear-gradient(135deg, #1e3a8a 0%, #4338ca 55%, #6366f1 100%);
        box-shadow: 0 15px 40px rgba(30,58,138,.18);
    }
    .hero-card::before {
        content: '';
        position: absolute;
        width: 280px; height: 280px;
        border-radius: 50%;
        background: rgba(255,255,255,.06);
        top: -120px; right: -80px;
    }
    .hero-card::after {
        content: '';
        position: absolute;
        width: 320px; height: 320px;
        border-radius: 50%;
        background: rgba(255,255,255,.04);
        bottom: -180px; left: -80px;
    }

    .floating-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(255,255,255,.12);
        border: 1px solid rgba(255,255,255,.12);
        backdrop-filter: blur(10px);
        color: #dbeafe;
        padding: .5rem 1rem;
        border-radius: 999px;
        font-size: .78rem;
        font-weight: 700;
        letter-spacing: .08em;
        text-transform: uppercase;
    }

    .hero-stat-box {
        background: rgba(255,255,255,.10);
        border: 1px solid rgba(255,255,255,.12);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 1.2rem 1.8rem;
        text-align: center;
        min-width: 140px;
    }

    /* ── FILTER ── */
    .filter-card {
        background: rgba(255,255,255,.92);
        backdrop-filter: blur(18px);
        border-radius: 24px;
        border: 1px solid rgba(255,255,255,.7);
        box-shadow: 0 8px 30px rgba(15,23,42,.06);
        padding: 1.4rem 1.6rem;
    }

    .filter-input,
    .filter-select {
        width: 100%;
        height: 50px;
        border-radius: 16px;
        border: 1px solid #dbe3f0;
        background: #fff;
        padding: 0 1rem;
        font-size: .9rem;
        color: #334155;
        transition: .2s;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .filter-input:focus,
    .filter-select:focus {
        outline: none;
        border-color: #6366f1;
        box-shadow: 0 0 0 4px rgba(99,102,241,.10);
    }

    .filter-btn {
        height: 50px;
        padding: 0 1.4rem;
        border-radius: 16px;
        font-size: .88rem;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: none;
        cursor: pointer;
        transition: all .2s ease;
        font-family: 'Plus Jakarta Sans', sans-serif;
        white-space: nowrap;
    }
    .filter-btn-primary {
        background: linear-gradient(135deg, #2563eb, #4f46e5);
        color: #fff;
        box-shadow: 0 8px 20px rgba(79,70,229,.20);
    }
    .filter-btn-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 12px 24px rgba(79,70,229,.28);
    }
    .filter-btn-reset {
        background: #f1f5f9;
        color: #64748b;
        border: 1px solid #e2e8f0;
    }
    .filter-btn-reset:hover {
        background: #e2e8f0;
        color: #334155;
    }

    /* ── SORT CHIPS ── */
    .sort-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
        border-radius: 999px;
        font-size: .78rem;
        font-weight: 700;
        cursor: pointer;
        border: 1px solid #e2e8f0;
        background: #fff;
        color: #64748b;
        transition: .15s;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .sort-chip.active,
    .sort-chip:hover {
        background: #eef2ff;
        border-color: #a5b4fc;
        color: #4338ca;
    }

    /* ── LOWONGAN CARD ── */
    .lowongan-card {
        background: rgba(255,255,255,.92);
        backdrop-filter: blur(18px);
        border-radius: 24px;
        border: 1px solid rgba(255,255,255,.7);
        box-shadow: 0 8px 30px rgba(15,23,42,.06);
        padding: 1.4rem;
        display: flex;
        flex-direction: column;
        gap: 1rem;
        transition: all .25s ease;
        position: relative;
        overflow: hidden;
    }
    .lowongan-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(99,102,241,.025), transparent);
        pointer-events: none;
        border-radius: inherit;
    }
    .lowongan-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 40px rgba(15,23,42,.10);
        border-color: rgba(165,180,252,.5);
    }

    /* ── LOGO ── */
    .logo-box {
        width: 58px; height: 58px;
        border-radius: 18px;
        background: linear-gradient(135deg, #e0e7ff, #dbeafe);
        border: 1px solid #c7d2fe;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        color: #4338ca;
        flex-shrink: 0;
        overflow: hidden;
    }
    .logo-box img {
        width: 100%; height: 100%;
        object-fit: cover;
    }

    /* ── BADGE ── */
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 12px;
        border-radius: 999px;
        font-size: .72rem;
        font-weight: 800;
        white-space: nowrap;
        width: fit-content;
    }
    .badge-aktif   { background: rgba(34,197,94,.10); color: #15803d; border: 1px solid rgba(34,197,94,.20); }
    .badge-nonaktif { background: rgba(239,68,68,.10); color: #b91c1c; border: 1px solid rgba(239,68,68,.20); }
    .badge-new     { background: rgba(99,102,241,.10); color: #4338ca; border: 1px solid rgba(99,102,241,.20); }

    /* ── DETAIL META ── */
    .meta-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 8px;
    }
    .meta-box {
        background: #f8faff;
        border: 1px solid #eef2ff;
        border-radius: 14px;
        padding: 10px 12px;
    }
    .meta-label {
        font-size: .68rem;
        font-weight: 800;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: .5px;
        margin-bottom: 3px;
    }
    .meta-value {
        font-size: .88rem;
        font-weight: 700;
        color: #1e293b;
    }

    /* ── DESKRIPSI ── */
    .desc-box {
        background: #f8faff;
        border: 1px solid #eef2ff;
        border-radius: 14px;
        padding: 12px 14px;
        flex: 1;
    }
    .desc-box p {
        font-size: .82rem;
        color: #64748b;
        line-height: 1.65;
        margin: 0;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* ── ACTION BUTTONS ── */
    .card-footer {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        padding-top: 4px;
        border-top: 1px solid #f1f5f9;
        margin-top: auto;
    }
    .btn-card {
        height: 38px;
        padding: 0 14px;
        border-radius: 12px;
        font-size: .8rem;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border: none;
        cursor: pointer;
        transition: all .18s;
        text-decoration: none;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .btn-detail {
        background: #eef2ff;
        color: #4338ca;
    }
    .btn-detail:hover {
        background: #4338ca;
        color: #fff;
    }
    .btn-apply {
        background: linear-gradient(135deg, #16a34a, #15803d);
        color: #fff;
        box-shadow: 0 4px 12px rgba(22,163,74,.20);
    }
    .btn-apply:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(22,163,74,.28);
    }

    /* ── EMPTY ── */
    .empty-card {
        background: rgba(255,255,255,.92);
        backdrop-filter: blur(18px);
        border-radius: 28px;
        border: 1px solid rgba(255,255,255,.7);
        box-shadow: 0 8px 30px rgba(15,23,42,.06);
        padding: 5rem 2rem;
        text-align: center;
        grid-column: 1 / -1;
    }
    .empty-icon-wrap {
        width: 100px; height: 100px;
        border-radius: 50%;
        background: linear-gradient(135deg, #e0e7ff, #dbeafe);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 2.5rem;
        color: #a5b4fc;
    }

    /* ── PAGINATION ── */
    .pagination-wrap {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 6px;
        flex-wrap: wrap;
    }
    .pagination-wrap .page-item .page-link {
        width: 40px; height: 40px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #e2e8f0;
        background: #fff;
        color: #475569;
        font-size: .85rem;
        font-weight: 700;
        transition: .18s;
        text-decoration: none;
    }
    .pagination-wrap .page-item.active .page-link {
        background: linear-gradient(135deg, #2563eb, #4f46e5);
        border-color: transparent;
        color: #fff;
        box-shadow: 0 4px 12px rgba(79,70,229,.22);
    }
    .pagination-wrap .page-item .page-link:hover {
        background: #eef2ff;
        border-color: #a5b4fc;
        color: #4338ca;
    }
    .pagination-wrap .page-item.disabled .page-link {
        opacity: .4;
        cursor: default;
    }

    /* ── GRID ── */
    .lowongan-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.25rem;
    }
    @media (max-width: 768px) {
        .lowongan-grid { grid-template-columns: 1fr; }
    }

    /* ── ANIMATIONS ── */
    @keyframes fadeSlideUp {
        from { opacity: 0; transform: translateY(16px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .anim-1 { animation: fadeSlideUp .5s ease both; }
    .anim-2 { animation: fadeSlideUp .5s ease .1s both; }
    .anim-3 { animation: fadeSlideUp .5s ease .2s both; }
    .anim-4 { animation: fadeSlideUp .5s ease .3s both; }
</style>
@endpush

@section('content')

@php
    $divisiIcons = [
        'PUSDATING'    => 'fa-server',
        'UI/UX Design' => 'fa-pen-ruler',
        'Backend Dev'  => 'fa-code',
        'Data Analyst' => 'fa-chart-bar',
        'Multimedia'   => 'fa-film',
        'Humas'        => 'fa-bullhorn',
    ];
@endphp

<div class="dash-bg py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

        {{-- ── HERO ── --}}
        <div class="hero-card p-7 anim-1">
            <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                <div class="flex-1">
                    <div class="floating-badge mb-4">
                        <i class="fas fa-briefcase"></i>
                        Lowongan Magang
                    </div>
                    <h1 class="text-3xl lg:text-4xl font-extrabold text-white leading-tight">
                        Temukan Lowongan <br class="hidden lg:block"> Magang Terbaik
                    </h1>
                    <p class="mt-3 text-blue-100 leading-relaxed max-w-xl">
                        Jelajahi lowongan magang dari mitra terpercaya dan mulai perjalanan
                        kariermu bersama BBLSDM Komdigi Makassar.
                    </p>
                    <div class="mt-5 flex flex-wrap gap-4 text-sm text-indigo-100">
                        <span><i class="fas fa-map-marker-alt mr-1"></i> Makassar, Sulawesi Selatan</span>
                        <span><i class="fas fa-clock mr-1"></i> Dibuka setiap semester</span>
                    </div>
                </div>

                <div class="hero-stat-box">
                    <p class="text-indigo-200 text-xs uppercase tracking-widest font-bold mb-2">
                        Total Lowongan
                    </p>
                    <h2 class="text-5xl font-extrabold text-white mono">
                        {{ $lowongans->total() ?? count($lowongans) }}
                    </h2>
                    <p class="text-indigo-200 text-sm mt-1">Posisi tersedia</p>
                </div>

            </div>
        </div>

        {{-- ── FILTER ── --}}
        <div class="filter-card anim-2">
            <form method="GET" action="{{ url()->current() }}">
                <div class="flex flex-wrap xl:flex-nowrap items-center gap-3">

                    <div class="relative flex-1 min-w-[200px]">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                            <i class="fas fa-search"></i>
                        </span>
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari lowongan, posisi, atau divisi..."
                            class="filter-input pl-10">
                    </div>

                    <div class="w-full sm:w-[200px]">
                        <select name="perusahaan" class="filter-select">
                            <option value="">Semua Perusahaan</option>
                            @foreach($perusahaans ?? [] as $perusahaan)
                                <option value="{{ $perusahaan->id }}"
                                    {{ request('perusahaan') == $perusahaan->id ? 'selected' : '' }}>
                                    {{ $perusahaan->nama_industri }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="w-full sm:w-[180px]">
                        <select name="divisi" class="filter-select">
                            <option value="">Semua Divisi</option>
                            @foreach($divisis ?? [] as $divisi)
                                <option value="{{ $divisi }}"
                                    {{ request('divisi') == $divisi ? 'selected' : '' }}>
                                    {{ $divisi }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center gap-2 w-full sm:w-auto">
                        <button type="submit" class="filter-btn filter-btn-primary flex-1 sm:flex-none">
                            <i class="fas fa-search"></i>
                            Cari
                        </button>
                        @if(request()->filled('search') || request()->filled('perusahaan') || request()->filled('divisi'))
                            <a href="{{ url()->current() }}" class="filter-btn filter-btn-reset flex-1 sm:flex-none">
                                <i class="fas fa-rotate-left"></i>
                                Reset
                            </a>
                        @endif
                    </div>

                </div>
            </form>
        </div>

        {{-- ── RESULTS BAR ── --}}
        <div class="flex flex-wrap items-center justify-between gap-3 anim-3 px-1">
            <p class="text-sm text-slate-500">
                Menampilkan
                <span class="font-bold text-slate-700">
                    {{ $lowongans instanceof \Illuminate\Pagination\LengthAwarePaginator
                        ? $lowongans->firstItem() . '–' . $lowongans->lastItem()
                        : count($lowongans) }}
                </span>
                dari
                <span class="font-bold text-slate-700">
                    {{ $lowongans instanceof \Illuminate\Pagination\LengthAwarePaginator
                        ? $lowongans->total()
                        : count($lowongans) }}
                </span>
                lowongan
            </p>
            <div class="flex gap-2">
                <a href="{{ request()->fullUrlWithQuery(['sort' => 'terbaru']) }}"
                   class="sort-chip {{ request('sort', 'terbaru') === 'terbaru' ? 'active' : '' }}">
                    <i class="fas fa-clock"></i> Terbaru
                </a>
                <a href="{{ request()->fullUrlWithQuery(['sort' => 'kuota']) }}"
                   class="sort-chip {{ request('sort') === 'kuota' ? 'active' : '' }}">
                    <i class="fas fa-users"></i> Kuota terbanyak
                </a>
            </div>
        </div>

        {{-- ── GRID ── --}}
        <div class="lowongan-grid anim-4">

            @forelse($lowongans as $lowongan)
                @php
                    $status     = $lowongan->status ?? 'aktif';
                    $divisi     = $lowongan->divisi ?? '';
                    $icon       = $divisiIcons[$divisi] ?? 'fa-briefcase';
                    $isNew      = $lowongan->created_at && $lowongan->created_at->diffInDays(now()) <= 7;

                    $logo = optional($lowongan->industri)->logo_industri
                        ? asset('storage/' . $lowongan->industri->logo_industri)
                        : null;
                @endphp

                <div class="lowongan-card">

                    {{-- TOP --}}
                    <div class="flex items-start gap-3">

                        <div class="logo-box">
                            @if($logo)
                                <img src="{{ $logo }}" alt="Logo">
                            @else
                                <i class="fas {{ $icon }}"></i>
                            @endif
                        </div>

                        <div class="flex-1 min-w-0">
                            <h2 class="text-base font-extrabold text-slate-800 leading-snug line-clamp-2 mb-1">
                                {{ $lowongan->judul_lowongan ?? '-' }}
                            </h2>
                            <p class="text-xs text-slate-500 font-medium mb-2">
                                <i class="fas fa-building mr-1"></i>
                                {{ optional($lowongan->industri)->nama_industri ?? 'BBLSDM Komdigi Makassar' }}
                            </p>
                            <div class="flex flex-wrap gap-2">
                                <span class="status-badge {{ $status === 'aktif' ? 'badge-aktif' : 'badge-nonaktif' }}">
                                    <i class="fas {{ $status === 'aktif' ? 'fa-circle-check' : 'fa-circle-xmark' }}" style="font-size:9px"></i>
                                    {{ ucfirst($status) }}
                                </span>
                                @if($isNew)
                                    <span class="status-badge badge-new">
                                        <i class="fas fa-bolt" style="font-size:9px"></i>
                                        Baru
                                    </span>
                                @endif
                            </div>
                        </div>

                    </div>

                    {{-- META --}}
                    <div class="meta-grid">
                        <div class="meta-box">
                            <p class="meta-label">Posisi</p>
                            <p class="meta-value">{{ $lowongan->posisi_magang ?? '-' }}</p>
                        </div>
                        <div class="meta-box">
                            <p class="meta-label">Divisi</p>
                            <p class="meta-value">{{ $lowongan->divisi ?? '-' }}</p>
                        </div>
                        <div class="meta-box" style="grid-column: 1 / -1">
                            <p class="meta-label">Kuota Peserta</p>
                            <p class="meta-value">{{ $lowongan->kuota_peserta ?? 0 }} Peserta</p>
                        </div>
                    </div>

                    {{-- DESKRIPSI --}}
                    <div class="desc-box">
                        <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">
                            Deskripsi pekerjaan
                        </p>
                        <p>{{ $lowongan->deskripsi_pekerjaan ?? '-' }}</p>
                    </div>

                    {{-- FOOTER --}}
                    <div class="card-footer">
                        <a href="{{ route('institusi.lowongan.show', $lowongan->id) }}"
                           class="btn-card btn-detail">
                            <i class="fas fa-eye"></i> Lihat Detail
                        </a>
                        @if($status === 'aktif')
                            <a href="{{ route('institusi.pengajuan.create', $lowongan->id) }}"
                               class="btn-card btn-apply">
                                <i class="fas fa-paper-plane"></i> Ajukan Permohonan
                            </a>
                        @endif
                    </div>

                </div>

            @empty

                <div class="empty-card">
                    <div class="empty-icon-wrap">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h3 class="text-2xl font-extrabold text-slate-700 mb-3">
                        Tidak Ada Lowongan
                    </h3>
                    <p class="text-slate-500 max-w-md mx-auto leading-relaxed">
                        Saat ini belum ada lowongan yang sesuai dengan filter yang dipilih.
                        Coba ubah kriteria pencarian Anda.
                    </p>
                    @if(request()->filled('search') || request()->filled('perusahaan') || request()->filled('divisi'))
                        <a href="{{ url()->current() }}"
                           class="inline-flex items-center gap-2 mt-6 px-5 py-3 rounded-2xl bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-sm transition">
                            <i class="fas fa-rotate-left"></i>
                            Reset Filter
                        </a>
                    @endif
                </div>

            @endforelse

        </div>

        {{-- ── PAGINATION ── --}}
        @if($lowongans instanceof \Illuminate\Pagination\LengthAwarePaginator && $lowongans->hasPages())
            <div class="pagination-wrap py-2">
                {{-- Previous --}}
                @if($lowongans->onFirstPage())
                    <span class="page-item disabled">
                        <span class="page-link"><i class="fas fa-chevron-left text-xs"></i></span>
                    </span>
                @else
                    <a class="page-item" href="{{ $lowongans->previousPageUrl() }}">
                        <span class="page-link"><i class="fas fa-chevron-left text-xs"></i></span>
                    </a>
                @endif

                {{-- Pages --}}
                @foreach($lowongans->getUrlRange(1, $lowongans->lastPage()) as $page => $url)
                    @if($page == $lowongans->currentPage())
                        <span class="page-item active">
                            <span class="page-link">{{ $page }}</span>
                        </span>
                    @else
                        <a class="page-item" href="{{ $url }}">
                            <span class="page-link">{{ $page }}</span>
                        </a>
                    @endif
                @endforeach

                {{-- Next --}}
                @if($lowongans->hasMorePages())
                    <a class="page-item" href="{{ $lowongans->nextPageUrl() }}">
                        <span class="page-link"><i class="fas fa-chevron-right text-xs"></i></span>
                    </a>
                @else
                    <span class="page-item disabled">
                        <span class="page-link"><i class="fas fa-chevron-right text-xs"></i></span>
                    </span>
                @endif
            </div>
        @endif

    </div>
</div>

@endsection