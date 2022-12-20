<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */

$i = 0;
?>
<ul class="list-group" id="sanat-etkinlikleri">
    <?php foreach ($sanat_etkinlikleri as $se): ?>
        <li class="list-group-item" id="sanat-etkinlik-<?php echo $se->sanat_etkinlikid; ?>"><h4 class="list-group-item-heading">

                <?php if (trim($se->url) !== ''): ?>
                    <a href="<?php echo $se->url ?>" target="_blank"><?php echo $se->sanat_etkinlik_adi ?></a>
                <?php else: ?>
                    <?php echo $se->sanat_etkinlik_adi ?>
                <?php endif; ?>


            </h4><p class="list-group-item-text"><span class="label label-success"><?php echo date('d.m.Y', strtotime($se->tarih)); ?></span> <?php echo $se->sehir; ?>/<?php echo $se->ulke; ?> </p></li>
        <?php endforeach; ?>
</ul>
