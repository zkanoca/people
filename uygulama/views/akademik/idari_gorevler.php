<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
?>
 


<ul class="list-group">
    <?php foreach ($idari_gorevler as $ig): ?>
        <li class="list-group-item" id="<?php echo $ig->idari_gorevid; ?>">
            <p><span class="label label-success" data-toggle="tooltip" data-placement="top" title="Görev Başlangıç Tarihi"><i class="fa fa-play"></i> <?php echo date('d.m.Y', strtotime($ig->baslangic)); ?></span><span class="label label-danger" data-toggle="tooltip" data-placement="top" title="Görev Bitiş Tarihi"> <i class="fa fa-stop"></i> <?php echo trim($ig->bitis) !== '' ? date('d.m.Y', strtotime($ig->bitis)) : 'Halen'; ?></span></p>
            <h4 class="list-group-item-heading"><?php echo $ig->gorev; ?> - <small><?php echo $ig->birim; ?></small></h4>
        </li>
    <?php endforeach; ?> 
</ul>