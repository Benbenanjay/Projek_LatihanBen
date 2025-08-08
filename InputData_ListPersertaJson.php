<?php
define('FILE_JSON', 'list.json');

function cekFileJson()
{
    if (!file_exists(FILE_JSON)) {
        file_put_contents(FILE_JSON, json_encode([]));
    }
}

function bacaDataJson()
{
    return json_decode(file_get_contents(FILE_JSON), true);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    cekFileJson();

    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];

    $data_List = bacaDataJson();

    for ($i = 0; $i < count($data_List); $i++) {
        if ($data_List[$i]['kode'] == $kode) {
            echo "<script>alert('Nomor dengan Kode: $kode Sudah ada COY!');</script>";
            echo "<script>window.location.href = 'Form_tambahPeserta.html';</script>";
            exit;
        }
    }

    $no = count($data_List) + 1;

    $data_List[] = [
        'no' => $no,
        'kode' => $kode,
        'nama' => $nama,
        'email' => $email,
        'nohp' => $nohp,
        'alamat' => $alamat
    ];

    file_put_contents(FILE_JSON, json_encode($data_List, JSON_PRETTY_PRINT));
    echo "<script>alert('Data berhasil ditambahkan COY!');</script>";
    echo "<script>window.location.href = 'Form_tambahPeserta.html';</script>";
}
?>