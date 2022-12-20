<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
$i = 0;
$bk = '';
?>
<div id="bildiriler">
    <?php foreach ($bildiriler as $b): ?>

        <?php if ($bk !== $b->bildiri_kategorisi): ?>
            <h4 class="text-success"><?php echo $b->bildiri_kategorisi; ?></h4>
            <?php $bk = $b->bildiri_kategorisi; ?>
        <?php endif; ?>

        <div id="bildiri-<?php echo $b->bildiriid; ?>" class="well-sm">
            <p><span class="label label-default"><?php echo ++$i; ?></span> <?php echo yazarlar($b->yazarlar, $b->yazar_siralamasi, $b->yazar_sayisi) ?>, (<?php echo date('Y', strtotime($b->etkinlik_baslangic_tarihi)) ?>). <strong><?php if (strlen(trim($b->url1)) > 4): ?>
                        <a href="<?php echo $b->url1 ?>" target="_blank">"<?php echo $b->baslik ?>"</a>
                    <?php else: ?>
                        "<?php echo $b->baslik ?>"
                    <?php endif; ?></strong><em>

                    <?php if (strlen(trim($b->url2)) > 4): ?>
                        <a href="<?php echo $b->url2 ?>" target="_blank">"<?php echo $b->etkinlik_adi ?>"</a>
                    <?php else: ?>
                        "<?php echo $b->etkinlik_adi ?>"
                    <?php endif; ?>


                </em>, <em><?php echo $b->cilt; ?>(<?php echo $b->sayi; ?>)</em>, <?php echo $b->ilk_sayfa; ?>-<?php echo $b->son_sayfa; ?>. DOI: <?php echo $b->doi; ?>, ISSN: <?php echo $b->issn; ?>.</p>
            <?php 
            /*
<!--            <p>
                <?php if (trim($b->url1) !== ''): ?>
                    <a class="btn btn-xs btn-block btn-primary" href="<?php echo $m->url1; ?>" target="_blank"><?php echo $b->url1_etiket ?></a>
                <?php endif; ?>
                <?php if (trim($b->url2) !== ''): ?>
                    <br><a class="btn btn-xs btn-block btn-info" href="<?php echo $b->url2; ?>" target="_blank"><?php echo $b->url2_etiket ?></a>
                <?php endif; ?>
            </p>-->
             * 
             */
            ?>
        </div>
    <?php endforeach; ?>
</div>

 
