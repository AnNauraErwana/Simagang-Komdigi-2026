<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'certificate_id',
        'discipline_attendance',
        'responsibility',
        'teamwork_communication',
        'technical_skill',
        'work_ethic',
        'initiative_creativity',
        'micro_skill',
    ];

    /**
     * Nilai milik satu sertifikat
     */
    public function certificate()
    {
        return $this->belongsTo(Certificate::class);
    }

    /**
     * (Opsional) hitung rata-rata nilai (tanpa micro_skill)
     */
    public function getAverageAttribute()
    {
        return round(collect([
            $this->discipline_attendance,
            $this->responsibility,
            $this->teamwork_communication,
            $this->technical_skill,
            $this->work_ethic,
            $this->initiative_creativity,
        ])->avg(), 2);
    }
}
