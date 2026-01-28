@extends('layouts.app')

@section('title', 'Detail Logbook - Sistem Magang')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-blue-100 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold bg-gradient-to-r from-green-600 to-emerald-600 bg-clip-text text-transparent mb-2">
                Detail Logbook
            </h1>
            <p class="text-gray-600">Informasi lengkap catatan harian anak magang</p>
        </div>

        <!-- Main Content Card -->
        <div class="bg-white rounded-2xl shadow-lg border border-green-100 overflow-hidden">
            <!-- Profile Section -->
            <div class="bg-gradient-to-r from-green-600 to-emerald-600 px-6 py-6">
                <div class="flex items-center">
                    @if($logbook->intern->photo_path)
                        <img src="{{ url('storage/'.$logbook->intern->photo_path) }}" 
                             class="w-16 h-16 rounded-full object-cover border-4 border-white shadow-lg mr-4" 
                             alt="{{ $logbook->intern->name }}" />
                    @else
                        <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center mr-4 shadow-lg">
                            <i class="fas fa-user text-green-600 text-2xl"></i>
                        </div>
                    @endif
                    <div class="text-white">
                        <h2 class="text-2xl font-bold">{{ $logbook->intern->name }}</h2>
                        <p class="text-green-100 flex items-center mt-1">
                            <i class="fas fa-university mr-2"></i>
                            {{ $logbook->intern->institution }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Info Section -->
            <div class="p-8">
                <!-- Date Info -->
                <div class="mb-8">
                    <div class="inline-flex items-center px-4 py-2 bg-green-50 rounded-xl border border-green-200">
                        <i class="fas fa-calendar-day text-green-600 mr-3 text-lg"></i>
                        <div>
                            <p class="text-xs text-green-600 font-medium uppercase tracking-wide">Tanggal</p>
                            <p class="text-sm font-bold text-green-900">{{ \Carbon\Carbon::parse($logbook->date)->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Activity Section -->
                <div class="mb-8">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-tasks text-green-600 text-lg"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Aktivitas</h3>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <p class="text-gray-800 whitespace-pre-line leading-relaxed">{{ $logbook->activity }}</p>
                    </div>
                </div>

                <!-- Photo Section -->
                <div class="mb-8">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-camera text-purple-600 text-lg"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Foto Dokumentasi</h3>
                    </div>
                    @if($logbook->photo_path)
                        <div class="relative group">
                            <img src="{{ url('storage/'.$logbook->photo_path) }}" 
                                 class="w-full rounded-xl border-2 border-gray-200 shadow-lg cursor-pointer hover:shadow-2xl transition-all duration-300" 
                                 alt="Foto Logbook"
                                 onclick="window.open('{{ url('storage/'.$logbook->photo_path) }}', '_blank')" />
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 rounded-xl transition-all duration-300 flex items-center justify-center">
                                <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <div class="bg-white rounded-full p-3 shadow-lg">
                                        <i class="fas fa-search-plus text-green-600 text-xl"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs text-gray-500 text-center mt-2">
                                <i class="fas fa-info-circle mr-1"></i>
                                Klik untuk melihat ukuran penuh
                            </p>
                        </div>
                    @else
                        <div class="flex flex-col items-center justify-center py-12 bg-gray-50 rounded-xl border-2 border-dashed border-gray-300">
                            <i class="fas fa-image text-5xl text-gray-300 mb-3"></i>
                            <p class="text-sm font-medium text-gray-500">Tidak ada foto.</p>
                        </div>
                    @endif
                </div>

                <!-- Back Button -->
                <div class="flex justify-between items-center pt-6 border-t border-gray-200">
                    <a href="{{ url()->previous() }}" 
                       class="inline-flex items-center px-6 py-3 bg-gray-500 text-white font-semibold rounded-xl hover:bg-gray-600 shadow-md hover:shadow-lg transition-all duration-300">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </a>
                    
                    <a href="{{ route('mentor.logbook.index') }}" 
                       class="inline-flex items-center px-6 py-3 bg-green-600 text-white font-semibold rounded-xl hover:bg-green-700 shadow-md hover:shadow-lg transition-all duration-300">
                        <i class="fas fa-list mr-2"></i>
                        Lihat Semua Logbook
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection