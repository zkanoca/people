<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */

function ayir($x, $class = "default") {
    $y = explode(";", $x);
    $sonuc = "<ul class=\"list-inline\">";
    foreach ($y as $z) {
        $sonuc .= "<li><a class=\"ayrik-btn btn btn-sm btn-$class\" target=\"_blank\" href=\"http://scholar.google.com.tr/scholar?hl=tr&q=$z\">$z</a></li>";
    }
    $sonuc .= "</ul>";

    return $sonuc;
}
?>

<div class="col-md-9" id="icerik">


    <h3>Özgeçmiş</h3>
    <div>
        <?php echo $hakkinda[0]->hakkinda; ?>
    </div>
    <hr>
    <h3>Öğrenim Bilgileri</h3>
    <div>
        <ul class="list-group">
            <?php foreach ($hakkinda as $ob): ?>
                <li class="list-group-item" id="<?php echo $ob->ogrenim_bilgiid; ?>">
                    <h4 class="list-group-item-heading"><?php echo $ob->derece; ?> - <small><?php echo $ob->mezuniyet_tarihi; ?></small></h4>
                    <p class="list-group-item-text"><?php echo $ob->universite; ?> - <?php echo $ob->program; ?></p>
                </li>
            <?php endforeach; ?> 
        </ul>






    </div>
    <hr>
    <h3>Uzmanlık Alanları</h3>
    <div>
        <?php echo ayir($hakkinda[0]->uzmanlik_alanlari, "primary"); ?>
    </div>
    <hr>
    <h3>Araştırma Alanları</h3>
    <div>
        <?php echo ayir($hakkinda[0]->calisma_alanlari, "info"); ?>
    </div>
</div>

