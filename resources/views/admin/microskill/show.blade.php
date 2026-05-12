@extends('layouts.app')

@section('title', 'Daftar Peserta Micro Skill - Sistem Magang')

@push('styles')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');

        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .dash-bg {
            min-height: 100vh;
            background: linear-gradient(135deg, #e8eeff 0%, #f0f4ff 40%, #e4ecff 100%);
        }

        /* ── Hero Strip ── */
        .hero-strip {
            background: linear-gradient(100deg, #1e3a8a 0%, #3b4fd8 50%, #4f46e5 100%);
            border-radius: 20px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(20, 40, 120, 0.16);
            color: #fff;
        }

        .hero-strip::before {
            content: '';
            position: absolute;
            top: -60px;
            right: -60px;
            width: 220px;
            height: 220px;
            background: rgba(255, 255, 255, 0.06);
            border-radius: 50%;
        }

        .hero-strip::after {
            content: '';
            position: absolute;
            bottom: -80px;
            left: 30%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.04);
            border-radius: 50%;
        }

        /* ── Panel ── */
        .panel {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 1px 3px rgba(30, 58, 138, 0.06), 0 4px 20px rgba(30, 58, 138, 0.06);
            overflow: hidden;
        }

        /* ── Back button ── */
        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 0.55rem 1.25rem;
            border-radius: 0.6rem;
            background: rgba(255, 255, 255, 0.15);
            border: 1.5px solid rgba(255, 255, 255, 0.25);
            color: #fff;
            font-weight: 700;
            font-size: 14px;
            text-decoration: none;
            transition: all .2s ease;
            white-space: nowrap;
        }

        .btn-back:hover {
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.4);
            color: #fff;
            text-decoration: none;
            transform: translateY(-1px);
        }

        /* ── Count badge ── */
        .count-badge {
            font-size: 12px;
            font-weight: 600;
            padding: 3px 10px;
            border-radius: 999px;
            background: #dbeafe;
            color: #1e40af;
        }

        /* ── Table ── */
        .data-table {
            min-width: 640px;
            width: 100%;
            border-collapse: collapse;
        }

        .data-table thead tr {
            background: #eff6ff;
        }

        .data-table th {
            padding: 0.75rem 1rem;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            color: #1e3a8a;
            text-align: left;
            white-space: nowrap;
        }

        .data-table th:first-child { border-radius: 10px 0 0 10px; }
        .data-table th:last-child  { border-radius: 0 10px 10px 0; text-align: center; }

        .data-table td {
            padding: 0.85rem 1rem;
            font-size: 13px;
            color: #334155;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
        }

        .data-table tbody tr { transition: background 0.15s; }
        .data-table tbody tr:hover { background: #eff6ff; }
        .data-table tbody tr:last-child td { border-bottom: none; }

        /* ── Avatar cell ── */
        .avatar-cell { display: flex; align-items: center; gap: 10px; }

        .avatar-sm {
            width: 36px; height: 36px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #bfdbfe;
            flex-shrink: 0;
        }

        .avatar-sm-placeholder {
            width: 36px; height: 36px;
            border-radius: 50%;
            background: #dbeafe;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
            font-size: 13px;
            font-weight: 700;
            color: #2563eb;
        }

        /* ── Bukti button ── */
        .bukti-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            border-radius: 999px;
            background: #dbeafe;
            color: #1e40af;
            font-size: 11px;
            font-weight: 700;
            text-decoration: none;
            transition: all .15s ease;
        }

        .bukti-btn:hover {
            background: #bfdbfe;
            color: #1d4ed8;
            text-decoration: none;
            transform: translateY(-1px);
        }

        /* ── Empty state ── */
        .empty-state {
            padding: 40px 20px;
            text-align: center;
            color: #94a3b8;
        }

        .empty-state i { font-size: 2.5rem; display: block; margin-bottom: 10px; color: #e2e8f0; }
        .empty-state p { font-size: 13px; margin: 0; }

        @media (max-width: 768px) {
            .hero-title { font-size: 1.4rem; }
        }
    </style>
@endpush

@section('content')
    <div class="dash-bg py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto space-y-6">

            {{-- ── HERO STRIP ── --}}
            <div class="hero-strip mb-6">
                <div class="relative z-10 px-6 py-7 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <p class="text-blue-200 text-xs font-semibold uppercase tracking-widest mb-1">Micro Skill</p>
                        <h1 class="hero-title text-3xl font-bold mb-1">{{ $micro->judul_micro }}</h1>
                        <p class="text-blue-100">Daftar peserta yang telah menyelesaikan micro skill ini</p>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="{{ route('admin.microskill.index') }}" class="btn-back">
                            <i class="fas fa-arrow-left text-sm"></i>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>

            {{-- ── TABLE PANEL ── --}}
            <div class="panel overflow-hidden">
                <div class="bg-blue-600 px-6 py-4 flex items-center justify-between">
                    <h2 class="text-xl font-bold text-white flex items-center">
                        <i class="fas fa-list-check mr-3"></i>Daftar Pengumpulan
                    </h2>
                    <span class="count-badge">{{ $submissions->total() }} peserta</span>
                </div>
                <div class="p-6">
                    <div class="overflow-x-auto" style="max-height:560px;overflow-y:auto;">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Nama Peserta</th>
                                    <th>Institusi</th>
                                    <th>Dikirim</th>
                                    <th>Bukti</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100">
                                @forelse($submissions as $s)
                                    <tr>
                                        <td>
                                            <div class="avatar-cell">
                                                @if(!empty($s->intern->photo_path))
                                                    <img src="{{ url('storage/'.$s->intern->photo_path) }}"
                                                         alt="{{ $s->intern->name }}" class="avatar-sm">
                                                @else
                                                    <div class="avatar-sm-placeholder">
                                                        {{ strtoupper(substr($s->intern->name, 0, 1)) }}
                                                    </div>
                                                @endif
                                                <span class="font-semibold text-gray-900 text-sm">{{ $s->intern->name }}</span>
                                            </div>
                                        </td>
                                        <td class="text-gray-600">{{ $s->intern->institution }}</td>
                                        <td class="text-gray-500" style="font-size:12px;">
                                            {{ $s->submitted_at ? \Carbon\Carbon::parse($s->submitted_at)->format('d/m/Y H:i') : '—' }}
                                        </td>
                                        <td class="text-center">
                                            @if($s->photo_path)
                                                @php
                                                    $microSkillFilename = basename($s->photo_path);
                                                    $microSkillUrl = URL::temporarySignedRoute('admin.microskill.photo', now()->addSeconds(30), ['filename' => $microSkillFilename]);
                                                @endphp
                                                <a href="{{ $microSkillUrl }}" target="_blank" class="bukti-btn">
                                                    <i class="fas fa-image" style="font-size:10px;"></i>
                                                    Lihat Bukti
                                                </a>
                                            @else
                                                <span class="text-gray-300 text-sm">Tidak ada</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">
                                            <div class="empty-state">
                                                <i class="fas fa-inbox"></i>
                                                <p>Belum ada peserta yang mengerjakan micro skill ini.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if($submissions->hasPages())
                        <div class="mt-6">{{ $submissions->links() }}</div>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection