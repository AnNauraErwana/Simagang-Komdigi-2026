@extends('layouts.app')

@section('title', 'Monitoring Laporan - Sistem Magang')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-blue-100 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold leading-tight bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent mb-3 pb-2">
                Pantau Laporan Akhir Anak Magang
            </h1>
            <p class="text-gray-600">Monitoring Laporan Akhir anak magang</p>
        </div>

        <!-- Filter Form -->
        <div class="bg-white rounded-2xl shadow-lg mb-8">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-4 rounded-t-2xl">
                <h2 class="text-xl font-bold text-white flex items-center">
                    <i class="fas fa-filter mr-3"></i>
                    Filter Data
                </h2>
            </div>
            <form method="GET" action="{{ route('admin.report.index') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4 p-6">
                <div>
                    <label for="intern_id" class="block text-sm font-medium text-gray-700 mb-2">Anak Magang</label>
                    <select name="intern_id" id="intern_id" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Semua</option>
                        @foreach($interns as $intern)
                            <option value="{{ $intern->id }}" {{ request('intern_id') == $intern->id ? 'selected' : '' }}>
                                {{ $intern->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select name="status" id="status" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Semua</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                        <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </div>

                <div class="flex items-end gap-2">
                    <button class="flex-1 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 flex items-center justify-center" 
                            type="submit">
                        <i class="fas fa-filter mr-2"></i>
                        Filter
                    </button>
                    @if(request()->anyFilled(['intern_id', 'status']))
                        <a href="{{ route('admin.report.index') }}" class="bg-blue-100 hover:bg-blue-200 text-blue-700 font-bold py-2 px-4 rounded-lg transition duration-200">
                            <i class="fas fa-times"></i>
                        </a>
                    @endif
                </div>
            </form>
        </div>

        {{-- Tabel Laporan Akhir --}}
        <div class="bg-white rounded-2xl shadow-md border border-blue-100 overflow-hidden">
            <div class="bg-blue-600 px-6 py-4">
                <h2 class="text-xl font-bold text-white flex items-center">
                        <i class="fas fa-file-alt mr-3"></i>
                        Data Laporan Akhir
                </h2>
            </div>
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr class="bg-blue-50">
                                <th class="px-6 py-4 text-center text-xs font-bold text-blue-900 uppercase tracking-wider rounded-tl-lg">Nama</th>
                                <th class="px-6 py-4 text-center text-xs font-bold text-blue-900 uppercase tracking-wider">Laporan</th>
                                <th class="px-6 py-4 text-center text-xs font-bold text-blue-900 uppercase tracking-wider">Tanggal Upload</th>
                                <th class="px-6 py-4 text-center text-xs font-bold text-blue-900 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-center text-xs font-bold text-blue-900 uppercase tracking-wider">Nilai</th>
                                <th class="px-6 py-4 text-center text-xs font-bold text-blue-900 uppercase tracking-wider rounded-tr-lg">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse($reports as $report)
                                <tr class="hover:bg-blue-50 transition-colors duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            @if($intern->photo_path)
                                                <img src="{{ url('storage/' . $report->intern->photo_path) }}"
                                                        class="w-10 h-10 rounded-full object-cover border-2 border-blue-200 mr-3"
                                                        alt="{{ $report->intern->name }}">
                                                @else
                                                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-3 border-2 border-blue-200">
                                                        <i class="fas fa-user text-blue-600"></i>
                                                    </div>
                                                @endif
                                                <span class="text-sm font-medium text-gray-900">
                                                    {{ $report->intern->name }}
                                                </span>

                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $report->file_name }}
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $report->submitted_at->format('d/m/Y H:i') }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        <div class="flex flex-col space-y-1">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                                @if($report->status == 'approved') bg-green-100 text-green-800
                                                @elseif($report->status == 'rejected') bg-red-100 text-red-800
                                                @else bg-yellow-100 text-yellow-800
                                                @endif">
                                                {{ ucfirst($report->status) }}
                                            </span>
                                            @if($report->needs_revision)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                                    Revisi
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        @if($report->grade)
                                            <span class="px-2 py-1 inline-flex text-sm font-bold rounded-full
                                                @if($report->grade == 'A') bg-green-100 text-green-800
                                                @elseif($report->grade == 'B') bg-blue-100 text-blue-800
                                                @else bg-yellow-100 text-yellow-800
                                                @endif">
                                                {{ $report->grade }}
                                            </span>
                                        @else
                                            <span class="text-gray-400 text-sm">-</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">
                                        {{-- Aksi Lihat --}}
                                        <a href="{{ route('admin.report.show', $report) }}" class="text-green-600 hover:text-green-800 mr-3 transition-color" title="detail">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        {{-- Aksi Sertifikat --}}
                                        <a href="{{ route('admin.certificates.create', ['intern_id' => $report->intern->id]) }}"
                                            class="text-yellow-400 hover:text-yellow-300 inline-block transition-color" title="penilaian sertifikat">
                                                <i class="fas fa-certificate"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                        Belum ada laporan akhir.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-4">
            {{ $reports->links() }}
        </div>
    </div>
</div>
@endsection
