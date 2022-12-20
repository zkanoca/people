<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */

$tablar = array('projeler' => 'Projeler',
 'oduller' => 'Ödüller',
 'uyelikler' => 'Üyelikler',
 'idari_gorevler' => 'İdari Görevler',
 'editorlukler' => 'Editörlükler',
 'hakemlikler' => 'Hakemlikler',
 'bilimsel_etkinlikler' => 'Bilimsel Etkinlikler',
 'ogrenim_bilgileri' => 'Öğrenim Bilgileri',
 //'diger-akademik-calismalar' => 'Diğer Akademik Çalışmalar'
);
$active = 'active';
?>
<div class="col-md-9" id="icerik">
    <h3 class="page-header">Akademik</h3>


    <div role="tabpanel">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist" id="tab_akademik">
            <?php foreach ($tablar as $key => $value): ?>
                <li role="presentation" class="<?php echo $active; ?>"><a href="#<?php echo $key; ?>" aria-controls="<?php echo $key; ?>" role="tab" data-toggle="tab"><small><?php echo $value; ?></small></a></li>
                <?php $active = ''; ?>
            <?php endforeach; ?>
        </ul>
        <?php $active = 'in active'; ?>
        <div class="tab-content">
            <?php foreach ($tablar as $key => $value): ?>
                <div role="tabpanel" class="tab-pane fade <?php echo $active; ?>" id="<?php echo $key; ?>">
                    <h4 class="page-header"><?php echo $value; ?></h4>
                    <?php $this->load->view('akademik/' . $key, array($key => $$key)); ?>
                </div>
                <?php $active = ''; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>

