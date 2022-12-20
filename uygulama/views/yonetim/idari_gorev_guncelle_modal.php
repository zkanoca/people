<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
$this->load->helper('url');
$this->load->helper('form');


foreach ($idari_gorev as $ig):

    $form_url = 'idari-gorev-guncelle-islem/' . $ig->idari_gorevid;
    echo form_open($form_url, array('class' => 'well well-lg', 'id' => 'form_idari_gorev_guncelle'));
    ?>
    <?php
    /*     * **************** */

    echo form_open('idari-gorev-ekle-islem', array('class' => 'well well-lg', 'id' => 'form_idari_gorev_ekle'));
    ?>
    <div class="form-group row">
        <label for="gorev">Görev</label>
        <?php
        $gorev = array(
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'gorev',
            'name' => 'gorev',
            'value' => $ig->gorev
        );
        ?>
        <?php echo form_input($gorev); ?>

        <label for="birim">Birim</label>
        <?php
        $birim = array(
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'birim',
            'name' => 'birim',
            'value' => $ig->birim
        );
        ?>
        <?php echo form_input($birim); ?>




    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label for="baslangic">Başlangıç Tarihi</label>
            <?php
            $baslangic = array(
                'type' => 'text',
                'class' => 'form-control',
                'id' => 'baslangic',
                'name' => 'baslangic',
                'value' => $ig->baslangic
            );
            ?>
            <?php echo form_input($baslangic); ?>
        </div>
        <div class="col-md-6">
            <label for="bitis">Bitiş Tarihi</label>
            <?php
            $bitis = array(
                'type' => 'text',
                'class' => 'form-control',
                'id' => 'bitis',
                'name' => 'bitis',
                'value' => $ig->bitis
            );
            ?>
            <?php echo form_input($bitis); ?>

        </div>
    </div>
    <?php
    echo form_hidden('idari_gorevid', $ig->idari_gorevid);

    echo form_close();
    /*     * **************** */

endforeach;




