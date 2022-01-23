<?php
echo xml_convert("<data>");
echo "<br>";
echo "<br>";
foreach ($ruangan as $ruangan) {
    echo xml_convert('<id>' . $ruangan['id_ruangan'] . '</id>');
    echo "<br>";
    echo xml_convert('<nama>' . $ruangan['nama_ruangan'] . '</nama>');
    echo "<br>";
    echo xml_convert('<tanggal>' . $ruangan['tanggal'] . '</tanggal>');
    echo "<br>";
    echo xml_convert('<waktu_mulai>' . $ruangan['waktu_mulai'] . '</waktu_mulai>');
    echo "<br>";
    echo xml_convert('<waktu_berakhir>' . $ruangan['waktu_berakhir'] . '</waktu_berakhir>');
    echo "<br>";
    echo xml_convert('<kontak>' . $ruangan['kontak'] . '</kontak>');
    echo "<br>";
    echo xml_convert('<keterangan>' . $ruangan['keterangan'] . '</keterangan>');
    echo "<br>";
    echo "<br>";
}
echo xml_convert("</data>");
