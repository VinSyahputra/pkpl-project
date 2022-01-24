<?php

namespace Unit;

use Unit\Date;

class Calculate
{
    public function __construct()
    {
        $this->date = new Date;
    }
    public function showDate()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = $this->date->countDate('11-03-2000', '11-05-2000');
        return $date . ' hari';
    }
}
