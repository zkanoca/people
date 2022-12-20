<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
?>
<ul class="list-group">

    <?php foreach ($editorlukler as $e): ?>

        <li class="list-group-item" id="editorluk-<?php echo $e->editorlukid; ?>">
            <h4 class="list-group-item-heading"><?php echo $e->editorluk_gorevi; ?></h4>
            <h5 class="list-group-item-heading"><?php echo $e->yayin_adi; ?></h5>
            <p class="list-group-item-heading"><?php echo $e->yayinevi; ?></p>
            <p class="list-group-item-heading"><span class="label label-default">DOI: <?php echo $e->doi; ?></span>
                <span class="label label-success"><?php echo $e->yil; ?></span>
                <span class="label label-info"><?php echo $e->sehir; ?></span>
                <span class="label label-info"><?php echo $e->ulke; ?></span>

            </p>

        </li>

    <?php endforeach; ?>
</ul>

