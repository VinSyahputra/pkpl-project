<?php

use PHPUnit\Framework\TestCase;
use Unit\Date;
use Unit\Calculate;

class DateTest extends TestCase
{
    private $date;
    protected function setUp(): void
    {
        $this->date = new Date;
        $this->calculate = new Calculate;
    }
    protected function tearDown(): void
    {
        $this->date = null;
        $this->calculate = null;
    }

    public function test_fungsi_selisih()
    {
        $hasil = $this->date->countDate('11-03-2000', '11-05-2000');
        $ekspektasi = 61;

        $this->assertEquals($ekspektasi, $hasil);
    }

    public function test_tampilan()
    {
        $hasil = $this->calculate->showDate();

        $ekspektasi = '61 hari';
        $this->assertEquals($ekspektasi, $hasil);
    }
}
