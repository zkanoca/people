<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
$this->load->helper('url');
$this->load->helper('form');


foreach ($uyelikler as $u):

    $form_url = 'uyelik-guncelle-islem/' . $u->uyelikid;
    echo form_open($form_url,
            array('class' => 'well well-lg', 'id' => 'form_uyelik_guncelle'));
    ?>
    <div class="form-group">
        <label for="topluluk">Topluluk</label>
        <?php
        $topluluk = array(
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'topluluk',
            'name' => 'topluluk',
            'value' => $u->topluluk
        );
        ?>
        <?php echo form_input($topluluk); ?>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label for="uyelik_turid">Üyelik Türü</label>
            <?php
            foreach ($uyelik_turleri as $ut) {
                $data_ut[$ut->uyelik_turid] = $ut->uyelik_turu;
            }

            echo form_dropdown('uyelik_turid', $data_ut, $u->uyelik_turid,
                    array('class' => 'form-control'));
            ?>
        </div>
        <div class="col-md-6">
            <label for="uyelik_kurulus_turid">Topluluk Türü</label>
            <?php
            foreach ($uyelik_kurulus_turleri as $ukt) {
                $data_ukt[$ukt->uyelik_kurulus_turid] = $ukt->uyelik_kurulus_turu;
            }

            echo form_dropdown('uyelik_kurulus_turid', $data_ukt,
                    $u->uyelik_kurulus_turid, array('class' => 'form-control'));
            ?>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label for="baslangic">Başlangıç</label>
            <?php
            $baslangic = array(
                'type' => 'text',
                'class' => 'form-control',
                'id' => 'baslangic',
                'name' => 'baslangic',
                'value' => $u->baslangic
            );
            echo form_input($baslangic);
            ?>
        </div>
        <div class="col-md-6">
            <label for="bitis">Bitiş</label>
            <?php
            $bitis = array(
                'type' => 'text',
                'class' => 'form-control',
                'id' => 'bitis',
                'name' => 'bitis',
                'value' => $u->bitis
            );
            echo form_input($bitis);
            ?>
        </div>
    </div>
    <?php
    echo form_hidden('uyelikid', $u->uyelikid);

    echo form_close();
    /*     * **************** */

endforeach;




