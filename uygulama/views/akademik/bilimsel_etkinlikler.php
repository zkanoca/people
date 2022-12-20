<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
?>

<ul class="list-group">
    <?php foreach ($bilimsel_etkinlikler as $be): ?>
        <li class="list-group-item" id="<?php echo $be->bilimsel_etkinlikid; ?>">
            <h4 class="list-group-item-heading" data-toggle="tooltip" data-placement="top" title="Etkinlik Adı"><?php echo $be->bilimsel_etkinlik; ?></h4>
            <span class="label label-info pull-right" data-toggle="tooltip" data-placement="top" title="Etkinlik Tarihi"><?php echo date('d.m.Y', strtotime($be->tarih)); ?></span>  

        </li>
    <?php endforeach; ?> 
</ul>