<?php

namespace Unit;

class Date
{
    public function countDate($tgl1, $tgl2)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal_1 = date_create($tgl1);
        $tanggal_2 = date_create($tgl2);
        if (date_diff($tanggal_1, $tanggal_2)->format("%a") > 0) {

            return date_diff($tanggal_1, $tanggal_2)->format("%a");
        } else {
            return 'error';
        }
    }
}
