<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */

$i = 0;
?>
<ul class="list-group" id="bilimsel-raporlar">
    <?php foreach ($bilimsel_raporlar as $br): ?>
        <li class="list-group-item" id="bilimsel-rapor-<?php echo $br->bilimsel_raporid; ?>"><h4 class="list-group-item-heading">

                <?php if (trim($br->url) !== ''): ?>
                    <a href="<?php echo $br->url ?>" target="_blank"><?php echo $br->bilimsel_rapor_adi ?></a>
                <?php else: ?>
                    <?php echo $br->bilimsel_rapor_adi ?>
                <?php endif; ?>


            </h4><p class="list-group-item-text"><span class="label label-success"><?php echo date('d.m.Y', strtotime($br->tarih)); ?></span> <?php echo $br->sehir; ?>/<?php echo $br->ulke; ?> </p></li>
        <?php endforeach; ?>
</ul>
