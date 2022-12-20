<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
$this->load->helper('url');
$this->load->helper('form');


foreach ($oduller as $o):

    $form_url = 'odul-guncelle-islem/' . $o->odulid;
    echo form_open($form_url, array('class' => 'well well-lg', 'id' => 'form_odul_guncelle'));
    ?>
    <?php
    /*     * **************** */
    echo form_open('odul-ekle-islem', array('class' => 'well well-lg', 'id' => 'form_odul_ekle'));
    ?>
    <div class="form-group row">
        <label for="odul">Ödül</label>
        <?php
        $odul = array(
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'odul',
            'name' => 'odul',
            'value' => $o->odul
        );
        ?>
        <?php echo form_input($odul); ?>

        <label for="veren">Veren Taraf</label>
        <?php
        $veren = array(
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'veren',
            'name' => 'veren',
            'value' => $o->veren
        );
        ?>
        <?php echo form_input($veren); ?>

        <label for="aciklama">Açıklama</label>
        <?php
        $aciklama = array(
            'class' => 'form-control',
            'id' => 'aciklama',
            'name' => 'aciklama',
            'rows' => '3'
        );
        ?>
        <?php echo form_textarea($aciklama, $o->aciklama); ?>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label for="odul_kurulus_turid">Ödül Veren Kurum/Kuruluş Türü</label>
            <?php
            foreach ($odul_kurulus_turleri as $okt) {
                $data_okt[$okt->odul_kurulus_turid] = $okt->odul_kurulus_turu;
            }
            ?>
            <?php echo form_dropdown('odul_kurulus_turid', $data_okt, $o->odul_kurulus_turid, array('class' => 'form-control')); ?>
        </div>
        <div class="col-md-6">
            <label for="tarih">Ödül Veriliş Tarihi</label>
            <?php
            $tarih = array(
                'type' => 'text',
                'class' => 'form-control',
                'id' => 'tarih',
                'name' => 'tarih',
                'value' => $o->tarih
            );
            ?>
            <?php echo form_input($tarih); ?>

        </div>
    </div>
    <?php
    echo form_hidden('odulid', $o->odulid);

    echo form_close();
    /*     * **************** */

endforeach;




