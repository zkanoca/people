<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */

$tablar = array('makaleler' => 'Makaleler',
    'bildiriler' => 'Bildiriler',
    'kitaplar' => 'Kitaplar',
    'patentler' => 'Patentler',
    'sanat_etkinlikleri' => 'Sanat Etkinlikleri',
    //'bilimsel_raporlar' => 'Bilimsel Raporlar',
    //'spor_etkinlikleri' => 'Spor Etkinlikleri'
);
$active = 'active';
?>
<div class="col-md-9" id="icerik">
    <h3 class="page-header">Yayınlar</h3>


    <div role="tabpanel">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist" id="tab_yayinlar">
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
                    <?php $this->load->view('yayinlar/' . $key, array($key => $$key)); ?>
                </div>
                <?php $active = ''; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>

