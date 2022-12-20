<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */

$tablar = array(
    'guncel_dersler' => 'Güncel Dersler',
    'onceki_dersler' => 'Önceki Dersler',
    'yonetilen_tezler' => 'Yönetilen Tezler'
);
$active = 'active';
?>
<div class="col-md-9" id="icerik">
    <h3 class="page-header">Eğitime Katkı</h3>


    <div role="tabpanel">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist" id="tab_egitime_katki">
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
                    <?php $this->load->view('egitime_katki/' . $key, array($key => $$key)); ?>
                </div>
                <?php $active = ''; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>

