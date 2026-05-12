@extends('layouts.app')

@section('title', 'Detail Mikro Skill - Sistem Magang')

@push('styles')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=DM+Mono:wght@400;500&display=swap');

        *,
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .mono {
            font-family: 'DM Mono', monospace;
        }

        .dash-bg {
            min-height: 100vh;
            background: #f1f5ff;
        }

        /* ── Hero strip ── */
        .hero-strip {
            background: linear-gradient(110deg, #0f2878 0%, #2d3ecb 55%, #4f46e5 100%);
            border-radius: 20px;
            position: relative;
            overflow: hidden;
        }

        .hero-strip::before {
            content: '';
            position: absolute;
            top: -80px;
            right: -60px;
            width: 260px;
            height: 260px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            pointer-events: none;
        }

        .hero-strip::after {
            content: '';
            position: absolute;
            bottom: -100px;
            left: 25%;
            width: 320px;
            height: 320px;
            background: rgba(255, 255, 255, 0.04);
            border-radius: 50%;
            pointer-events: none;
        }

        /* ── Panel ── */
        .panel {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 1px 3px rgba(20, 40, 120, 0.06), 0 4px 18px rgba(20, 40, 120, 0.06);
            overflow: hidden;
        }

        .panel-header {
            background: linear-gradient(100deg, #1e3a8a 0%, #3b4fd8 100%);
            padding: 16px 22px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .panel-header h2 {
            color: #fff;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: 0.01em;
            margin: 0;
        }

        .panel-body {
            padding: 22px;
        }

        /* ── Section label ── */
        .sec-label {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #94a3b8;
            margin-bottom: 14px;
        }

        /* ── Table ── */
        .att-table {
            width: 100%;
            border-collapse: collapse;
        }

        .att-table thead tr {
            background: #f0f4ff;
        }

        .att-table thead th {
            padding: 12px 18px;
            text-align: left;
            font-size: 11px;
            font-weight: 700;
            color: #3b4fd8;
            text-transform: uppercase;
            letter-spacing: .07em;
            white-space: nowrap;
        }

        .att-tr {
            border-top: 1px solid #f1f5f9;
            transition: background .15s ease;
        }

        .att-tr:hover {
            background: #eff2ff;
        }

        .att-tr td {
            padding: 12px 18px;
            font-size: 13px;
            color: #374151;
        }

        /* ── Avatar ── */
        .avatar-sm {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3b82f6, #6366f1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
            font-size: 13px;
            flex-shrink: 0;
        }

        /* ── Status badge ── */
        .s-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 10px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.02em;
        }

        .s-done {
            background: #dcfce7;
            color: #15803d;
        }

        .s-none {
            background: #f1f5f9;
            color: #94a3b8;
        }

        /* ── Link chip ── */
        .link-chip {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: #dbeafe;
            color: #1e40af;
            padding: 3px 10px;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 600;
            text-decoration: none;
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            transition: background .15s ease;
        }

        .link-chip:hover {
            background: #bfdbfe;
        }

        /* ── Photo button ── */
        .btn-photo {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: linear-gradient(135deg, #3b82f6, #6366f1);
            color: #fff;
            font-size: 11px;
            font-weight: 700;
            padding: 5px 12px;
            border-radius: 8px;
            text-decoration: none;
            transition: all .2s ease;
            box-shadow: 0 2px 6px rgba(99, 102, 241, .25);
        }

        .btn-photo:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(99, 102, 241, .35);
        }

        /* ── Scrollbar ── */
        .panel-body::-webkit-scrollbar {
            width: 6px;
        }

        .panel-body::-webkit-scrollbar-track {
            background: transparent;
        }

        .panel-body::-webkit-scrollbar-thumb {
            background: #c7d2fe;
            border-radius: 3px;
        }

        .panel-body::-webkit-scrollbar-thumb:hover {
            background: #a5b4fc;
        }

        /* ── Fade-in ── */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(14px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .a1 {
            animation: fadeUp .5s ease both;
        }

        .a2 {
            animation: fadeUp .5s .08s ease both;
        }

        .a3 {
            animation: fadeUp .5s .16s ease both;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px;
        }

        .desktop-table-wrap {
            overflow-x: auto;
        }

        .mobile-cards {
            display: none;
        }

        .mobile-card {
            border: 1px solid #e8eeff;
            background: #f8faff;
            border-radius: 14px;
            padding: 12px;
        }

        .mobile-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 8px;
            margin-top: 10px;
        }

        .mobile-item-label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: .08em;
            color: #94a3b8;
            font-weight: 700;
            display: block;
            margin-bottom: 2px;
        }

        .pagination-row {
            margin-top: 20px;
            padding-top: 16px;
            border-top: 1px solid #e8eeff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
        }

        @media (max-width: 768px) {
            .panel-body {
                padding: 16px;
            }

            .panel-header {
                flex-wrap: wrap;
                align-items: flex-start;
                gap: 8px;
            }

            .panel-header span {
                margin-left: 0 !important;
            }

            .hero-actions {
                flex-direction: column;
                align-items: stretch;
                width: 100%;
            }

            .hero-actions a {
                max-width: none !important;
                justify-content: center;
            }

            .desktop-table-wrap {
                display: none;
            }

            .mobile-cards {
                display: block;
            }

            .pagination-row {
                flex-direction: column;
                align-items: stretch;
            }

            .pagination-row>p {
                text-align: center;
            }

            .pagination-row>div {
                justify-content: center;
            }
        }
    </style>
@endpush

@section('content')
    <div class="dash-bg py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- ── HERO HEADER ── --}}
            <div class="hero-strip shadow-xl a1">
                <div class="relative z-10 px-6 py-7 flex flex-col sm:flex-row items-center sm:items-start gap-5">

                    {{-- Icon --}}
                    <div style="background:rgba(255,255,255,0.15);border-radius:50%;padding:3px;flex-shrink:0;">
                        <div
                            style="width:72px;height:72px;background:linear-gradient(135deg,#6366f1,#8b5cf6);border-radius:50%;display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-book-open text-white text-2xl"></i>
                        </div>
                    </div>

                    {{-- Info --}}
                    <div class="flex-1 text-center sm:text-left" style="min-width:0;">
                        <h1 class="text-xl font-bold text-white mb-1 leading-snug" style="word-break:break-word;">
                            {{ $micro->judul_micro }}
                        </h1>
                        <p class="text-blue-200 text-sm mb-2">
                            Daftar peserta yang mengerjakan mikro skill ini
                        </p>

                        {{-- Link & breadcrumb --}}
                        <div class="hero-actions">
                            <a href="{{ route('mentor.microskill.index') }}"
                                style="display:inline-flex;align-items:center;gap:6px;background:rgba(255,255,255,0.15);color:#e0e7ff;font-size:12px;font-weight:600;padding:4px 14px;border-radius:999px;text-decoration:none;transition:background .2s;"
                                onmouseover="this.style.background='rgba(255,255,255,0.25)'"
                                onmouseout="this.style.background='rgba(255,255,255,0.15)'">
                                <i class="fas fa-arrow-left" style="font-size:10px;"></i> Kembali
                            </a>
                            @if ($micro->link_micro)
                                <a href="{{ $micro->link_micro }}" target="_blank"
                                    style="display:inline-flex;align-items:center;gap:6px;background:rgba(255,255,255,0.15);color:#e0e7ff;font-size:12px;font-weight:600;padding:4px 14px;border-radius:999px;text-decoration:none;transition:background .2s;max-width:240px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"
                                    onmouseover="this.style.background='rgba(255,255,255,0.25)'"
                                    onmouseout="this.style.background='rgba(255,255,255,0.15)'">
                                    <i class="fas fa-external-link-alt" style="font-size:10px;flex-shrink:0;"></i>
                                    {{ $micro->link_micro }}
                                </a>
                            @endif
                        </div>
                    </div>

                    {{-- Total count --}}
                    <div class="text-center sm:text-right flex-shrink-0">
                        <p class="text-blue-300 text-xs font-semibold uppercase tracking-widest mb-1">Total Peserta</p>
                        <p class="text-5xl font-extrabold text-white mono">{{ $submissions->total() }}</p>
                        <p class="text-blue-300 text-xs mt-0.5">pengerjaan tercatat</p>
                    </div>
                </div>
            </div>

            {{-- ── SUBMISSIONS TABLE ── --}}
            <div class="panel a2">
                <div class="panel-header">
                    <i class="fas fa-users text-blue-200 text-base"></i>
                    <h2>Data Peserta</h2>
                    <span
                        style="margin-left:auto;background:rgba(255,255,255,0.15);color:#fff;font-size:11px;font-weight:700;padding:2px 10px;border-radius:999px;">
                        {{ $submissions->total() }} peserta
                    </span>
                </div>
                <div class="panel-body">
                    <p class="sec-label">Riwayat pengerjaan mikro skill</p>

                    <div class="desktop-table-wrap">
                        <table class="att-table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Institusi</th>
                                    <th>Dikirim</th>
                                    <th>Status</th>
                                    <th>Bukti Foto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($submissions as $s)
                                    <tr class="att-tr">
                                        {{-- Nama --}}
                                        <td>
                                            <div style="display:flex;align-items:center;gap:10px;">
                                                <div class="avatar-sm">
                                                    {{ strtoupper(substr($s->intern->name, 0, 1)) }}
                                                </div>
                                                <span style="font-weight:600;color:#1e293b;">{{ $s->intern->name }}</span>
                                            </div>
                                        </td>

                                        {{-- Institusi --}}
                                        <td style="color:#64748b;">
                                            {{ $s->intern->institution ?? '—' }}
                                        </td>

                                        {{-- Tanggal dikirim --}}
                                        <td class="mono" style="font-size:12px;white-space:nowrap;">
                                            @if ($s->submitted_at)
                                                {{ \Carbon\Carbon::parse($s->submitted_at)->translatedFormat('d M Y, H:i') }}
                                            @else
                                                <span style="color:#d1d5db;">—</span>
                                            @endif
                                        </td>

                                        {{-- Status --}}
                                        <td>
                                            @if ($s->submitted_at)
                                                <span class="s-badge s-done">
                                                    <i class="fas fa-check-circle" style="font-size:10px;"></i> Selesai
                                                </span>
                                            @else
                                                <span class="s-badge s-none">
                                                    <i class="fas fa-minus-circle" style="font-size:10px;"></i> Belum
                                                </span>
                                            @endif
                                        </td>

                                        {{-- Bukti foto --}}
                                        <td>
                                            @if ($s->photo_path)
                                                @php $microSkillFilename = basename($s->photo_path); @endphp
                                                @php $microSkillUrl = URL::temporarySignedRoute('mentor.microskill.photo', now()->addMinutes(5), ['filename' => $microSkillFilename]); @endphp
                                                @can('view', $s)
                                                    <a href="{{ $microSkillUrl }}" target="_blank" class="btn-photo">
                                                        <i class="fas fa-image" style="font-size:10px;"></i> Lihat
                                                    </a>
                                                @else
                                                    <span style="color:#d1d5db;font-size:12px;">Tidak ada akses</span>
                                                @endcan
                                            @else
                                                <span style="color:#d1d5db;font-size:12px;">—</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" style="padding:48px;text-align:center;color:#94a3b8;">
                                            <i class="fas fa-inbox"
                                                style="font-size:36px;display:block;margin-bottom:10px;opacity:.4;"></i>
                                            <p style="font-size:14px;font-weight:600;color:#64748b;margin-bottom:4px;">Belum
                                                ada peserta</p>
                                            <p style="font-size:12px;">Belum ada peserta yang mengerjakan mikro skill ini
                                            </p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mobile-cards">
                        @forelse($submissions as $s)
                            <div class="mobile-card {{ !$loop->first ? 'mt-3' : '' }}">
                                <div style="display:flex;align-items:center;gap:10px;">
                                    <div class="avatar-sm">
                                        {{ strtoupper(substr($s->intern->name, 0, 1)) }}
                                    </div>
                                    <div style="min-width:0;flex:1;">
                                        <p
                                            style="margin:0;font-size:13px;font-weight:700;color:#1e293b;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                                            {{ $s->intern->name }}
                                        </p>
                                        <p
                                            style="margin:0;font-size:12px;color:#64748b;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                                            {{ $s->intern->institution ?? '—' }}
                                        </p>
                                    </div>
                                </div>

                                <div class="mobile-grid">
                                    <div>
                                        <span class="mobile-item-label">Dikirim</span>
                                        <div class="mono" style="font-size:12px;color:#374151;">
                                            @if ($s->submitted_at)
                                                {{ \Carbon\Carbon::parse($s->submitted_at)->translatedFormat('d M Y, H:i') }}
                                            @else
                                                <span style="color:#d1d5db;">—</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div>
                                        <span class="mobile-item-label">Status</span>
                                        @if ($s->submitted_at)
                                            <span class="s-badge s-done">
                                                <i class="fas fa-check-circle" style="font-size:10px;"></i> Selesai
                                            </span>
                                        @else
                                            <span class="s-badge s-none">
                                                <i class="fas fa-minus-circle" style="font-size:10px;"></i> Belum
                                            </span>
                                        @endif
                                    </div>

                                    <div>
                                        <span class="mobile-item-label">Bukti Foto</span>
                                        @if ($s->photo_path)
                                            @php
                                                $photoUrl = URL::temporarySignedRoute(
                                                    'mentor.microskill.photo',
                                                    now()->addMinutes(5),
                                                    ['filename' => basename($s->photo_path)],
                                                );
                                            @endphp
                                            @can('view', $s)
                                                <a href="{{ $photoUrl }}" target="_blank" class="btn-photo">
                                                    <i class="fas fa-image" style="font-size:10px;"></i> Lihat
                                                </a>
                                            @else
                                                <span style="color:#d1d5db;font-size:12px;">Tidak ada akses</span>
                                            @endcan
                                        @else
                                            <span style="color:#d1d5db;font-size:12px;">—</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div style="padding:20px 10px;text-align:center;color:#94a3b8;">
                                <i class="fas fa-inbox"
                                    style="font-size:32px;display:block;margin-bottom:10px;opacity:.4;"></i>
                                <p style="font-size:14px;font-weight:600;color:#64748b;margin-bottom:4px;">Belum ada peserta
                                </p>
                                <p style="font-size:12px;">Belum ada peserta yang mengerjakan mikro skill ini</p>
                            </div>
                        @endforelse
                    </div>

                    {{-- ── Pagination ── --}}
                    @if ($submissions->hasPages())
                        <div class="pagination-row">
                            <p style="font-size:12px;color:#94a3b8;">
                                Menampilkan {{ $submissions->firstItem() }}–{{ $submissions->lastItem() }} dari
                                {{ $submissions->total() }} peserta
                            </p>
                            <div style="display:flex;gap:6px;flex-wrap:wrap;">

                                {{-- Prev --}}
                                @if ($submissions->onFirstPage())
                                    <span
                                        style="display:inline-flex;align-items:center;gap:4px;padding:6px 12px;background:#f1f5f9;border:1px solid #e8eeff;border-radius:8px;font-size:12px;font-weight:600;color:#cbd5e1;cursor:not-allowed;">
                                        <i class="fas fa-chevron-left"></i> Prev
                                    </span>
                                @else
                                    <a href="{{ $submissions->previousPageUrl() }}"
                                        style="display:inline-flex;align-items:center;gap:4px;padding:6px 12px;background:#f1f5f9;border:1px solid #e8eeff;border-radius:8px;font-size:12px;font-weight:600;color:#1e40af;text-decoration:none;transition:all .2s;"
                                        onmouseover="this.style.background='#dbeafe';this.style.borderColor='#bfdbfe';"
                                        onmouseout="this.style.background='#f1f5f9';this.style.borderColor='#e8eeff';">
                                        <i class="fas fa-chevron-left"></i> Prev
                                    </a>
                                @endif

                                {{-- Page numbers --}}
                                @foreach ($submissions->getUrlRange(max(1, $submissions->currentPage() - 2), min($submissions->lastPage(), $submissions->currentPage() + 2)) as $page => $url)
                                    @if ($page === $submissions->currentPage())
                                        <button
                                            style="display:inline-flex;align-items:center;padding:6px 12px;background:#3b4fd8;border:1px solid #3b4fd8;border-radius:8px;font-size:12px;font-weight:700;color:#fff;cursor:pointer;">
                                            {{ $page }}
                                        </button>
                                    @else
                                        <a href="{{ $url }}"
                                            style="display:inline-flex;align-items:center;padding:6px 12px;background:#f1f5f9;border:1px solid #e8eeff;border-radius:8px;font-size:12px;font-weight:600;color:#1e40af;text-decoration:none;transition:all .2s;"
                                            onmouseover="this.style.background='#dbeafe';this.style.borderColor='#bfdbfe';"
                                            onmouseout="this.style.background='#f1f5f9';this.style.borderColor='#e8eeff';">
                                            {{ $page }}
                                        </a>
                                    @endif
                                @endforeach

                                {{-- Next --}}
                                @if ($submissions->hasMorePages())
                                    <a href="{{ $submissions->nextPageUrl() }}"
                                        style="display:inline-flex;align-items:center;gap:4px;padding:6px 12px;background:#f1f5f9;border:1px solid #e8eeff;border-radius:8px;font-size:12px;font-weight:600;color:#1e40af;text-decoration:none;transition:all .2s;"
                                        onmouseover="this.style.background='#dbeafe';this.style.borderColor='#bfdbfe';"
                                        onmouseout="this.style.background='#f1f5f9';this.style.borderColor='#e8eeff';">
                                        Next <i class="fas fa-chevron-right"></i>
                                    </a>
                                @else
                                    <span
                                        style="display:inline-flex;align-items:center;gap:4px;padding:6px 12px;background:#f1f5f9;border:1px solid #e8eeff;border-radius:8px;font-size:12px;font-weight:600;color:#cbd5e1;cursor:not-allowed;">
                                        Next <i class="fas fa-chevron-right"></i>
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
