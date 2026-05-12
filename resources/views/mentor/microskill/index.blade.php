@extends('layouts.app')

@section('title', 'Mikro Skill - Sistem Magang')

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

        /* ── Page background ── */
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

        /* ── Filter panel ── */
        .filter-panel {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 1px 3px rgba(20, 40, 120, 0.06), 0 4px 18px rgba(20, 40, 120, 0.06);
            overflow: hidden;
        }

        .filter-header {
            background: linear-gradient(100deg, #1e3a8a 0%, #3b4fd8 100%);
            padding: 14px 22px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .filter-header h2 {
            color: #fff;
            font-size: 14px;
            font-weight: 700;
            margin: 0;
        }

        /* ── Filter input ── */
        .filter-input {
            width: 100%;
            padding: 10px 16px 10px 40px;
            border: 1.5px solid #e8eeff;
            border-radius: 12px;
            font-size: 13px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #374151;
            background: #f8faff;
            transition: all .2s ease;
            outline: none;
        }

        .filter-input:focus {
            border-color: #6366f1;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.12);
        }

        .filter-input::placeholder {
            color: #94a3b8;
        }

        /* ── Buttons ── */
        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: linear-gradient(100deg, #1e3a8a, #3b4fd8);
            color: #fff;
            font-size: 13px;
            font-weight: 700;
            padding: 10px 22px;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            transition: all .2s ease;
            box-shadow: 0 3px 12px rgba(59, 79, 216, .25);
            white-space: nowrap;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(59, 79, 216, .35);
        }

        .btn-reset {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            background: #e8eeff;
            color: #3b4fd8;
            font-size: 13px;
            font-weight: 700;
            padding: 10px 16px;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            transition: all .2s ease;
            white-space: nowrap;
        }

        .btn-reset:hover {
            background: #c7d2fe;
            transform: translateY(-1px);
        }

        .filter-form-row {
            display: flex;
            gap: 10px;
            align-items: flex-end;
        }

        .filter-form-actions {
            display: inline-flex;
            gap: 10px;
            align-items: center;
            flex-shrink: 0;
        }

        /* ── Skill row ── */
        .skill-row {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 16px;
            border-radius: 14px;
            background: #f8faff;
            border: 1px solid #e8eeff;
            transition: all .2s ease;
            text-decoration: none;
        }

        .skill-row:hover {
            background: #eff2ff;
            border-color: #c7d2fe;
            transform: translateX(4px);
            box-shadow: 0 4px 12px rgba(99, 102, 241, .1);
        }

        .skill-meta {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            flex-shrink: 0;
        }

        .skill-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 18px;
            flex-shrink: 0;
        }

        /* ── Count pill ── */
        .count-pill {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: #ede9fe;
            color: #5b21b6;
            padding: 4px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
            font-family: 'DM Mono', monospace;
            flex-shrink: 0;
        }

        /* ── Detail button ── */
        .btn-detail {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: linear-gradient(135deg, #3b82f6, #6366f1);
            color: #fff;
            font-size: 12px;
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 8px;
            text-decoration: none;
            transition: all .2s ease;
            flex-shrink: 0;
            box-shadow: 0 2px 6px rgba(99, 102, 241, .25);
        }

        .btn-detail:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(99, 102, 241, .35);
        }

        /* ── Link display ── */
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
            max-width: 220px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            transition: background .15s ease;
        }

        .link-chip:hover {
            background: #bfdbfe;
        }

        /* ── Empty state ── */
        .empty-state {
            text-align: center;
            padding: 48px 24px;
            color: #94a3b8;
        }

        /* ── Pagination override ── */
        .pagination-wrap nav {
            display: flex;
            justify-content: center;
            margin-top: 16px;
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

        /* ── Fade-in animations ── */
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

        /* ── Active query indicator ── */
        .query-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255, 255, 255, 0.18);
            color: #fff;
            font-size: 12px;
            font-weight: 600;
            padding: 3px 12px;
            border-radius: 999px;
            margin-left: auto;
        }

        @media (max-width: 768px) {
            .panel-body {
                padding: 16px;
            }

            .filter-form-row {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-form-actions {
                width: 100%;
            }

            .filter-form-actions .btn-primary,
            .filter-form-actions .btn-reset {
                flex: 1;
                justify-content: center;
                padding: 10px 12px;
            }

            .skill-row {
                flex-wrap: wrap;
                align-items: flex-start;
                gap: 10px;
            }

            .skill-meta {
                width: 100%;
                justify-content: space-between;
                padding-left: 58px;
            }

            .link-chip {
                max-width: 100%;
            }

            .query-badge {
                margin-left: 0;
                margin-top: 6px;
            }
        }

        @media (max-width: 480px) {

            .btn-primary,
            .btn-reset,
            .btn-detail {
                font-size: 12px;
            }

            .count-pill {
                font-size: 11px;
                padding: 4px 10px;
            }
        }
    </style>
@endpush

@section('content')
    <div class="dash-bg py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- ── HERO HEADER ──────────────────────────────── --}}
            <div class="hero-strip shadow-xl a1">
                <div class="relative z-10 px-6 py-7 flex flex-col sm:flex-row items-center sm:items-start gap-5">

                    {{-- Icon --}}
                    <div style="background:rgba(255,255,255,0.15);border-radius:50%;padding:3px;flex-shrink:0;">
                        <div
                            style="width:72px;height:72px;background:linear-gradient(135deg,#818cf8,#8b5cf6);border-radius:50%;display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-graduation-cap text-white text-2xl"></i>
                        </div>
                    </div>

                    {{-- Identity --}}
                    <div class="flex-1 text-center sm:text-left">
                        <h1 class="text-xl font-bold text-white mb-1">Mikro Skill Intern</h1>
                        <p class="text-blue-200 text-sm">Monitoring mikro skill anak magang &mdash; <span
                                class="text-white font-semibold">{{ \Carbon\Carbon::today()->locale('id')->translatedFormat('l, d F Y') }}</span></p>
                        <div class="mt-2">
                            <a href="{{ route('mentor.dashboard') }}"
                                style="display:inline-flex;align-items:center;gap:6px;background:rgba(255,255,255,0.15);color:#e0e7ff;font-size:12px;font-weight:600;padding:4px 14px;border-radius:999px;text-decoration:none;transition:background .2s;"
                                onmouseover="this.style.background='rgba(255,255,255,0.25)'"
                                onmouseout="this.style.background='rgba(255,255,255,0.15)'">
                                <i class="fas fa-arrow-left" style="font-size:10px;"></i> Kembali ke Dashboard
                            </a>
                        </div>
                    </div>

                    {{-- Total count --}}
                    <div class="text-center sm:text-right flex-shrink-0">
                        <p class="text-blue-300 text-xs font-semibold uppercase tracking-widest mb-1">Total Mikro Skill</p>
                        <p class="text-5xl font-extrabold text-white mono">{{ $microskills->total() }}</p>
                        <p class="text-blue-300 text-xs mt-0.5">item terdaftar</p>
                    </div>
                </div>
            </div>

            {{-- ── FILTER ─────────────────────────────────── --}}
            <div class="filter-panel a2">
                <div class="filter-header">
                    <i class="fas fa-search text-blue-200 text-sm"></i>
                    <h2>Cari Mikro Skill</h2>
                    @if (request()->filled('q'))
                        <span class="query-badge">
                            <i class="fas fa-tag" style="font-size:10px;"></i>
                            "{{ request('q') }}"
                        </span>
                    @endif
                </div>
                <div class="panel-body">
                    <form method="GET" action="{{ route('mentor.microskill.index') }}">
                        <div class="filter-form-row">
                            <div style="flex:1;position:relative;">
                                <i class="fas fa-search"
                                    style="position:absolute;left:14px;top:50%;transform:translateY(-50%);color:#94a3b8;font-size:13px;pointer-events:none;"></i>
                                <input type="text" name="q" value="{{ request('q') }}" class="filter-input"
                                    placeholder="Ketik judul mikro skill untuk mencari..." autocomplete="off" />
                            </div>
                            <div class="filter-form-actions">
                                <button type="submit" class="btn-primary">
                                    <i class="fas fa-search"></i> Filter
                                </button>
                                @if (request()->filled('q'))
                                    <a href="{{ route('mentor.microskill.index') }}" class="btn-reset">
                                        <i class="fas fa-times"></i> Reset
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- ── SKILL LIST ─────────────────────────────── --}}
            <div class="panel a3">
                <div class="panel-header">
                    <i class="fas fa-star text-yellow-300 text-base"></i>
                    <h2>Data Mikro Skill</h2>
                    <span
                        style="margin-left:auto;background:rgba(255,255,255,0.15);color:#fff;font-size:11px;font-weight:700;padding:2px 10px;border-radius:999px;">
                        {{ $microskills->total() }} item
                    </span>
                </div>
                <div class="panel-body">
                    <p class="sec-label">Daftar Mikro Skill &amp; Jumlah Pengerjaan</p>

                    @if ($microskills->count())
                        <div class="space-y-3">
                            @foreach ($microskills as $index => $m)
                                <div class="skill-row"
                                    onmouseover="this.style.background='#eff2ff';this.style.borderColor='#c7d2fe';this.style.transform='translateX(4px)';"
                                    onmouseout="this.style.background='#f8faff';this.style.borderColor='#e8eeff';this.style.transform='none';">

                                    {{-- Icon --}}
                                    <div
                                        style="width:44px;height:44px;border-radius:12px;background:linear-gradient(135deg,#6366f1,#8b5cf6);display:flex;align-items:center;justify-content:center;color:#fff;font-size:18px;flex-shrink:0;">
                                        <i class="fas fa-book-open"></i>
                                    </div>

                                    {{-- Info --}}
                                    <div style="flex:1;min-width:0;">
                                        <p
                                            style="font-size:14px;font-weight:700;color:#1e293b;margin:0 0 4px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                                            {{ $m->judul_micro }}
                                        </p>
                                        @if ($m->link_micro)
                                            <a href="{{ $m->link_micro }}" target="_blank" class="link-chip">
                                                <i class="fas fa-external-link-alt" style="font-size:9px;"></i>
                                                {{ $m->link_micro }}
                                            </a>
                                        @else
                                            <span style="font-size:12px;color:#d1d5db;">Tidak ada link</span>
                                        @endif
                                    </div>

                                    <div class="skill-meta">
                                        {{-- Count --}}
                                        <span class="count-pill">
                                            <i class="fas fa-users" style="font-size:10px;"></i>
                                            {{ $m->total }}
                                        </span>

                                        {{-- Detail button --}}
                                        <a href="{{ route('mentor.microskill.show', ['id' => $m->id]) }}"
                                            class="btn-detail">
                                            Detail <i class="fas fa-arrow-right" style="font-size:10px;"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Pagination --}}
                        @if ($microskills->hasPages())
                            <div style="margin-top:20px;padding-top:16px;border-top:1px solid #e8eeff;">
                                <div
                                    style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:10px;">
                                    <p style="font-size:12px;color:#94a3b8;">
                                        Menampilkan {{ $microskills->firstItem() }}–{{ $microskills->lastItem() }} dari
                                        {{ $microskills->total() }} item
                                    </p>
                                    <div style="display:flex;gap:6px;flex-wrap:wrap;">
                                        {{-- Prev --}}
                                        @if ($microskills->onFirstPage())
                                            <span
                                                style="display:inline-flex;align-items:center;gap:4px;padding:6px 12px;background:#f1f5f9;border:1px solid #e8eeff;border-radius:8px;font-size:12px;font-weight:600;color:#cbd5e1;cursor:not-allowed;">
                                                <i class="fas fa-chevron-left"></i> Prev
                                            </span>
                                        @else
                                            <a href="{{ $microskills->previousPageUrl() }}"
                                                style="display:inline-flex;align-items:center;gap:4px;padding:6px 12px;background:#f1f5f9;border:1px solid #e8eeff;border-radius:8px;font-size:12px;font-weight:600;color:#1e40af;text-decoration:none;transition:all .2s;"
                                                onmouseover="this.style.background='#dbeafe';this.style.borderColor='#bfdbfe';"
                                                onmouseout="this.style.background='#f1f5f9';this.style.borderColor='#e8eeff';">
                                                <i class="fas fa-chevron-left"></i> Prev
                                            </a>
                                        @endif

                                        {{-- Page numbers --}}
                                        @foreach ($microskills->getUrlRange(max(1, $microskills->currentPage() - 2), min($microskills->lastPage(), $microskills->currentPage() + 2)) as $page => $url)
                                            @if ($page === $microskills->currentPage())
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
                                        @if ($microskills->hasMorePages())
                                            <a href="{{ $microskills->nextPageUrl() }}"
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
                            </div>
                        @endif
                    @else
                        <div class="empty-state">
                            <i class="fas fa-graduation-cap"
                                style="font-size:40px;display:block;margin-bottom:12px;opacity:.3;"></i>
                            <p style="font-size:14px;font-weight:600;color:#64748b;margin-bottom:4px;">
                                @if (request()->filled('q'))
                                    Tidak ada mikro skill dengan kata kunci <strong>"{{ request('q') }}"</strong>
                                @else
                                    Belum ada data mikro skill.
                                @endif
                            </p>
                            @if (request()->filled('q'))
                                <a href="{{ route('mentor.microskill.index') }}" class="btn-reset"
                                    style="display:inline-flex;margin-top:12px;">
                                    <i class="fas fa-times"></i> Hapus Filter
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
