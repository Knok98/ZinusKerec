<?php

header('Content-Type: application/json; charset=utf-8');


if(!isset($_POST['ico'])) {
    die('Chybý parametr ico!');
}

$ico = $_POST['ico'];
$data = file_get_contents('https://wwwinfo.mfcr.cz/cgi-bin/ares/darv_std.cgi?ico=' . $ico);


$xml = simplexml_load_string($data);


// Přístup k jednotlivým elementům a jejich hodnotám pomocí XPath
$pocetZaznamu = $xml->xpath('//are:Pocet_zaznamu')[0];
if($pocetZaznamu == 1) {
    $ico = $xml->xpath('//are:ICO')[0];
    $firma = $xml->xpath('//are:Obchodni_firma')[0];
    $okres = $xml->xpath('//dtt:Nazev_okresu')[0];
    $obec = $xml->xpath('//dtt:Nazev_obce')[0];
    $cisloDom = $xml->xpath('//dtt:Cislo_domovni')[0];
} else {
    $ico = "";
    $firma = "";
    $okres = "";
    $obec = "";
    $cisloDom = "";
}
$vystup = ['ico' => $ico, 'firma' => $firma, 'obec' => $obec, 'okres' => $okres];

$vystup = json_encode($vystup);
echo $vystup;