@extends('layouts.app')

@section('title', 'Leaderboard Mikro Skill - Sistem Magang')

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

        /* ── Podium rows ── */
        .podium-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 18px;
            border-radius: 16px;
            border: 1.5px solid transparent;
            transition: all .2s ease;
        }

        .podium-item:hover {
            transform: translateX(5px);
        }

        .podium-1 {
            background: linear-gradient(100deg, #fffbeb, #fef3c7);
            border-color: #fde68a;
        }

        .podium-2 {
            background: linear-gradient(100deg, #f8fafc, #f1f5f9);
            border-color: #e2e8f0;
        }

        .podium-3 {
            background: linear-gradient(100deg, #fff7ed, #ffedd5);
            border-color: #fed7aa;
        }

        .podium-default {
            background: #f8faff;
            border-color: #e8eeff;
        }

        .podium-default:hover {
            background: #eff2ff;
            border-color: #c7d2fe;
        }

        .rank-badge {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 14px;
            flex-shrink: 0;
        }

        .rank-1 {
            background: linear-gradient(135deg, #fbbf24, #d97706);
            color: #fff;
            box-shadow: 0 3px 10px rgba(251, 191, 36, .4);
        }

        .rank-2 {
            background: linear-gradient(135deg, #94a3b8, #64748b);
            color: #fff;
            box-shadow: 0 3px 10px rgba(100, 116, 139, .3);
        }

        .rank-3 {
            background: linear-gradient(135deg, #fb923c, #ea580c);
            color: #fff;
            box-shadow: 0 3px 10px rgba(251, 146, 60, .35);
        }

        .rank-n {
            background: linear-gradient(135deg, #3b82f6, #6366f1);
            color: #fff;
        }

        /* ── Score pill ── */
        .score-pill {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            background: #e0e7ff;
            color: #3730a3;
            padding: 4px 14px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
            font-family: 'DM Mono', monospace;
            flex-shrink: 0;
        }

        .score-pill-1 {
            background: #fef3c7;
            color: #92400e;
        }

        .score-pill-2 {
            background: #f1f5f9;
            color: #475569;
        }

        .score-pill-3 {
            background: #ffedd5;
            color: #9a3412;
        }

        /* ── Avatar ── */
        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .12);
            flex-shrink: 0;
            cursor: pointer;
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .avatar:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 14px rgba(0, 0, 0, .2);
        }

        .avatar-placeholder {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3b82f6, #6366f1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
            font-size: 16px;
            border: 2px solid #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .1);
            flex-shrink: 0;
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

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px;
        }

        .podium-info {
            flex: 1;
            min-width: 0;
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
                width: 100%;
                flex-direction: column;
                align-items: stretch;
            }

            .hero-actions a {
                justify-content: center;
                max-width: none !important;
            }

            .podium-item {
                flex-wrap: wrap;
                align-items: flex-start;
                gap: 10px;
                padding: 12px;
            }

            .podium-info {
                width: calc(100% - 52px);
            }

            .score-pill {
                margin-left: 52px;
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

        @media (max-width: 480px) {
            .score-pill {
                font-size: 11px;
                padding: 4px 10px;
            }

            .rank-badge,
            .avatar,
            .avatar-placeholder {
                width: 34px;
                height: 34px;
            }

            .avatar-placeholder {
                font-size: 13px;
            }
        }
    </style>
@endpush

@section('content')
    <div class="dash-bg py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- ── HERO HEADER ── --}}
            <div class="hero-strip shadow-xl a1">
                <div class="relative z-10 px-6 py-7 flex flex-col sm:flex-row items-center sm:items-start gap-5">

                    {{-- Icon --}}
                    <div style="background:rgba(255,255,255,0.15);border-radius:50%;padding:3px;flex-shrink:0;">
                        <div
                            style="width:72px;height:72px;background:linear-gradient(135deg,#fbbf24,#d97706);border-radius:50%;display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-trophy text-white text-2xl"></i>
                        </div>
                    </div>

                    {{-- Title --}}
                    <div class="flex-1 text-center sm:text-left">
                        <h1 class="text-xl font-bold text-white mb-1">Leaderboard Mikro Skill</h1>
                        <p class="text-blue-200 text-sm">Peringkat pencapaian keterampilan anak magang bimbingan Anda &mdash;
                            <span class="text-white font-semibold">{{ now()->translatedFormat('l, d F Y') }}</span>
                        </p>
                        <div class="hero-actions mt-2">
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
                        <p class="text-blue-300 text-xs font-semibold uppercase tracking-widest mb-1">Total Peserta</p>
                        <p class="text-5xl font-extrabold text-white mono">{{ $rows->total() }}</p>
                        <p class="text-blue-300 text-xs mt-0.5">anak magang</p>
                    </div>
                </div>
            </div>

            {{-- ── LEADERBOARD PANEL ── --}}
            <div class="panel a2">
                <div class="panel-header">
                    <i class="fas fa-trophy text-yellow-300 text-base"></i>
                    <h2>Peringkat Mikro Skill</h2>
                    <span
                        style="margin-left:auto;background:rgba(255,255,255,0.15);color:#fff;font-size:11px;font-weight:700;padding:2px 10px;border-radius:999px;">
                        {{ $rows->total() }} peserta
                    </span>
                </div>
                <div class="panel-body">
                    <p class="sec-label">Anak magang dengan pencapaian terbaik</p>

                    @forelse($rows as $index => $row)
                        @php
                            $actualRank = $rows->firstItem() + $index;
                            $podiumClass = match (true) {
                                $actualRank === 1 => 'podium-1',
                                $actualRank === 2 => 'podium-2',
                                $actualRank === 3 => 'podium-3',
                                default => 'podium-default',
                            };
                            $rankClass = match (true) {
                                $actualRank === 1 => 'rank-1',
                                $actualRank === 2 => 'rank-2',
                                $actualRank === 3 => 'rank-3',
                                default => 'rank-n',
                            };
                            $scoreClass = match (true) {
                                $actualRank === 1 => 'score-pill score-pill-1',
                                $actualRank === 2 => 'score-pill score-pill-2',
                                $actualRank === 3 => 'score-pill score-pill-3',
                                default => 'score-pill',
                            };
                        @endphp

                        <div class="podium-item {{ $podiumClass }} {{ !$loop->first ? 'mt-3' : '' }}">

                            {{-- Rank badge --}}
                            <div class="rank-badge {{ $rankClass }}">
                                @if ($actualRank <= 3)
                                    <i class="fas fa-trophy" style="font-size:13px;"></i>
                                @else
                                    {{ $actualRank }}
                                @endif
                            </div>

                            {{-- Photo --}}
                            @if (!empty($row->photo_path))
                                <img src="{{ asset('storage/' . $row->photo_path) }}" class="avatar"
                                    alt="{{ $row->name }}"
                                    onclick="window.open('{{ asset('storage/' . $row->photo_path) }}', '_blank')"
                                    title="Klik untuk melihat full size">
                            @else
                                <div class="avatar-placeholder">
                                    {{ strtoupper(substr($row->name, 0, 1)) }}
                                </div>
                            @endif

                            {{-- Info --}}
                            <div class="podium-info">
                                <p
                                    style="font-size:14px;font-weight:700;color:#1e293b;margin:0 0 2px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                                    {{ $row->name }}
                                </p>
                                <p
                                    style="font-size:12px;color:#64748b;margin:0;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                                    {{ $row->institution }}
                                </p>
                            </div>

                            {{-- Score --}}
                            <span class="{{ $scoreClass }}">
                                <i class="fas fa-star" style="font-size:10px;"></i>
                                {{ $row->total }}
                            </span>
                        </div>

                    @empty
                        <div style="text-align:center;padding:48px 24px;color:#94a3b8;">
                            <i class="fas fa-chart-line"
                                style="font-size:40px;display:block;margin-bottom:12px;opacity:.3;"></i>
                            <p style="font-size:14px;font-weight:600;color:#64748b;margin-bottom:4px;">Belum ada data
                                leaderboard</p>
                            <p style="font-size:12px;color:#94a3b8;">Data akan muncul ketika anak magang mulai menyelesaikan
                                course</p>
                        </div>
                    @endforelse

                    {{-- ── Pagination ── --}}
                    @if ($rows->hasPages())
                        <div class="pagination-row">
                            <p style="font-size:12px;color:#94a3b8;">
                                Menampilkan {{ $rows->firstItem() }}–{{ $rows->lastItem() }} dari {{ $rows->total() }}
                                peserta
                            </p>
                            <div style="display:flex;gap:6px;flex-wrap:wrap;">

                                {{-- Prev --}}
                                @if ($rows->onFirstPage())
                                    <span
                                        style="display:inline-flex;align-items:center;gap:4px;padding:6px 12px;background:#f1f5f9;border:1px solid #e8eeff;border-radius:8px;font-size:12px;font-weight:600;color:#cbd5e1;cursor:not-allowed;">
                                        <i class="fas fa-chevron-left"></i> Prev
                                    </span>
                                @else
                                    <a href="{{ $rows->previousPageUrl() }}"
                                        style="display:inline-flex;align-items:center;gap:4px;padding:6px 12px;background:#f1f5f9;border:1px solid #e8eeff;border-radius:8px;font-size:12px;font-weight:600;color:#1e40af;text-decoration:none;transition:all .2s;"
                                        onmouseover="this.style.background='#dbeafe';this.style.borderColor='#bfdbfe';"
                                        onmouseout="this.style.background='#f1f5f9';this.style.borderColor='#e8eeff';">
                                        <i class="fas fa-chevron-left"></i> Prev
                                    </a>
                                @endif

                                {{-- Page numbers --}}
                                @foreach ($rows->getUrlRange(max(1, $rows->currentPage() - 2), min($rows->lastPage(), $rows->currentPage() + 2)) as $page => $url)
                                    @if ($page === $rows->currentPage())
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
                                @if ($rows->hasMorePages())
                                    <a href="{{ $rows->nextPageUrl() }}"
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
