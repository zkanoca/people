<!DOCTYPE HTML>
<!--
        Özkan ÖZLÜ
        Abant İzzet Baysal Üniversitesi
        Bilgi İşlem Daire Başkanlığı
      
-->
<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
$unvan = '';
$doktora = '';
$adi = '';
$soyadi = '';
$content = 'Abant İzzet Baysal Üniversitesi akademik personeli için Akademik Personel Profil Sayfası';
if (isset($header[0])) {
    $unvan = $header[0]->unvan;
    $doktora = $header[0]->doktora;
    $adi = $header[0]->adi;
    $soyadi = $header[0]->soyadi;

    $content = 'Abant İzzet Baysal Üniversitesi, ' . $unvan . ' ' . $doktora == '1' ? 'Dr. ' : '' . " " . $adi . " " . $soyadi . ' için Akademik Personel Profil Sayfası';
}
?>

<html>
    <head> 
        <meta name="Description" content="<?php echo $content ?>">
        <meta name="author" content="Uzman Özkan ÖZLÜ">

        <meta charset="utf-8" />
    <title><?php echo $unvan . " " . $doktora == '1' ? 'Dr. ' : '' . " " . $adi . " " . $soyadi ?></title>
    <?php
    $this->load->helper('html');
    $this->load->helper('url');

    echo link_tag('assets/css/bootstrap.min.css');
    //echo link_tag('assets/css/bootstrap-theme.min.css');
    //echo link_tag('assets/css/font-awesome.css');

    echo link_tag('assets/css/lumen.css');
    echo link_tag('assets/css/people.css');
    ?> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script defer src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script defer src="<?php echo base_url('assets/js/baslangic.js'); ?>"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    </head>

    <body>


<?php 
 

