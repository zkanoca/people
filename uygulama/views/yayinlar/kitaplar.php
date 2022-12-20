<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
$i = 0;
?>
<ul class="list-group" id="kitaplar">
    <?php foreach ($kitaplar as $k): ?>
        <li class="list-group-item" id="kitap-<?php echo $k->kitapid; ?>"><h4 class="list-group-item-heading">

                <?php if (trim($k->url) !== ''): ?>
                    <a href="<?php echo $k->baslik ?>" target="_blank"><?php echo $k->baslik ?></a>
                <?php else: ?>
                    <?php echo $k->baslik ?>
                <?php endif; ?>


            </h4><p class="list-group-item-text"><?php echo $k->yazarlar ?><br><?php echo $k->yayinevi ?>, <?php echo $k->baski ?>. Baskı, <?php echo $k->sayfa_sayisi ?> sayfa, <?php echo $k->sehir; ?>, <?php echo $k->yil ?>, ISBN: <?php echo $k->isbn; ?></p></li>
            <?php endforeach; ?>
</ul>
