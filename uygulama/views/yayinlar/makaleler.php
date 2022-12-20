<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
$i = 0;
$mk = '';
?>
<div id="makaleler">


    <?php foreach ($makaleler as $m): ?>

        <?php if ($mk !== $m->makale_kategorisi): ?>
            <h4 class="text-success"><?php echo $m->makale_kategorisi; ?></h4>
            <?php $mk = $m->makale_kategorisi; ?>
        <?php endif; ?>

        <div id="makale-<?php echo $m->makaleid; ?>" class="well-sm">
            <p><span class="label label-default"><?php echo ++$i; ?></span> <?php echo yazarlar($m->yazarlar, $m->yazar_siralamasi, $m->yazar_sayisi) ?>, (<?php echo $m->yil ?>). <strong><?php if (strlen(trim($m->url1)) > 4): ?>
                        <a href="<?php echo $m->url1 ?>" target="_blank">"<?php echo $m->baslik ?>"</a>
                    <?php else: ?>
                        "<?php echo $m->baslik ?>"
                    <?php endif; ?></strong><em>

                    <?php if (strlen(trim($m->url2)) > 4): ?>
                        <a href="<?php echo $m->url2 ?>" target="_blank">"<?php echo $m->dergi ?>"</a>
                    <?php else: ?>
                        "<?php echo $m->dergi ?>"
                    <?php endif; ?>


                </em>, <em><?php echo $m->cilt; ?>(<?php echo $m->sayi; ?>)</em>, <?php echo $m->ilk_sayfa; ?>-<?php echo $m->son_sayfa; ?>. DOI: <?php echo $m->doi; ?>, ISSN: <?php echo $m->issn; ?>.</p>
<!--            <p>
                <?php if (trim($m->url1) !== ''): ?>
                    <a class="btn btn-xs btn-block btn-primary" href="<?php echo $m->url1; ?>" target="_blank"><?php echo $m->url1_etiket ?></a>
                <?php endif; ?>
                <?php if (trim($m->url2) !== ''): ?>
                    <br><a class="btn btn-xs btn-block btn-info" href="<?php echo $m->url2; ?>" target="_blank"><?php echo $m->url2_etiket ?></a>
                <?php endif; ?>
            </p>-->
        </div>
    <?php endforeach; ?>

</div>



