@extends('layouts.app')

@section('title', 'Leaderboard Mikro Skill - Sistem Magang')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-blue-100 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mb-8">
            <h1 class="text-4xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-2">
                Leaderboard Mikro Skill
            </h1>
            <p class="text-gray-600">Peringkat pencapaian keterampilan anak magang bimbingan Anda</p>
        </div>

        <div class="bg-white rounded-2xl shadow-lg border border-indigo-100 overflow-hidden">
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-14 h-14 bg-white bg-opacity-20 rounded-xl flex items-center justify-center mr-4">
                            <i class="fas fa-trophy text-yellow-300 text-2xl"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white">Top Performers</h2>
                            <p class="text-indigo-100 text-sm">Anak magang dengan pencapaian terbaik</p>
                        </div>
                    </div>
                    <div class="hidden md:flex items-center space-x-2">
                        <div class="text-right">
                            <p class="text-indigo-100 text-xs uppercase tracking-wide">Total Participants</p>
                            <p class="text-white text-2xl font-bold">{{ $rows->total() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-6">
                <div class="space-y-3">
                    @forelse($rows as $index => $row)
                        @php
                            $actualRank = ($rows->firstItem() + $index);
                        @endphp
                        <div class="flex items-center justify-between p-4 bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl hover:shadow-lg transition-all duration-300 border border-indigo-100 group">
                            <div class="flex items-center flex-1">
                                <div class="relative mr-4">
                                    <span class="w-12 h-12 rounded-full bg-gradient-to-br 
                                        @if($actualRank == 1) from-yellow-400 to-yellow-600 shadow-lg
                                        @elseif($actualRank == 2) from-gray-300 to-gray-500 shadow-lg
                                        @elseif($actualRank == 3) from-orange-400 to-orange-600 shadow-lg
                                        @else from-indigo-500 to-purple-600
                                        @endif
                                        text-white flex items-center justify-center font-bold text-lg transform group-hover:scale-110 transition-transform duration-300">
                                        {{ $actualRank }}
                                    </span>
                                    @if($actualRank <= 3)
                                        <i class="fas fa-crown absolute -top-2 -right-1 text-yellow-500 text-sm"></i>
                                    @endif
                                </div>
                                
                                <div class="mr-4">
                                    @if($row->photo_path)
                                        <img src="{{ url('storage/'.$row->photo_path) }}" 
                                             class="w-14 h-14 rounded-full object-cover border-3 border-white shadow-lg ring-2 
                                             @if($actualRank == 1) ring-yellow-400
                                             @elseif($actualRank == 2) ring-gray-400
                                             @elseif($actualRank == 3) ring-orange-400
                                             @else ring-indigo-300
                                             @endif" 
                                             alt="{{ $row->name }}" />
                                    @else
                                        <div class="w-14 h-14 rounded-full bg-gradient-to-br from-indigo-400 to-purple-500 flex items-center justify-center shadow-lg ring-2 ring-indigo-300">
                                            <i class="fas fa-user text-white text-xl"></i>
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="flex-1">
                                    <div class="flex items-center mb-1">
                                        <h3 class="font-bold text-gray-900 text-lg mr-2">{{ $row->name }}</h3>
                                        @if($actualRank <= 3)
                                            <span class="px-2 py-0.5 bg-gradient-to-r 
                                                @if($actualRank == 1) from-yellow-400 to-yellow-500
                                                @elseif($actualRank == 2) from-gray-300 to-gray-400
                                                @else from-orange-400 to-orange-500
                                                @endif
                                                text-white text-xs font-bold rounded-full">
                                                @if($actualRank == 1) 🥇 Champion
                                                @elseif($actualRank == 2) 🥈 Runner Up
                                                @else 🥉 3rd Place
                                                @endif
                                            </span>
                                        @endif
                                    </div>
                                    <div class="flex items-center text-sm text-gray-600">
                                        <i class="fas fa-university mr-2 text-indigo-500"></i>
                                        {{ $row->institution }}
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Score Badge -->
                            <div class="ml-4">
                                <div class="text-center">
                                    <div class="px-4 py-2 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl shadow-md">
                                        <div class="flex items-center justify-center space-x-2">
                                            <i class="fas fa-star text-yellow-300 text-lg"></i>
                                            <span class="text-white text-xl font-bold">{{ $row->total }}</span>
                                        </div>
                                        <p class="text-indigo-100 text-xs mt-1">courses</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="flex flex-col items-center justify-center py-16 text-gray-500">
                            <div class="w-24 h-24 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-chart-line text-5xl text-indigo-300"></i>
                            </div>
                            <p class="text-lg font-semibold text-gray-700">Belum ada data leaderboard</p>
                            <p class="text-sm text-gray-500 mt-2">Data akan muncul ketika anak magang mulai menyelesaikan course</p>
                        </div>
                    @endforelse
                </div>

                @if($rows->hasPages())
                    <div class="mt-6 pt-6 border-t border-indigo-100">
                        {{ $rows->links() }}
                    </div>
                @endif
            </div>
        </div>

        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Top Performer -->
            @if($rows->count() > 0 && $rows->currentPage() == 1)
                <div class="bg-white rounded-xl shadow-md border border-yellow-200 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600 mb-1">🏆 Top Performer</p>
                            <h3 class="text-xl font-bold text-gray-900">{{ $rows->first()->name }}</h3>
                            <p class="text-sm text-gray-500 mt-1">{{ $rows->first()->total }} courses</p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-crown text-white text-xl"></i>
                        </div>
                    </div>
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-md border border-indigo-100 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 mb-1">📊 Rata-rata Course</p>
                        <h3 class="text-2xl font-bold text-gray-900">
                            @if($rows->count() > 0)
                                {{ number_format($rows->avg('total'), 1) }}
                            @else
                                0
                            @endif
                        </h3>
                    </div>
                    <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-chart-bar text-white text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md border border-purple-100 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 mb-1">📚 Total Course</p>
                        <h3 class="text-2xl font-bold text-gray-900">{{ $rows->sum('total') }}</h3>
                    </div>
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-book text-white text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6">
            <a href="{{ route('mentor.dashboard') }}" 
               class="inline-flex items-center px-6 py-3 bg-gray-500 text-white font-semibold rounded-xl hover:bg-gray-600 shadow-md hover:shadow-lg transition-all duration-300">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali ke Dashboard
            </a>
        </div>

    </div>
</div>
@endsection