<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
?>
<ul class="list-group">
    <?php foreach ($ogrenim_bilgileri as $ob): ?>
        <li class="list-group-item" id="<?php echo $ob->ogrenim_bilgiid; ?>">
            <h4 class="list-group-item-heading"><?php echo $ob->derece; ?> - <small><?php echo $ob->mezuniyet_tarihi; ?></small></h4>
            <p class="list-group-item-text"><?php echo $ob->universite; ?> - <?php echo $ob->program; ?></p>
        </li>
    <?php endforeach; ?> 
</ul>