<?php

if (!function_exists('scoreToGrade')) {
    function scoreToGrade($score)
    {
        if ($score >= 85) return 'A';
        if ($score >= 80) return 'B+';
        if ($score >= 70) return 'B';
        if ($score >= 65) return 'C+';
        if ($score >= 60) return 'C';
        if ($score >= 50) return 'D';
        return 'E';
    }
}
