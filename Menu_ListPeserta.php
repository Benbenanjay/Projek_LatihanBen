<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="List.css">
</head>

<body>
    <?php
    define('FILE_JSON', 'list.json'); // jadi ini buat nyimpen nama file JSON-nya, biar gampang dipanggil terus-terusan


    function cekFileJson()
    {
        if (!file_exists(FILE_JSON)) {
            file_put_contents(FILE_JSON, json_encode([])); // ini kalau file-nya belum ada, langsung bikin file kosong(isi array kosong)
        }
        $json = file_get_contents(FILE_JSON); // ini untuk ambil isi JSON-nya
        return json_decode($json, true); //ini untuk terus ubah dari JSON jadi array biasa, biar bisa diproses di PHP
    }

    $data_List = cekFileJson(); //yang ini untuk ambil data dari file JSON lewat fungsi tadi
    $total_data = count($data_List); //untuk hitung ada berapa data yang udah tersimpan

    if ($total_data == 0) {
        echo "<p>Belum ada data barang yang disimpan.</p>";
    } else {
        echo "<table border='2'>
        <tr>
        <th>no</th>
		  <th>kode</th>
		  <th>nama</th>
          <th>email</th>
		  <th>nohp</th>
		  <th>alamat</th>
        </tr>";

        for ($i = 0; $i < $total_data; $i++) {
            $peserta = $data_List[$i];

            // Menampilkan No
            echo "<tr><td>" . htmlspecialchars($peserta['no']) . "</td>";

            // Menampilkan Kode peserta
            echo "<td>" . htmlspecialchars($peserta['kode']) . "</td>";

            // Menampilkan Nama peserta
            echo "<td>" . htmlspecialchars($peserta['nama']) . "</td>";

            echo "<td>" . htmlspecialchars($peserta['email']) . "</td>";

            // Menampilkan nohp
            echo "<td>" . htmlspecialchars($peserta['nohp']) . "</td>";

            // Menampilkan alamat
            echo "<td>" . htmlspecialchars($peserta['alamat']) . "</td>";
        }
        echo "</table>";

        echo "<center><button onclick='window.location.href=\"Form_tambahPeserta.html\";'>Tambahkan Peserta</button></center>";
    }

    ?>
</body>

</html>