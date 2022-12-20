<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
$i = 1;
?>
<ul class="list-group" id="list_projeler">
    <?php foreach ($projeler as $p): ?>
        <li id="proje-<?php echo $p->projeid; ?>" class="list-group-item"> 

            <p>
                <span class="label label-warning" data-toggle="tooltip" data-placement="top" title="Proje Kodu"><span class="fa fa-qrcode"></span> <?php echo $p->kod; ?></span>
                <span class="label label-success" data-toggle="tooltip" data-placement="top" title="Proje Başlangıç Tarihi"><span class="fa fa-play"></span> <?php echo date('d.m.Y', strtotime($p->baslangic)); ?></span>
                <span class="label label-danger" data-toggle="tooltip" data-placement="top" title="Proje Bitiş Tarihi"><span class="fa fa-stop"></span> <?php echo date('d.m.Y', strtotime($p->bitis)); ?></span>

                <span class="label label-default" data-toggle="tooltip" data-placement="top" title="Proje Bütçesi"><span class="fa fa-money"></span> <?php echo $p->butce; ?> <?php echo $p->para_birimi; ?></span> 
                <span class="label label-info" data-toggle="tooltip" data-placement="top" title="Proje Süresi"><span class="fa fa-clock-o"></span> <?php echo $p->sure; ?> ay <?php
                    if ($p->ek_sure > 0) {
                        echo '(ek: ' . $p->ek_sure . ' ay)';
                    }
                    ?></span>
            </p>
            <h4 class="list-group-item-heading"><?php echo $p->baslik; ?></h4>

            <p class="pull-left"><strong>Rolü:</strong> <?php echo $p->proje_rolu; ?></p><p class="pull-right"> <strong>Yürütücü:</strong> <?php echo $p->sahip; ?></p>

            <p class="clearfix"></p>

    <?php if (trim($p->katkida_bulunanlar) !== '') : ?>
                <p><strong>Katkıda Bulunanlar</strong></p>

                <p><?php echo $p->katkida_bulunanlar; ?></p>
            <?php endif; ?>

<?php endforeach; ?>

</ul>
<?php 
//var_dump($projeler);


