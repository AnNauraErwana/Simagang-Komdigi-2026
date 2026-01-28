@extends('layouts.app')

@section('title', 'Detail Anak Magang - Sistem Magang')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-700 shadow-lg rounded-lg p-6 mb-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-white mb-1">Detail Anak Magang</h1>
                <p class="text-blue-100 text-sm">Informasi lengkap profil dan aktivitas magang</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('admin.intern.edit', $intern) }}" class="bg-white hover:bg-blue-50 text-blue-700 font-bold py-2 px-5 rounded-lg shadow-md transition duration-200 transform hover:scale-105">
                    <i class="fas fa-edit mr-2"></i>Edit
                </a>
                <a href="{{ route('admin.intern.index') }}" class="bg-blue-800 hover:bg-blue-900 text-white font-bold py-2 px-5 rounded-lg shadow-md transition duration-200">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
            </div>
        </div>
    </div>

    <!-- Profile Information -->
    <div class="bg-white shadow-lg rounded-lg p-8 mb-6 border-t-4 border-blue-500">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Photo Section -->
            <div class="flex flex-col items-center">
                @if($intern->photo_path)
                    <div class="relative">
                        <img src="{{ url('storage/' . $intern->photo_path) }}" alt="{{ $intern->name }}" 
                            class="w-56 h-56 rounded-2xl object-cover border-4 border-blue-400 shadow-xl">
                        <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2">
                            <span class="px-4 py-2 rounded-full text-sm font-bold shadow-lg {{ $intern->is_active ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                                {{ $intern->is_active ? '● Aktif' : '● Tidak Aktif' }}
                            </span>
                        </div>
                    </div>
                @else
                    <div class="w-56 h-56 rounded-2xl bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center border-4 border-blue-400 shadow-xl">
                        <i class="fas fa-user text-7xl text-blue-500"></i>
                    </div>
                @endif
                
                @if($intern->team)
                    <div class="mt-6 w-full">
                        <div class="bg-blue-50 border-2 border-blue-300 rounded-lg p-4 text-center">
                            <p class="text-xs text-blue-600 font-semibold mb-1">ASSIGNED TO</p>
                            <span class="px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg text-sm font-bold inline-block">
                                {{ $intern->team }}
                            </span>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Personal Information -->
            <div class="md:col-span-2 space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="bg-blue-50 rounded-lg p-4 border-l-4 border-blue-500">
                        <label class="text-xs font-bold text-blue-600 uppercase tracking-wide">Nama Lengkap</label>
                        <p class="text-lg text-gray-900 font-semibold mt-1">{{ $intern->name }}</p>
                    </div>
                    
                    <div class="bg-blue-50 rounded-lg p-4 border-l-4 border-blue-500">
                        <label class="text-xs font-bold text-blue-600 uppercase tracking-wide">Email</label>
                        <p class="text-lg text-gray-900 font-semibold mt-1">{{ $intern->user->email }}</p>
                    </div>
                    
                    <div class="bg-blue-50 rounded-lg p-4 border-l-4 border-blue-500">
                        <label class="text-xs font-bold text-blue-600 uppercase tracking-wide">Jenis Kelamin</label>
                        <p class="text-lg text-gray-900 font-semibold mt-1">{{ $intern->gender }}</p>
                    </div>
                    
                    <div class="bg-blue-50 rounded-lg p-4 border-l-4 border-blue-500">
                        <label class="text-xs font-bold text-blue-600 uppercase tracking-wide">Nomor Telepon</label>
                        <p class="text-lg text-gray-900 font-semibold mt-1">{{ $intern->phone ?? '-' }}</p>
                    </div>
                    
                    <div class="bg-blue-50 rounded-lg p-4 border-l-4 border-blue-500">
                        <label class="text-xs font-bold text-blue-600 uppercase tracking-wide">Jenjang Pendidikan</label>
                        <p class="text-lg text-gray-900 font-semibold mt-1">{{ $intern->education_level }}</p>
                    </div>
                    
                    <div class="bg-blue-50 rounded-lg p-4 border-l-4 border-blue-500">
                        <label class="text-xs font-bold text-blue-600 uppercase tracking-wide">Jurusan</label>
                        <p class="text-lg text-gray-900 font-semibold mt-1">{{ $intern->major ?? '-' }}</p>
                    </div>
                    
                    <div class="bg-blue-50 rounded-lg p-4 border-l-4 border-blue-500 md:col-span-2">
                        <label class="text-xs font-bold text-blue-600 uppercase tracking-wide">Institusi</label>
                        <p class="text-lg text-gray-900 font-semibold mt-1">{{ $intern->institution }}</p>
                    </div>
                    
                    <div class="bg-blue-50 rounded-lg p-4 border-l-4 border-blue-500 md:col-span-2">
                        <label class="text-xs font-bold text-blue-600 uppercase tracking-wide">Keperluan</label>
                        <p class="text-lg text-gray-900 font-semibold mt-1">{{ $intern->purpose ?? '-' }}</p>
                    </div>
                    
                    <div class="bg-blue-50 rounded-lg p-4 border-l-4 border-blue-500">
                        <label class="text-xs font-bold text-blue-600 uppercase tracking-wide">Mentor</label>
                        <p class="text-lg text-gray-900 font-semibold mt-1">{{ $intern->mentor ? $intern->mentor->name : 'Belum ada mentor' }}</p>
                    </div>
                    
                    <div class="bg-blue-50 rounded-lg p-4 border-l-4 border-blue-500">
                        <label class="text-xs font-bold text-blue-600 uppercase tracking-wide">Periode Magang</label>
                        <p class="text-lg text-gray-900 font-semibold mt-1">
                            <i class="far fa-calendar-alt text-blue-600 mr-1"></i>
                            {{ $intern->start_date->format('d M Y') }} - {{ $intern->end_date->format('d M Y') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
        <div class="bg-gradient-to-br from-green-500 to-green-600 shadow-lg rounded-lg p-6 transform hover:scale-105 transition duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-100 text-sm font-semibold mb-1">Total Hadir</p>
                    <p class="text-4xl font-bold text-white">{{ $stats['total_hadir'] }}</p>
                </div>
                <div class="bg-white bg-opacity-30 rounded-full p-4">
                    <i class="fas fa-check-circle text-3xl text-white"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-gradient-to-br from-yellow-500 to-yellow-600 shadow-lg rounded-lg p-6 transform hover:scale-105 transition duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-yellow-100 text-sm font-semibold mb-1">Total Izin</p>
                    <p class="text-4xl font-bold text-white">{{ $stats['total_izin'] }}</p>
                </div>
                <div class="bg-white bg-opacity-30 rounded-full p-4">
                    <i class="fas fa-info-circle text-3xl text-white"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-gradient-to-br from-red-500 to-red-600 shadow-lg rounded-lg p-6 transform hover:scale-105 transition duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-red-100 text-sm font-semibold mb-1">Total Sakit</p>
                    <p class="text-4xl font-bold text-white">{{ $stats['total_sakit'] }}</p>
                </div>
                <div class="bg-white bg-opacity-30 rounded-full p-4">
                    <i class="fas fa-heartbeat text-3xl text-white"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 shadow-lg rounded-lg p-6 transform hover:scale-105 transition duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-semibold mb-1">Total Logbook</p>
                    <p class="text-4xl font-bold text-white">{{ $stats['total_logbooks'] }}</p>
                </div>
                <div class="bg-white bg-opacity-30 rounded-full p-4">
                    <i class="fas fa-book text-3xl text-white"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Attendance & Logbook Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <!-- Attendance History -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden border-t-4 border-blue-500">
            <div class="bg-gradient-to-r from-blue-50 to-blue-100 px-6 py-4 border-b border-blue-200">
                <h2 class="text-xl font-bold text-blue-900 flex items-center">
                    <i class="fas fa-calendar-check mr-3 text-blue-600"></i>
                    Riwayat Absensi
                    <span class="ml-2 text-sm font-normal text-blue-600">(30 Terakhir)</span>
                </h2>
            </div>
            <div class="overflow-x-auto max-h-96">
                <table class="min-w-full divide-y divide-blue-100">
                    <thead class="bg-blue-50 sticky top-0">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-bold text-blue-900 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-blue-900 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-blue-50">
                        @forelse($intern->attendances as $attendance)
                            <tr class="hover:bg-blue-50 transition duration-150">
                                <td class="px-6 py-3 text-sm text-gray-900 font-medium">
                                    <i class="far fa-calendar text-blue-600 mr-2"></i>
                                    {{ $attendance->date->format('d/m/Y') }}
                                </td>
                                <td class="px-6 py-3">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full
                                        @if($attendance->status == 'hadir') bg-green-100 text-green-800
                                        @elseif($attendance->status == 'izin') bg-yellow-100 text-yellow-800
                                        @else bg-red-100 text-red-800
                                        @endif">
                                        {{ ucfirst($attendance->status) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="px-6 py-8 text-center">
                                    <div class="flex flex-col items-center text-blue-300">
                                        <i class="fas fa-calendar-times text-4xl mb-2"></i>
                                        <p class="text-gray-500">Belum ada absensi</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Logbook History -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden border-t-4 border-blue-500">
            <div class="bg-gradient-to-r from-blue-50 to-blue-100 px-6 py-4 border-b border-blue-200">
                <h2 class="text-xl font-bold text-blue-900 flex items-center">
                    <i class="fas fa-book-open mr-3 text-blue-600"></i>
                    Logbook Terakhir
                    <span class="ml-2 text-sm font-normal text-blue-600">(10 Terakhir)</span>
                </h2>
            </div>
            <div class="p-6 space-y-4 max-h-96 overflow-y-auto">
                @forelse($intern->logbooks as $logbook)
                    <div class="bg-blue-50 border-l-4 border-blue-500 rounded-r-lg p-4 hover:shadow-md transition duration-200">
                        <div class="flex items-start justify-between mb-2">
                            <p class="text-sm font-bold text-blue-700 flex items-center">
                                <i class="far fa-clock mr-2"></i>
                                {{ $logbook->date->format('d F Y') }}
                            </p>
                        </div>
                        <p class="text-sm text-gray-700 leading-relaxed">{{ $logbook->activity }}</p>
                    </div>
                @empty
                    <div class="flex flex-col items-center justify-center py-12 text-blue-300">
                        <i class="fas fa-book text-4xl mb-3"></i>
                        <p class="text-gray-500">Belum ada logbook</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Final Report Section -->
    @if($intern->finalReport)
        <div class="bg-white shadow-lg rounded-lg p-6 border-t-4 border-blue-500">
            <div class="flex items-center mb-4">
                <i class="fas fa-file-alt text-2xl text-blue-600 mr-3"></i>
                <h2 class="text-xl font-bold text-blue-900">Laporan Akhir</h2>
            </div>
            <div class="bg-blue-50 rounded-lg p-6">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div class="flex-1">
                        <p class="text-lg font-bold text-gray-900 mb-2 flex items-center">
                            <i class="fas fa-file-pdf text-red-500 mr-2"></i>
                            {{ $intern->finalReport->file_name }}
                        </p>
                        <p class="text-sm text-gray-600">
                            <i class="far fa-clock text-blue-600 mr-1"></i>
                            Diupload: {{ $intern->finalReport->submitted_at->format('d F Y H:i') }}
                        </p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="px-4 py-2 rounded-full text-sm font-bold
                            @if($intern->finalReport->status == 'approved') bg-green-500 text-white
                            @elseif($intern->finalReport->status == 'rejected') bg-red-500 text-white
                            @else bg-yellow-500 text-white
                            @endif">
                            {{ ucfirst($intern->finalReport->status) }}
                        </span>
                        <a href="{{ route('admin.report.show', $intern->finalReport) }}" 
                            class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-200 transform hover:scale-105">
                            <i class="fas fa-eye mr-2"></i>Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection