<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
?>

<div class="col-md-9" id="icerik">

    <h3 class="page-header">Duyurular</h3>

    <div class="list-group">


        <?php foreach ($duyuru as $d): ?>

            <a href="<?php echo base_url($user . "/duyuru/".$d->takma_ad); ?>" class="list-group-item"><?php echo $d->baslik ?> <span class="label label-primary pull-right"><?php echo date("d.m.Y", strtotime($d->tarih)); ?></span></a>

        <?php endforeach; ?>
    </div>
</div>