<?php

foreach ($ruangan as $ruangan) {
    $no = 1;
    $response = array();
    $response["data"] = array();
    $h['id_ruangan'] = $ruangan['id_ruangan'];
    $h['nama_ruangan'] = $ruangan['nama_ruangan'];
    $h['tanggal'] = $ruangan['tanggal'];
    $h['waktu_mulai'] = $ruangan['waktu_mulai'];
    $h['waktu_berakhir'] = $ruangan['waktu_berakhir'];
    $h['kontak'] = $ruangan['kontak'];
    $h['keterangan'] = $ruangan['keterangan'];
    array_push($response["data"], $h);

    echo json_encode($response);
}
