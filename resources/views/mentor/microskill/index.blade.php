@extends('layouts.app')

@section('title', 'Mikro Skill Anak Bimbingan - Sistem Magang')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-blue-100 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-8">
                <h1
                    class="text-5xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent mb-3">
                    Mikro Skill Anak Bimbingan
                </h1>
                <p class="text-gray-600 text-lg">Pantau pencapaian dan pengembangan keterampilan anak magang</p>
            </div>

            <div class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div
                    class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-blue-100">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs font-medium text-gray-600 mb-1">Total Submissions</p>
                                <h3 class="text-2xl font-bold text-gray-900">{{ $submissions->total() }}</h3>
                            </div>
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                                <i class="fas fa-list-check text-white text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="h-1 bg-gradient-to-r from-blue-500 to-blue-600"></div>
                </div>

                <div
                    class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-blue-100">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs font-medium text-gray-600 mb-1">Unique Interns</p>
                                <h3 class="text-2xl font-bold text-gray-900">
                                    {{ $submissions->pluck('intern_id')->unique()->count() }}</h3>
                            </div>
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center">
                                <i class="fas fa-users text-white text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="h-1 bg-gradient-to-r from-blue-500 to-indigo-600"></div>
                </div>

                <div
                    class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-blue-100">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs font-medium text-gray-600 mb-1">Showing Page</p>
                                <h3 class="text-2xl font-bold text-gray-900">{{ $submissions->currentPage() }} /
                                    {{ $submissions->lastPage() }}</h3>
                            </div>
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                                <i class="fas fa-file-alt text-white text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="h-1 bg-gradient-to-r from-blue-500 to-blue-600"></div>
                </div>
            </div>

            <div
                class="bg-gradient-to-br from-white to-blue-50 rounded-2xl shadow-xl border border-blue-200 overflow-hidden mb-6">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-5">
                    <h2 class="text-xl font-bold text-white flex items-center">
                        <i class="fas fa-filter mr-3"></i>
                        Filter Data
                    </h2>
                </div>
                <div class="p-6">
                    <form method="GET" action="{{ route('mentor.microskill.index') }}">
                        <div class="flex justify-between gap-5">
                            <!-- Anak Magang -->
                            <div class="w-full flex flex-col">
                                <label class="block text-sm font-semibold text-gray-700 mb-3">
                                    <i class="fas fa-user-graduate mr-1.5 text-blue-600 text-base"></i>
                                    <span>Anak Magang</span>
                                </label>
                                <select name="intern_id"
                                    class="w-full px-4 py-2.5 border-2 border-gray-300 rounded-xl text-gray-700 font-medium focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all hover:border-blue-400 appearance-none bg-white cursor-pointer shadow-sm hover:shadow-md">
                                    <option value="">-- Semua Anak Magang --</option>
                                    @foreach ($interns as $intern)
                                        <option value="{{ $intern->id }}" @selected(request('intern_id') == $intern->id)>{{ $intern->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Buttons -->
                            <div class="flex items-end gap-3">
                                <button type="submit"
                                    class="flex-1 inline-flex items-center justify-center px-6 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-indigo-700 shadow-lg hover:shadow-xl transform hover:scale-105 active:scale-95 transition-all duration-300">
                                    <i class="fas fa-search mr-2"></i>
                                    <span>Cari</span>
                                </button>
                                @if (request()->filled('intern_id'))
                                    <a href="{{ route('mentor.microskill.index') }}"
                                        class="inline-flex items-center justify-center bg-blue-100 hover:bg-blue-200 text-blue-700 font-bold py-2.5 px-4 rounded-xl transition duration-200 shadow-md hover:shadow-lg transform hover:scale-105 active:scale-95">
                                        <i class="fas fa-times text-lg"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-xl border border-blue-100 overflow-hidden">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-5">
                    <h2 class="text-xl font-bold text-white flex items-center">
                        <i class="fas fa-graduation-cap mr-3"></i>
                        Data Mikro Skill
                    </h2>
                </div>
                <div class="p-6">
                    <div class="overflow-x-auto rounded-xl border border-gray-200">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr class="bg-gradient-to-r from-blue-600 to-indigo-600">
                                    <th class="px-6 py-5 text-left text-xs font-bold text-white uppercase tracking-widest">
                                        Nama</th>
                                    <th class="px-6 py-5 text-left text-xs font-bold text-white uppercase tracking-widest">
                                        Judul Course</th>
                                    <th class="px-6 py-5 text-left text-xs font-bold text-white uppercase tracking-widest">
                                        Waktu Submit</th>
                                    <th class="px-6 py-5 text-left text-xs font-bold text-white uppercase tracking-widest">
                                        Dokumentasi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($submissions as $s)
                                    <tr
                                        class="hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-all duration-300 border-b border-gray-200">
                                        <td class="px-6 py-5 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                @if ($s->intern->photo_path)
                                                    <img src="{{ url('storage/' . $s->intern->photo_path) }}"
                                                        class="w-12 h-12 rounded-full object-cover border-2 border-blue-300 shadow-md ring-2 ring-blue-100"
                                                        alt="{{ $s->intern->name }}" />
                                                @else
                                                    <div
                                                        class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-400 to-indigo-500 flex items-center justify-center shadow-md ring-2 ring-blue-100">
                                                        <i class="fas fa-user text-white text-base"></i>
                                                    </div>
                                                @endif
                                                <span
                                                    class="text-sm font-semibold text-gray-900">{{ $s->intern->name }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-5">
                                            <div class="flex items-center gap-2">
                                                <i class="fas fa-book-open text-blue-600 text-sm"></i>
                                                <span
                                                    class="text-sm font-medium text-gray-900">{{ Str::limit($s->title, 40) }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-5 whitespace-nowrap">
                                            <div class="flex items-center gap-2 text-sm">
                                                <i class="fas fa-clock text-blue-500 text-sm"></i>
                                                <span
                                                    class="text-gray-700 font-medium">{{ $s->submitted_at ? \Carbon\Carbon::parse($s->submitted_at)->format('d M Y') : '-' }}</span>
                                                <span
                                                    class="text-gray-500 text-xs">{{ $s->submitted_at ? \Carbon\Carbon::parse($s->submitted_at)->format('H:i') : '' }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-5 whitespace-nowrap">
                                            @if ($s->photo_path)
                                                <img src="{{ url('storage/' . $s->photo_path) }}" alt="Documentation"
                                                    class="w-12 h-12 object-cover rounded-lg border-2 border-blue-200 cursor-pointer hover:border-blue-400 transition-all shadow-sm hover:shadow-lg transform hover:scale-110"
                                                    onclick="window.open('{{ url('storage/' . $s->photo_path) }}', '_blank')"
                                                    title="Klik untuk melihat full size" />
                                            @else
                                                <div
                                                    class="inline-flex items-center justify-center w-12 h-12 bg-gray-100 rounded-lg border-2 border-gray-200">
                                                    <i class="fas fa-image text-gray-300 text-lg"></i>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-12 text-center">
                                            <div class="flex flex-col items-center justify-center">
                                                <div
                                                    class="w-24 h-24 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mb-5 shadow-md">
                                                    <i class="fas fa-certificate text-5xl text-gray-300"></i>
                                                </div>
                                                <p class="text-lg font-bold text-gray-700 mb-2">Tidak ada data mikro skill
                                                </p>
                                                <p class="text-sm text-gray-500">Data akan muncul ketika anak magang
                                                    mensubmit course</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-8">
                        {{ $submissions->links() }}
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
