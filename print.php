<?php

require_once __DIR__ . '/vendor/autoload.php';


require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");


$mpdf = new \Mpdf\Mpdf();
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
 <link rel="stylesheet" href="css/print.css">


</head>
<body>

<h1>daftar mahasiswa</h1>

<table border="1" cellpadding="10" cellspacing="0">
<tr>
    <th>No</th>
   
    <th>gambar</th>
    <th>nrp</th>
    <th>nama</th>
    <th>email</th>
    <th>jurusan</th>
</tr>';

$i = 1;
foreach ($mahasiswa as $row) {
    $html .= '<tr>
    <td>' . $i++ . '</td>
    <td><img src = "img/' . $row["gambar"] . ' " width="50"></td>
    <td>' . $row["nrp"] . '</td>
    <td>' . $row["nama"] . '</td>
    <td>' . $row["email"] . '</td>
    <td>' . $row["jurusan"] . '</td>


    </tr>';
}

$html .= '</table>

</body>
</html>';



$mpdf->WriteHTML($html);
$mpdf->Output('daftar-mahasiswa.pdf', \Mpdf\Output\Destination::INLINE);

// $mpdf->Output('daftar-mahasiswa.pdf', \Mpdf\Output\Destination::DOWNLOAD);

// $mpdf->Output('daftar-mahasiswa.pdf', 'D');
