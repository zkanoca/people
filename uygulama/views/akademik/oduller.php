<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
?>
<ul class="list-group">
    <?php foreach ($oduller as $o): ?>
        <li class="list-group-item" id="<?php echo $o->odulid; ?>">
            <h4 class="list-group-item-heading"><?php echo $o->odul; ?> <small><?php echo $o->veren; ?></small></h4> <span class="label label-info pull-right"><?php echo date('d.m.Y', strtotime($o->tarih)); ?></span>
            <p class="list-group-item-text"><?php echo $o->aciklama; ?></p>
        </li>
    <?php endforeach; ?> 
</ul>
