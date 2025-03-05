<?php
function getStatusReservation($status)
{
    $statuses = [
        0 => 'Antrian',
        1 => 'Proses',
        2 => 'Selesai'
    ];
    return $statuses[$status] ?? '???';
}
