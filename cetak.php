<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['debug' => true]);
$mpdf->WriteHTML('<h1>Hello world!</h1>');
$mpdf->Output();
