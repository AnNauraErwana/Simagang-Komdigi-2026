@extends('layouts.app')

@section('title', 'Leaderboard Mikro Skill - Sistem Magang')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-blue-100 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="mb-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-4 md:space-y-0">
                <div>
                    <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent mb-2">
                        Leaderboard Mikro Skill
                    </h1>
                    <p class="text-gray-600">Lihat ranking top mikro skill dari semua intern</p>
                </div>
            </div>
        </div>

        <!-- Leaderboard Table -->
        <div class="bg-white rounded-2xl shadow-lg border border-blue-100 overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-4">
                <h2 class="text-xl font-bold text-white flex items-center">
                    <i class="fas fa-trophy mr-3"></i>
                    Data Leaderboard
                </h2>
            </div>

            <div class="p-6">
                @forelse($rows as $index => $row)
                    <div class="flex items-center justify-between p-4 bg-blue-50 rounded-lg hover:shadow-md transition-all duration-300 border border-blue-200 mb-3">
                        <div class="flex items-center flex-1">
                            <!-- Rank Badge -->
                            <div class="relative mr-4">
                                <span class="w-10 h-10 rounded-full 
                                    @if(($rows->firstItem() + $index) == 1) bg-yellow-500
                                    @elseif(($rows->firstItem() + $index) == 2) bg-gray-400
                                    @elseif(($rows->firstItem() + $index) == 3) bg-orange-500
                                    @else bg-indigo-500
                                    @endif
                                    text-white flex items-center justify-center font-bold text-sm shadow-lg">
                                    {{ ($rows->firstItem() + $index) }}
                                </span>
                                @if(($rows->firstItem() + $index) < 4)
                                    <i class="fas fa-crown absolute -top-2 -right-1 text-yellow-500 text-xs"></i>
                                @endif
                            </div>
                            
                            <!-- Photo -->
                            @if($row->photo_path)
                                <img src="{{ url('storage/'.$row->photo_path) }}" 
                                     class="w-12 h-12 rounded-full object-cover border-2 border-white shadow-md mr-4" />
                            @else
                                <div class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center mr-4 shadow-md">
                                    <i class="fas fa-user text-gray-500"></i>
                                </div>
                            @endif
                            
                            <!-- Info -->
                            <div class="flex-1">
                                <div class="font-semibold text-gray-900">{{ $row->name }}</div>
                                <div class="text-sm text-gray-500">{{ $row->institution }}</div>
                            </div>
                        </div>
                        
                        <!-- Score Badge -->
                        <span class="px-4 py-2 bg-gradient-to-r from-indigo-100 to-blue-100 text-indigo-800 rounded-full text-sm font-semibold flex items-center">
                            <i class="fas fa-star mr-2 text-yellow-500"></i>
                            {{ $row->total }} course
                        </span>
                    </div>
                @empty
                    <div class="flex flex-col items-center justify-center py-12 text-gray-500">
                        <i class="fas fa-chart-line text-5xl mb-3 text-gray-300"></i>
                        <p class="text-lg font-medium">Belum ada data.</p>
                    </div>
                @endforelse

                <!-- Pagination -->
                @if($rows->hasPages())
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        {{ $rows->links() }}
                    </div>
                @endif
            </div>
        </div>

        <!-- Back Button -->
        <div class="mt-6">
            <a href="{{ route('intern.dashboard') }}" 
               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-gray-400 to-gray-500 hover:from-gray-500 hover:to-gray-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>

    </div>
</div>
@endsection