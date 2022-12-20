<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
?>
<ul class="list-group">

    <?php foreach ($hakemlikler as $e): ?>

        <li class="list-group-item" id="editorluk-<?php echo $e->hakemlikid; ?>">
            <h5 class="list-group-item-heading"><?php echo $e->yayin_adi; ?></h5>
            <p class="list-group-item-text">
                <span class="label label-success" data-toggle="tooltip" data-placement="top" title="Editörlük Başlangıç Tarihi"><span class="fa fa-play"></span> <?php echo date('d.m.Y', strtotime($e->baslangic)); ?></span>
                <?php if (trim($e->bitis) !== '') : ?>
                    <span class="label label-danger" data-toggle="tooltip" data-placement="top" title="Editörlük Bitiş Tarihi"><span class="fa fa-stop"></span> <?php echo date('d.m.Y', strtotime($e->bitis)); ?></span>
                <?php endif; ?>
            </p>

        </li>

    <?php endforeach; ?>
</ul>


