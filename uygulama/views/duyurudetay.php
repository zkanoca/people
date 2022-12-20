<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */

?>

<div class="col-md-9" id="icerik">
    <h3 class="page-header"><?php echo $duyurudetay[0]->baslik; ?> <small><span class="label label-primary pull-right"><?php echo date("d.m.Y", strtotime($duyurudetay[0]->tarih)); ?></span></small></h3>
    <p><?php echo $duyurudetay[0]->metin; ?></p>

    
    <p><a href="<?php echo base_url($user."/duyurular");?>" class="btn btn-info"><i class="fa fa-long-arrow-left"></i> Tüm Duyurular</a></p>
</div>
