<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class MicroSkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['judul_micro' => 'Computational Thinking : Cara Berpikir Logis untuk Mengatasi Masalah (Jenjang SMA)', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/10204'],
            ['judul_micro' => 'Computational Thinking : Cara Berpikir Logis untuk Mengatasi Masalah (Jenjang SMP)', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/10203'],
            ['judul_micro' => 'Computational Thinking : Cara Berpikir Logis untuk Mengatasi Masalah (Jenjang SD)', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/10202'],
            ['judul_micro' => 'Ethical Hacker For Dummies', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/10030'],
            ['judul_micro' => 'AI Engineer For Milenial', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/10029'],
            ['judul_micro' => 'Pengenalan Produk Digital dan Desain Grafis Bagi Angkatan Kerja Muda', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/10028'],
            ['judul_micro' => 'Media Digital bagi Guru/Tenaga Kependidikan', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/10026'],
            ['judul_micro' => 'Social Media Management untuk Brand Digital', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/10025'],
            ['judul_micro' => 'Branding Institusi Untuk Instansi Pemerintah', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/10024'],
            ['judul_micro' => 'Public Speaking bagi Penyandang Disabilitas Muda', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/10023'],
            ['judul_micro' => 'Komunikasi Strategis Untuk ASN', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/10022'],
            ['judul_micro' => 'Komunikasi Krisis Untuk ASN', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/10021'],
            ['judul_micro' => 'What is Business Pitching', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9892'],
            ['judul_micro' => 'Introduction To Cloud Computing', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9864'],
            ['judul_micro' => 'Cara Mudah Menggunakan Aplikasi Perkantoran Online', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9860'],
            ['judul_micro' => 'Pengenalan Kolaborasi Menggunakan Tools Gratis Penyimpanan berbasis Cloud', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9847'],
            ['judul_micro' => 'Optimasi Instagram dengan Insight', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9844'],
            ['judul_micro' => 'Aktualisasi Falsafah Torang Samua Basudara dalam Menjaga Kerukunan di Era Digital', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9841'],
            ['judul_micro' => 'Dampak Negatif Judi Online Bagi Masyarakat', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9838'],
            ['judul_micro' => 'Tips Melindungi Diri Dari Ancaman Phising dan Malware di Era Digital', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9835'],
            ['judul_micro' => 'Seni Public Speaking Untuk Pemimpin Muda Berkarakter', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9834'],
            ['judul_micro' => 'Copywriting AI Untuk Iklan Digital', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9829'],
            ['judul_micro' => 'Peran ASN Dalam Membangun Citra Lembaga Melalui Konten Kreatif', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9828'],
            ['judul_micro' => 'Image Recognition dan Speech Recognition Mengubah Interaksi Kita dengan Teknologi', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9827'],
            ['judul_micro' => 'Pengenalan Hak Atas Kekayaan Intelektual (HAKI) Dalam Perlindungan Karya dan Inovasi Digital', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9826'],
            ['judul_micro' => 'Generative AI untuk Pendidikan', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9825'],
            ['judul_micro' => 'Pengantar Sistem Pemerintahan Berbasis Elektronik (SPBE)', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9823'],
            ['judul_micro' => 'Digital Marketing : Membangun Strategi untuk Kesuksesan Bisnis Online', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9820'],
            ['judul_micro' => 'Digital Wellness : Mencapai keseimbangan hidup di era teknologi yang terus berkembang', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9819'],
            ['judul_micro' => 'Pengenalan Data Science dan Pemanfaatannya di Berbagai Sektor', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9818'],
            ['judul_micro' => 'Mindset Digital 1: Pola Pikir Bertumbuh (Growth Mindset)', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9817'],
            ['judul_micro' => 'Pengantar Mindset Digital 1 : Mengubah Masa Depan Anda Dengan Pola Pikir Digital', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9815'],
            ['judul_micro' => 'Memahami Aspek Pengembangan Produk AI', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9814'],
            ['judul_micro' => 'Pentingnya Menjaga Keamanan Digital: Perlindungan Diri di Dunia Maya', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9812'],
            ['judul_micro' => 'Memahami Perbedaan Misinformasi, Disinformasi, dan Malinformasi', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9811'],
            ['judul_micro' => 'Membangun Lab Virtual & Dasar Linux', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9809'],
            ['judul_micro' => 'Fondasi Penulisan Berita', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9808'],
            ['judul_micro' => 'Pengenalan Internet of Things: Konsep, Teknologi, dan Aplikasinya', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9806'],
            ['judul_micro' => 'Jejak Digital: Warisan yang Anda Tinggalkan di Dunia Maya', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9801'],
            ['judul_micro' => 'Menjadi Pengguna Media Sosial yang Bijak dan Kritis', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9799'],
            ['judul_micro' => 'Membangun Personal Branding di Media Sosial', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9798'],
            ['judul_micro' => 'Pemanfaatan Aplikasi Editing Video untuk Konten Produk', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9796'],
            ['judul_micro' => 'Pemanfaatan Aplikasi Chat Bagi Wirausahawan Pemula', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9795'],
            ['judul_micro' => 'Produksi Konten Media Sosial Dengan AI', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9794'],
            ['judul_micro' => 'Konsep Pemrograman', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9793'],
            ['judul_micro' => 'Etis Bermedia Sosial Berbasis Nilai Lokal', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9789'],
            ['judul_micro' => 'Character Building Tangkal Bahaya Judi Online', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9785'],
            ['judul_micro' => 'Smart Village: Panduan Membangun Ekonomi Kreatif Desa', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9783'],
            ['judul_micro' => 'Pengenalan Koding Visual untuk Anak', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9782'],
            ['judul_micro' => 'Kenali Tanda-Tandanya dan Lindungi Data Pribadi', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9779'],
            ['judul_micro' => 'Mengamankan Diri dari Kejahatan Siber', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9777'],
            ['judul_micro' => "Parent's Guide for Internet Safety", 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9774'],
            ['judul_micro' => 'Menskalakan AI di Organisasi Anda', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9754'],
            ['judul_micro' => 'Menerapkan rekayasa prompt dengan Azure OpenAI Service', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9753'],
            ['judul_micro' => 'Dasar-dasar Keamanan AI', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9752'],
            ['judul_micro' => 'Seberapa Aman Informasi Anda dari Ancaman Digital', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9750'],
            ['judul_micro' => 'Dasar-Dasar Implementasi Kecerdasan Artifisial', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9748'],
            ['judul_micro' => 'Prinsip Prinsip Video Content Creator', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9747'],
            ['judul_micro' => 'Wawasan Karir dalam Bidang Data Analytics', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9746'],
            ['judul_micro' => 'Tips Mengatur Keuangan untuk UMKM Pemula', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9738'],
            ['judul_micro' => 'Strategi Penggunaan Customer Relationship Management untuk UMKM', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9737'],
            ['judul_micro' => 'Pentingnya izin Usaha Bagi UMKM', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9736'],
            ['judul_micro' => 'Dampak Teknologi Digital bagi UMKM', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9735'],
            ['judul_micro' => 'Introduction to Cyber Security and Career Awareness', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9734'],
            ['judul_micro' => 'Ancaman Pembobolan Akun Pribadi dan Pencegahannya', 'link_micro' => 'https://digitalent.komdigi.go.id/pelatihan/9727'],
        ];

        foreach ($items as $item) {
            DB::table('micro_skills')->updateOrInsert(
                ['judul_micro' => $item['judul_micro']],
                ['link_micro' => $item['link_micro'], 'created_at' => now(), 'updated_at' => now()]
            );
        }

        $this->command->info('Seeded ' . count($items) . ' micro skills');
    }
}
