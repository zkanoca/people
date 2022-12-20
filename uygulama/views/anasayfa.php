<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */

$tamAdi = '';
$fotograf = '';
$telefon = '';
$gsm = '';
$faks = '';
$eposta = '';
$birim = '';
$dahili = '';





foreach ($anasayfa as $a) {
    $tamAdi = $a->unvan . ' ' . doktora($a->doktora) . ' ' . $a->adi . ' ' . $a->soyadi;

    $fotograf = $a->fotograf;
    $telefon = $a->telefon;
    $gsm = $a->gsm;
    $faks = $a->faks;
    $eposta = $a->eposta;
    $birim = $a->birim;
    $dahili = $a->dahili;
}

var_dump($_SESSION);
?>

<div class="jumbotron" id="kunye-container">
    <div class="container">
        <div class="col-md-3">
            <div class="text-center fotograf container">
                <div class="fotograf-cercevesi">
                    <img src=" <?php echo $fotograf; ?>" class="img-rounded badge-fotograf" alt="<?php echo $tamAdi; ?>" title=" <?php echo $tamAdi; ?>" />
                </div>
            </div>
        </div>
        <div class="col-md-9 text-center">
            <h1> <?php echo $tamAdi ?></h1>    
            <h3><?php echo $birim; ?></h3>

            <hr>
            <ul class="list-inline">
                <?php if (strlen($telefon) > 0) : ?>
                    <li><i class="fa fa-phone"></i> <?php echo $telefon; ?> (<?php echo $dahili; ?>)</li>
                <?php endif; ?>
                <?php if (strlen($gsm) > 0) : ?>
                    <li><i class="fa fa-mobile-phone"></i> <?php echo $gsm; ?></li>
                <?php endif; ?>
                <?php if (strlen($faks) > 0) : ?>
                    <li><i class="fa fa-fax"></i> <?php echo $faks; ?></li>
                <?php endif; ?>
                <?php if (strlen($eposta) > 0) : ?>
                    <li><i class="fa fa-envelope"></i> <?php echo $eposta; ?>@ibu.edu.tr</li>
                    <?php endif; ?>
            </ul>
        </div>
    </div>
</div>




