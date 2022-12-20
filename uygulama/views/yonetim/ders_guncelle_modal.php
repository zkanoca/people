<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
$this->load->helper('url');
$this->load->helper('form');


foreach ($dersler as $d):

    $form_url = 'ders-guncelle-islem/' . $d->dersid;
    echo form_open($form_url,
            array('class' => 'well well-lg', 'id' => 'form_ders_guncelle'));
    ?>
    <div class="form-group">
        <label for="ders">Ders</label>
        <?php
        $ders = array(
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'ders',
            'name' => 'ders',
            'value' => $d->ders
        );

        echo form_input($ders);
        ?>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label for="ders_kodu">Ders Kodu</label>
            <?php
            $ders_kodu = array(
                'type' => 'text',
                'class' => 'form-control',
                'id' => 'ders_kodu',
                'name' => 'ders_kodu',
                'value' => $d->ders_kodu
            );

            echo form_input($ders_kodu);
            ?>
        </div>
        <div class="col-md-4">
            <label for="ders_dereceid">Derece</label>
            <?php
            foreach ($ders_dereceleri as $dd) {
                $data_dd[$dd->ders_dereceid] = $dd->ders_derecesi;
            }

            echo form_dropdown('ders_dereceid', $data_dd, $d->ders_dereceid,
                    array('class' => 'form-control'));
            ?>
        </div>
        <div class="col-md-4">
            <label for="dilid">Dersin Dili</label>
            <?php
            foreach ($diller as $di) {
                $data_di[$di->dilid] = $di->dil;
            }

            echo form_dropdown('dilid', $data_di, $d->dilid,
                    array('class' => 'form-control'));
            ?>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label for="haftalik_ders_saati">Haftalık Ders Saati</label>
            <?php
            $haftalik_ders_saati = array(
                'type' => 'text',
                'class' => 'form-control',
                'id' => 'haftalik_ders_saati',
                'name' => 'haftalik_ders_saati',
                'value' => $d->haftalik_ders_saati
            );
            echo form_input($haftalik_ders_saati);
            ?>
        </div>
        <div class="col-md-4">
            <label for="baslangic">Başlangıç</label>
            <?php
            $baslangic = array(
                'type' => 'text',
                'class' => 'form-control',
                'id' => 'baslangic',
                'name' => 'baslangic',
                'value' => $d->baslangic
            );
            echo form_input($baslangic);
            ?>
        </div>
        <div class="col-md-4">
            <label for="bitis">Bitiş</label>
            <?php
            $bitis = array(
                'type' => 'text',
                'class' => 'form-control',
                'id' => 'bitis',
                'name' => 'bitis',
                'value' => $d->bitis
            );
            echo form_input($bitis);
            ?>
        </div>
    </div>
    <?php
    echo form_hidden('dersid', $d->dersid);

    echo form_close();
    /*     * **************** */

endforeach;




