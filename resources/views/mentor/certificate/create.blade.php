@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">
                {{ $mode === 'edit' ? 'Edit Penilaian Sertifikat Magang' : 'Penilaian Sertifikat Magang' }}
            </h1>

            <a href="{{ route('mentor.report.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>

        <form method="POST" 
            
            action="{{ $mode === 'edit'
                    ? route('mentor.certificates.update', $certificate->id)
                    : route('mentor.certificates.store') }}"
            class="mt-6 border-t pt-6">

            @csrf

            @if($mode === 'edit')
                @method('PUT')
            @endif
            
            {{-- Anak Magang (Tidak Dapat Diubah) --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Nama
                </label>
                <input type="text" value="{{ $selectedIntern ? $selectedIntern->name : 'Tidak ada' }}" readonly
                       class="w-full px-3 py-2 border rounded-md shadow-sm bg-gray-100">
                <input type="hidden" name="intern_id" value="{{ $selectedIntern ? $selectedIntern->id : '' }}">
            </div>

            {{-- Tanggal Terbit --}}
            <div class="mb-4">
                <label for="issue_date" class="block text-sm font-medium text-gray-700 mb-2">
                    Tanggal Terbit Sertifikat
                </label>
                <input type="date" name="issue_date" id="issue_date" required
                       class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                       value="{{ old('issue_date',
                            $certificate?->issue_date?->format('Y-m-d') ?? date('Y-m-d')
                        ) }}">
            </div>
            
            <p class="mt-1 text-sm text-gray-500 mb-6">
                <strong>Kriteria:</strong> A = 85-100, B+ = 80-84, B = 70-79, C+ = 65-69, C = 60-64, D = 50-59, E = 0-49
            </p>

            {{-- Disiplin dan Kehadiran --}}
            <div class="mb-4">
                <label for="discipline_attendance" class="block text-sm font-medium text-gray-700 mb-2">
                    Disiplin dan Kehadiran
                </label>
                <input type="number" name="discipline_attendance" id="discipline_attendance"
                    min="0" max="100" required
                    class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukkan nilai 0–100"
                    value="{{ old('discipline_attendance', $certificate->score->discipline_attendance ?? '') }}">
            </div>

            {{-- Tanggung Jawab --}}
            <div class="mb-4">
                <label for="responsibility" class="block text-sm font-medium text-gray-700 mb-2">
                    Tanggung Jawab
                </label>
                <input type="number" name="responsibility" id="responsibility"
                    min="0" max="100" required
                    class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukkan nilai 0–100"
                    value="{{ old('responsibility', $certificate->score->responsibility ?? '') }}">
            </div>

            {{-- Kerja Sama dan Komunikasi --}}
            <div class="mb-4">
                <label for="teamwork_communication" class="block text-sm font-medium text-gray-700 mb-2">
                    Kerja Sama dan Komunikasi
                </label>
                <input type="number" name="teamwork_communication" id="teamwork_communication"
                    min="0" max="100" required
                    class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukkan nilai 0–100"
                    value="{{ old('teamwork_communication', $certificate->score->teamwork_communication ?? '') }}">
            </div>

            {{-- Keterampilan Teknik --}}
            <div class="mb-4">
                <label for="technical_skill" class="block text-sm font-medium text-gray-700 mb-2">
                    Keterampilan Teknik
                </label>
                <input type="number" name="technical_skill" id="technical_skill"
                    min="0" max="100" required
                    class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukkan nilai 0–100"
                    value="{{ old('technical_skill', $certificate->score->technical_skill ?? '') }}">
            </div>

            {{-- Etika dan Sikap Kerja --}}
            <div class="mb-4">
                <label for="work_ethic" class="block text-sm font-medium text-gray-700 mb-2">
                    Etika dan Sikap Kerja
                </label>
                <input type="number" name="work_ethic" id="work_ethic"
                    min="0" max="100" required
                    class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukkan nilai 0–100"
                    value="{{ old('work_ethic', $certificate->score->work_ethic ?? '') }}">
            </div>

            {{-- Inisiatif dan Kreativitas --}}
            <div class="mb-4">
                <label for="initiative_creativity" class="block text-sm font-medium text-gray-700 mb-2">
                    Inisiatif dan Kreativitas
                </label>
                <input type="number" name="initiative_creativity" id="initiative_creativity"
                    min="0" max="100" required
                    class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukkan nilai 0–100"
                    value="{{ old('initiative_creativity', $certificate->score->initiative_creativity ?? '') }}">
            </div>

            {{-- Pengerjaan Micro Skill --}}
            <div class="mb-6">
                <label for="micro_skill" class="block text-sm font-medium text-gray-700 mb-2">
                    Pengerjaan Micro Skill (Jumlah)
                </label>
                <input type="number" name="micro_skill" id="micro_skill"
                    min="0" required
                    class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Contoh: 12"
                    value="{{ old('micro_skill', $certificate->score->micro_skill ?? '') }}">
            </div>

            {{-- Tombol Submit --}}
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 me-4 rounded-md">
                    {{ $mode === 'edit' ? 'Update Nilai Sertifikat' : 'Simpan Nilai Sertifikat' }}
                </button>

                @if ($mode === 'edit' && $certificate && $certificate->score)
                    <a href="{{ route('mentor.certificates.print', $certificate->id) }}"
                    target="_blank"
                    class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Lihat Sertifikat
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection