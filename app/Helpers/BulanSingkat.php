<?php 

function bulanSingkat($date)
{
    $map = [
        'January'   => 'Jan',
        'February'  => 'Feb',
        'March'     => 'Mar',
        'April'     => 'Apr',
        'May'       => 'Mei',
        'June'      => 'Jun',
        'July'      => 'Jul',
        'August'    => 'Ags',
        'September' => 'Sep',
        'October'   => 'Okt',
        'November'  => 'Nov',
        'December'  => 'Des',
    ];

    $bulanFull = $date->translatedFormat('F');

    return $map[$bulanFull] ?? $bulanFull;
}

?>