<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
?>

<ul class="list-group">
<?php foreach ($yonetilen_tezler as $t): ?>
        <li class="list-group-item" id=tez-"<?php echo $t->tezid; ?>">
            <h4 class="list-group-item-heading text-primary"><?php echo $t->baslik; ?> <small><span class="label label-info"><?php echo $t->tur ?></span></small></h4>
            <p><small><?php echo $t->yazar; ?> - <?php echo $t->yil; ?>, <?php echo $t->universite; ?>, <?php echo $t->enstitu; ?>, <?php echo $t->abd; ?></small></p>
        </li>
<?php endforeach; ?>
</ul>
