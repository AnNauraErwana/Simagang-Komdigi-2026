@extends('layouts.app')

@section('title', 'Verifikasi Lowongan')

@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');

    * { font-family: 'Plus Jakarta Sans', sans-serif; }
    body { background: #f4f7ff; }

    .page-bg {
        min-height: 100vh;
        background:
            radial-gradient(circle at top left, #dbeafe 0%, transparent 25%),
            radial-gradient(circle at bottom right, #e0e7ff 0%, transparent 25%),
            linear-gradient(180deg, #f8fbff 0%, #f3f6ff 100%);
    }

    .hero-card {
        position: relative;
        overflow: hidden;
        border-radius: 32px;
        padding: 2rem;
        background: linear-gradient(135deg, #1e3a8a 0%, #4338ca 55%, #6366f1 100%);
        box-shadow: 0 25px 55px rgba(37,99,235,.20);
    }

    .hero-card::before {
        content: '';
        position: absolute;
        width: 280px; height: 280px;
        background: rgba(255,255,255,.08);
        border-radius: 50%;
        top: -120px; right: -80px;
    }

    .hero-card::after {
        content: '';
        position: absolute;
        width: 180px; height: 180px;
        background: rgba(255,255,255,.05);
        border-radius: 50%;
        bottom: -70px; left: -50px;
    }

    .stats-card {
        background: #fff;
        border-radius: 20px;
        padding: 1.25rem;
        border: 1px solid #eef2ff;
        box-shadow: 0 8px 24px rgba(15,23,42,.05);
        transition: .25s ease;
    }

    .stats-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 14px 30px rgba(15,23,42,.08);
    }

    .stats-icon {
        width: 52px; height: 52px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }

    .filter-card {
        background: #fff;
        border-radius: 24px;
        padding: 1.4rem;
        border: 1px solid #eef2ff;
        box-shadow: 0 8px 24px rgba(15,23,42,.05);
    }

    .filter-input,
    .filter-select {
        width: 100%;
        height: 46px;
        border-radius: 14px;
        border: 1px solid #dbe3f0;
        background: #fff;
        padding: 0 .9rem;
        font-size: .88rem;
        color: #334155;
        transition: .2s;
    }

    .filter-input:focus,
    .filter-select:focus {
        outline: none;
        border-color: #4f46e5;
        box-shadow: 0 0 0 3px rgba(79,70,229,.10);
    }

    /* ── Lowongan Card ── */
    .lowongan-card {
        position: relative;
        background: #fff;
        border-radius: 24px;
        padding: 1.4rem;
        border: 1px solid #e8edf5;
        box-shadow: 0 4px 16px rgba(15,23,42,.06);
        transition: .22s ease;
        display: flex;
        flex-direction: column;
        min-height: 220px;
    }

    .lowongan-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 36px rgba(15,23,42,.10);
        border-color: #c7d7f5;
    }

    /* bookmark icon top-right */
    .card-bookmark {
        position: absolute;
        top: 1.1rem;
        right: 1.1rem;
        width: 32px; height: 32px;
        border-radius: 8px;
        border: 1.5px solid #e2e8f0;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #94a3b8;
        font-size: .8rem;
        cursor: pointer;
        transition: .2s;
    }

    .card-bookmark:hover { border-color: #4f46e5; color: #4f46e5; }

    /* status badge top-left */
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: .3rem;
        padding: .22rem .7rem;
        border-radius: 999px;
        font-size: .65rem;
        font-weight: 800;
        letter-spacing: .3px;
        white-space: nowrap;
    }

    .badge-green { background: #dcfce7; color: #15803d; }
    .badge-red   { background: #fee2e2; color: #b91c1c; }
    .badge-amber { background: #fef9c3; color: #a16207; }

    /* main title area */
    .card-title {
        margin-top: .9rem;
        font-size: 1.25rem;
        font-weight: 800;
        color: #0f172a;
        line-height: 1.3;
        flex: 1;
    }

    /* meta chips */
    .card-meta {
        display: flex;
        flex-wrap: wrap;
        gap: .4rem .75rem;
        margin-top: .5rem;
    }

    .meta-chip {
        display: inline-flex;
        align-items: center;
        gap: .25rem;
        font-size: .7rem;
        font-weight: 600;
        color: #64748b;
    }

    .meta-chip i { font-size: .6rem; color: #94a3b8; }

    /* ── Card footer ── */
    .card-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 1.2rem;
        padding-top: .9rem;
        border-top: 1px solid #f1f5f9;
    }

    .card-company {
        display: flex;
        align-items: center;
        gap: .6rem;
    }

    .company-logo {
        width: 32px; height: 32px;
        border-radius: 8px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        background: #f8faff;
        flex-shrink: 0;
    }

    .company-logo img { width: 100%; height: 100%; object-fit: cover; }

    .company-name {
        font-size: .75rem;
        font-weight: 700;
        color: #334155;
        max-width: 130px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .company-sub {
        font-size: .65rem;
        color: #94a3b8;
        font-weight: 500;
    }

    /* View button */
    .btn-view {
        height: 34px;
        padding: 0 1rem;
        border-radius: 10px;
        background: #0f172a;
        color: #fff;
        font-size: .75rem;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: .35rem;
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: .2s;
        white-space: nowrap;
    }

    .btn-view:hover { background: #4f46e5; color: #fff; text-decoration: none; }

    /* filter button */
    .btn-action {
        height: 46px;
        border-radius: 14px;
        padding: 0 1.1rem;
        font-size: .85rem;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: .4rem;
        transition: .2s;
        text-decoration: none;
        border: none;
        cursor: pointer;
        white-space: nowrap;
    }

    .btn-action:hover { transform: translateY(-1px); text-decoration: none; }

    .btn-primary {
        background: linear-gradient(135deg, #2563eb, #4f46e5);
        color: #fff;
        box-shadow: 0 6px 14px rgba(79,70,229,.20);
    }

    .btn-primary:hover { opacity: .92; color: #fff; }

    .empty-card {
        background: #fff;
        border-radius: 28px;
        border: 1px solid #eef2ff;
        padding: 4rem 2rem;
        box-shadow: 0 8px 24px rgba(15,23,42,.05);
    }
</style>
@endpush

@section('content')
<div class="page-bg py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

        {{-- ── HERO ── --}}
        <div class="hero-card">
            <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                <div class="max-w-2xl">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 text-sm font-semibold text-blue-100 backdrop-blur">
                        <i class="fas fa-shield-check"></i>
                        Dashboard Verifikasi
                    </div>
                    <h1 class="mt-4 text-3xl lg:text-4xl font-extrabold text-white leading-tight">
                        Verifikasi Lowongan Industri Mitra
                    </h1>
                    <p class="mt-2 text-blue-100 leading-relaxed text-sm">
                        Tinjau dan verifikasi lowongan magang yang diajukan oleh perusahaan,
                        instansi, dan organisasi mitra.
                    </p>
                </div>
            </div>
        </div>

        {{-- ── STATS ── --}}
        <div class="grid grid-cols-2 xl:grid-cols-4 gap-4">
            <div class="stats-card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold text-slate-500">Total Lowongan</p>
                        <h2 class="mt-1 text-2xl font-extrabold text-slate-800">{{ $totalLowongan }}</h2>
                    </div>
                    <div class="stats-icon bg-blue-100 text-blue-700"><i class="fas fa-briefcase"></i></div>
                </div>
            </div>
            <div class="stats-card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold text-slate-500">Pending</p>
                        <h2 class="mt-1 text-2xl font-extrabold text-yellow-500">{{ $totalPending }}</h2>
                    </div>
                    <div class="stats-icon bg-yellow-100 text-yellow-700"><i class="fas fa-clock"></i></div>
                </div>
            </div>
            <div class="stats-card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold text-slate-500">Disetujui</p>
                        <h2 class="mt-1 text-2xl font-extrabold text-green-600">{{ $totalApprove }}</h2>
                    </div>
                    <div class="stats-icon bg-green-100 text-green-700"><i class="fas fa-check-circle"></i></div>
                </div>
            </div>
            <div class="stats-card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold text-slate-500">Ditolak</p>
                        <h2 class="mt-1 text-2xl font-extrabold text-red-600">{{ $totalTolak }}</h2>
                    </div>
                    <div class="stats-icon bg-red-100 text-red-700"><i class="fas fa-times-circle"></i></div>
                </div>
            </div>
        </div>

        {{-- ── FILTER ── --}}
        <div class="filter-card">
            <form method="GET">
                <div class="flex flex-wrap xl:flex-nowrap items-center gap-3">
                    <div class="w-full xl:flex-1">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari lowongan atau perusahaan..."
                            class="filter-input">
                    </div>
                    <div class="w-full sm:w-[200px]">
                        <select name="perusahaan" class="filter-select">
                            <option value="">Semua Perusahaan</option>
                            @foreach($perusahaans as $perusahaan)
                                <option value="{{ $perusahaan->id }}"
                                    {{ request('perusahaan') == $perusahaan->id ? 'selected' : '' }}>
                                    {{ $perusahaan->nama_industri }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full sm:w-[170px]">
                        <select name="divisi" class="filter-select">
                            <option value="">Semua Divisi</option>
                            @foreach($divisis as $divisi)
                                <option value="{{ $divisi }}" {{ request('divisi') == $divisi ? 'selected' : '' }}>
                                    {{ $divisi }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full sm:w-[160px]">
                        <select name="status" class="filter-select">
                            <option value="">Semua Status</option>
                            <option value="pending"   {{ request('status') == 'pending'   ? 'selected' : '' }}>Pending</option>
                            <option value="disetujui" {{ request('status') == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                            <option value="ditolak"   {{ request('status') == 'ditolak'   ? 'selected' : '' }}>Ditolak</option>
                        </select>
                    </div>
                    <div class="flex items-center gap-2 w-full sm:w-auto">
                        <button type="submit" class="btn-action btn-primary min-w-[120px]">
                            <i class="fas fa-search"></i> Filter
                        </button>
                        @if(request()->filled('search') || request()->filled('status') || request()->filled('perusahaan') || request()->filled('divisi'))
                            <a href="{{ route('admin.verifikasi.index') }}"
                               class="btn-action bg-slate-100 hover:bg-slate-200 text-slate-700 min-w-[100px]">
                                <i class="fas fa-rotate-left"></i> Reset
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>

        {{-- ── CARD LIST (3 kolom) ── --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4">

            @forelse($lowongans as $lowongan)
                @php
                    $logo = optional($lowongan->industri)->logo_industri
                        ? asset('storage/' . $lowongan->industri->logo_industri)
                        : 'https://ui-avatars.com/api/?name=' . urlencode(optional($lowongan->industri)->nama_industri ?? 'I') . '&background=4f46e5&color=fff&size=64';

                    $status = $lowongan->status_verifikasi ?? 'pending';

                    $badgeClass = match($status) {
                        'disetujui' => 'badge-green',
                        'ditolak'   => 'badge-red',
                        default     => 'badge-amber',
                    };

                    $badgeIcon = match($status) {
                        'disetujui' => 'fa-check-circle',
                        'ditolak'   => 'fa-times-circle',
                        default     => 'fa-clock',
                    };
                @endphp

                <div class="lowongan-card">

                    {{-- Status badge pojok kanan atas --}}
                    <div style="display: flex; justify-content: flex-end;">
                        <span class="status-badge {{ $badgeClass }}">
                            <i class="fas {{ $badgeIcon }}"></i>
                            {{ ucfirst($status) }}
                        </span>
                    </div>

                    {{-- Title --}}
                    <h2 class="card-title">
                        {{ $lowongan->judul_lowongan ?? '-' }}
                    </h2>

                    {{-- Meta --}}
                    <div class="card-meta">
                        @if($lowongan->posisi_magang)
                            <span class="meta-chip">
                                <i class="fas fa-user-tie"></i>
                                {{ Str::limit($lowongan->posisi_magang, 20) }}
                            </span>
                        @endif
                        @if($lowongan->divisi)
                            <span class="meta-chip">
                                <i class="fas fa-layer-group"></i>
                                {{ Str::limit($lowongan->divisi, 20) }}
                            </span>
                        @endif
                        <span class="meta-chip">
                            <i class="fas fa-users"></i>
                            {{ $lowongan->kuota_peserta ?? 0 }} Peserta
                        </span>
                    </div>

                    {{-- Footer --}}
                    <div class="card-footer">
                        <div class="card-company">
                            <div class="company-logo">
                                <img src="{{ $logo }}" alt="Logo">
                            </div>
                            <div>
                                <p class="company-name">
                                    {{ optional($lowongan->industri)->nama_industri ?? '-' }}
                                </p>
                                <p class="company-sub">
                                    {{ optional($lowongan->created_at)->translatedFormat('d M Y') ?? '-' }}
                                </p>
                            </div>
                        </div>

                        <a href="{{ route('admin.verifikasi.show', $lowongan->id) }}" class="btn-view">
                            View
                        </a>
                    </div>

                </div>

            @empty
                <div class="col-span-full">
                    <div class="empty-card text-center">
                        <div class="w-24 h-24 mx-auto rounded-full bg-slate-100 flex items-center justify-center">
                            <i class="fas fa-briefcase text-4xl text-slate-300"></i>
                        </div>
                        <h3 class="mt-6 text-xl font-extrabold text-slate-700">Belum Ada Lowongan Magang</h3>
                        <p class="mt-2 text-slate-500 max-w-lg mx-auto text-sm leading-relaxed">
                            Belum ditemukan lowongan magang yang sesuai dengan filter yang dipilih.
                        </p>
                    </div>
                </div>
            @endforelse

        </div>

        {{-- ── PAGINATION ── --}}
        @if($lowongans->hasPages())
            <div class="pt-2">{{ $lowongans->links() }}</div>
        @endif

    </div>
</div>

{{-- ── MODAL HAPUS ── --}}
<div x-data="{ showDeleteModal: false, deleteUrl: '', jobTitle: '' }"
     @open-delete-modal-lowongan.window="showDeleteModal = true; deleteUrl = $event.detail.url; jobTitle = $event.detail.title">

    <div x-show="showDeleteModal" style="display:none;"
         class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-gray-900 bg-opacity-50 backdrop-blur-sm"
         x-transition.opacity>

        <div @click.away="showDeleteModal = false"
             class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6"
             x-show="showDeleteModal" x-transition.scale.origin.bottom>

            <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
                <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
            </div>

            <h3 class="text-xl font-bold text-center text-gray-900 mb-2">Konfirmasi Hapus</h3>

            <p class="text-center text-gray-600 mb-6">
                Apakah Anda yakin ingin menghapus lowongan
                <strong x-text="jobTitle"></strong>?
                Tindakan ini tidak dapat dibatalkan.
            </p>

            <div class="flex justify-center gap-3">
                <button type="button" @click="showDeleteModal = false"
                    class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-xl transition-colors">
                    Batal
                </button>
                <form :action="deleteUrl" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-5 py-2.5 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-xl transition-colors flex items-center gap-2">
                        <i class="fas fa-trash"></i> Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection