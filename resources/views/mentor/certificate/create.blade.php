@extends('layouts.app')

@section('title', 'Penilaian Sertifikat Magang - Sistem Magang')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-blue-100 py-8">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-cyan-600 bg-clip-text text-transparent mb-2">
                    {{ $mode === 'edit' ? 'Edit Penilaian Sertifikat' : 'Penilaian Sertifikat Magang' }}
                </h1>
                <p class="text-gray-600">Berikan penilaian untuk penerbitan sertifikat magang</p>
            </div>
            <a href="{{ route('mentor.report.index') }}" 
               class="inline-flex items-center px-6 py-3 bg-gray-500 text-white font-semibold rounded-xl hover:bg-gray-600 shadow-md hover:shadow-lg transition-all duration-300">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-lg border border-blue-100 overflow-hidden">
            
            <div class="bg-gradient-to-r from-blue-600 to-cyan-600 px-6 py-6">
                <div class="flex items-center">
                    @if($selectedIntern && $selectedIntern->photo_path)
                        <img src="{{ url('storage/'.$selectedIntern->photo_path) }}" 
                             class="w-16 h-16 rounded-full object-cover border-4 border-white shadow-lg mr-4" 
                             alt="{{ $selectedIntern->name }}" />
                    @else
                        <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center mr-4 shadow-lg">
                            <i class="fas fa-user text-blue-600 text-2xl"></i>
                        </div>
                    @endif
                    <div class="text-white">
                        <h2 class="text-2xl font-bold">{{ $selectedIntern ? $selectedIntern->name : 'Tidak ada' }}</h2>
                        <p class="text-blue-100 flex items-center mt-1">
                            <i class="fas fa-certificate mr-2"></i>
                            Penilaian untuk Sertifikat Magang
                        </p>
                    </div>
                </div>
            </div>

            <div class="p-8">
                <form method="POST" 
                      action="{{ $mode === 'edit'
                              ? route('mentor.certificates.update', $certificate->id)
                              : route('mentor.certificates.store') }}">
                    @csrf
                    @if($mode === 'edit')
                        @method('PUT')
                    @endif
                    
                    <input type="hidden" name="intern_id" value="{{ $selectedIntern ? $selectedIntern->id : '' }}">

                    <div class="mb-8">
                        <label for="issue_date" class="block text-sm font-bold text-gray-700 mb-3">
                            <i class="fas fa-calendar-alt text-blue-600 mr-2"></i>
                            Tanggal Terbit Sertifikat
                        </label>
                        <input type="date" name="issue_date" id="issue_date" required
                               class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               value="{{ old('issue_date', $certificate?->issue_date?->format('Y-m-d') ?? date('Y-m-d')) }}">
                    </div>

                   <div class="mb-8 p-4 bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl border-2 border-blue-200">
                        <div class="flex items-start">
                            <i class="fas fa-info-circle text-blue-600 text-xl mr-3 mt-1"></i>
                            <div>
                                <p class="font-bold text-blue-900 mb-2">Kriteria Penilaian:</p>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-2 text-sm">
                                    <span class="px-2 py-1 bg-green-100 text-green-800 rounded font-semibold">A = 85-100</span>
                                    <span class="px-2 py-1 bg-emerald-100 text-emerald-800 rounded font-semibold">B+ = 80-84</span>
                                    <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded font-semibold">B = 70-79</span>
                                    <span class="px-2 py-1 bg-cyan-100 text-cyan-800 rounded font-semibold">C+ = 65-69</span>
                                    <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded font-semibold">C = 60-64</span>
                                    <span class="px-2 py-1 bg-orange-100 text-orange-800 rounded font-semibold">D = 50-59</span>
                                    <span class="px-2 py-1 bg-red-100 text-red-800 rounded font-semibold">E = 0-49</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-clipboard-list text-blue-600 mr-3"></i>
                            Komponen Penilaian
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="discipline_attendance" class="block text-sm font-bold text-gray-700 mb-2">
                                    <i class="fas fa-user-clock text-green-600 mr-2"></i>
                                    Disiplin dan Kehadiran
                                </label>
                                <input type="number" name="discipline_attendance" id="discipline_attendance"
                                       min="0" max="100" required
                                       class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                       placeholder="0 - 100"
                                       value="{{ old('discipline_attendance', $certificate->score->discipline_attendance ?? '') }}">
                            </div>

                            <div>
                                <label for="responsibility" class="block text-sm font-bold text-gray-700 mb-2">
                                    <i class="fas fa-tasks text-purple-600 mr-2"></i>
                                    Tanggung Jawab
                                </label>
                                <input type="number" name="responsibility" id="responsibility"
                                       min="0" max="100" required
                                       class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                       placeholder="0 - 100"
                                       value="{{ old('responsibility', $certificate->score->responsibility ?? '') }}">
                            </div>

                            <div>
                                <label for="teamwork_communication" class="block text-sm font-bold text-gray-700 mb-2">
                                    <i class="fas fa-users text-blue-600 mr-2"></i>
                                    Kerja Sama dan Komunikasi
                                </label>
                                <input type="number" name="teamwork_communication" id="teamwork_communication"
                                       min="0" max="100" required
                                       class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                       placeholder="0 - 100"
                                       value="{{ old('teamwork_communication', $certificate->score->teamwork_communication ?? '') }}">
                            </div>

                            <div>
                                <label for="technical_skill" class="block text-sm font-bold text-gray-700 mb-2">
                                    <i class="fas fa-cogs text-orange-600 mr-2"></i>
                                    Keterampilan Teknik
                                </label>
                                <input type="number" name="technical_skill" id="technical_skill"
                                       min="0" max="100" required
                                       class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                       placeholder="0 - 100"
                                       value="{{ old('technical_skill', $certificate->score->technical_skill ?? '') }}">
                            </div>

                            <div>
                                <label for="work_ethic" class="block text-sm font-bold text-gray-700 mb-2">
                                    <i class="fas fa-handshake text-teal-600 mr-2"></i>
                                    Etika dan Sikap Kerja
                                </label>
                                <input type="number" name="work_ethic" id="work_ethic"
                                       min="0" max="100" required
                                       class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                       placeholder="0 - 100"
                                       value="{{ old('work_ethic', $certificate->score->work_ethic ?? '') }}">
                            </div>

                            <div>
                                <label for="initiative_creativity" class="block text-sm font-bold text-gray-700 mb-2">
                                    <i class="fas fa-lightbulb text-yellow-600 mr-2"></i>
                                    Inisiatif dan Kreativitas
                                </label>
                                <input type="number" name="initiative_creativity" id="initiative_creativity"
                                       min="0" max="100" required
                                       class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                       placeholder="0 - 100"
                                       value="{{ old('initiative_creativity', $certificate->score->initiative_creativity ?? '') }}">
                            </div>
                        </div>

                        <div class="pt-6 border-t border-gray-200">
                            <label for="micro_skill" class="block text-sm font-bold text-gray-700 mb-2">
                                <i class="fas fa-graduation-cap text-indigo-600 mr-2"></i>
                                Pengerjaan Micro Skill (Jumlah Course)
                            </label>
                            <input type="number" name="micro_skill" id="micro_skill"
                                   min="0" required
                                   class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="Contoh: 12"
                                   value="{{ old('micro_skill', $certificate->score->micro_skill ?? '') }}">
                            <p class="mt-2 text-sm text-gray-500">
                                <i class="fas fa-info-circle mr-1"></i>
                                Masukkan jumlah micro skill course yang telah diselesaikan
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row justify-end gap-3 mt-8 pt-6 border-t border-gray-200">
                        @if ($mode === 'edit' && $certificate && $certificate->score)
                            <a href="{{ route('mentor.certificates.print', $certificate->id) }}"
                               target="_blank"
                               class="inline-flex items-center justify-center px-6 py-3 bg-purple-600 text-white font-semibold rounded-xl hover:bg-purple-700 shadow-md hover:shadow-lg transition-all duration-300">
                                <i class="fas fa-certificate mr-2"></i>
                                Lihat Sertifikat
                            </a>
                        @endif
                        
                        <a href="{{ route('mentor.report.index') }}" 
                           class="inline-flex items-center justify-center px-6 py-3 bg-gray-500 text-white font-semibold rounded-xl hover:bg-gray-600 shadow-md hover:shadow-lg transition-all duration-300">
                            <i class="fas fa-times mr-2"></i>
                            Batal
                        </a>

                        <button type="submit"
                                class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-blue-600 to-cyan-600 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-cyan-700 shadow-md hover:shadow-lg transition-all duration-300">
                            <i class="fas fa-save mr-2"></i>
                            {{ $mode === 'edit' ? 'Update Nilai Sertifikat' : 'Simpan Nilai Sertifikat' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-6 bg-white rounded-xl shadow-md border border-blue-100 p-6">
            <div class="flex items-start">
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                    <i class="fas fa-info-circle text-blue-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-2">Informasi Penilaian</h3>
                    <ul class="text-sm text-gray-600 space-y-1">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-2 mt-1"></i>
                            <span>Semua komponen dinilai dalam skala 0-100</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-2 mt-1"></i>
                            <span>Nilai akhir akan otomatis dihitung dari rata-rata komponen</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-2 mt-1"></i>
                            <span>Sertifikat dapat dilihat setelah penilaian disimpan</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-2 mt-1"></i>
                            <span>Pastikan semua nilai sudah sesuai sebelum menyimpan</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection