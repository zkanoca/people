<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
?>



<ul class="list-group">
    <?php foreach ($uyelikler as $u): ?>
        <li class="list-group-item" id="<?php echo $u->uyelikid; ?>">
            <p><span class="label label-success" data-toggle="tooltip" data-placement="top" title="Üyelik Başlangıç Tarihi"><i class="fa fa-play"></i> <?php echo date('d.m.Y',
            strtotime($u->baslangic));
        ?></span><span class="label label-danger" data-toggle="tooltip" data-placement="top" title="Üyelik Bitiş Tarihi"> <i class="fa fa-stop"></i> <?php echo trim($u->bitis) !== '' ? date('d.m.Y',
                                strtotime($u->bitis)) : 'Halen';
                ?></span></p>
            <h4 class="list-group-item-heading" data-toggle="tooltip" data-placement="top" title="Topluluk"><?php echo $u->topluluk; ?> <small><?php echo $u->uyelik_turu; ?></small></h4>
        </li>
<?php endforeach; ?> 
</ul>