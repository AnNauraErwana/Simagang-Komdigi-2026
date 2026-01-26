<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'intern_id',
        'certificate_number',
        'issue_date',
    ];

    protected $casts = [
        'issue_date' => 'date', // PENTING untuk translatedFormat()
    ];

    /**
     * Sertifikat milik satu intern
     */
    public function intern()
    {
        return $this->belongsTo(Intern::class);
    }

    /**
     * Sertifikat punya satu nilai
     */
    public function score()
    {
        return $this->hasOne(CertificateScore::class);
    }
}
