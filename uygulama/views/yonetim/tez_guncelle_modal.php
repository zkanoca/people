<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
$this->load->helper('url');
$this->load->helper('form');


foreach ($tezler as $t):

    $form_url = 'tez-guncelle-islem/' . $t->tezid;
    echo form_open($form_url,
            array('class' => 'well well-lg', 'id' => 'form_tez_guncelle'));
    ?>
    <div class="form-group">
        <label for="baslik">Tez Başlığı</label>
        <?php
        $baslik = array(
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'baslik',
            'name' => 'baslik',
            'value' => $t->baslik
        );

        echo form_input($baslik);
        ?>
        <label for="yazar">Yazar</label>
        <?php
        $yazar = array(
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'yazar',
            'name' => 'yazar',
            'value' => $t->yazar
        );

        echo form_input($yazar);
        ?>

        <label for="universite">Üniversite</label>
        <?php
        $universite = array(
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'universite',
            'name' => 'universite',
            'value' => $t->universite
        );

        echo form_input($universite);
        ?>

        <label for="enstitu">Enstitü</label>
        <?php
        $enstitu = array(
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'enstitu',
            'name' => 'enstitu',
            'value' => $t->enstitu
        );

        echo form_input($enstitu);
        ?>

        <label for="abd">Anabilim Dalı</label>
        <?php
        $abd = array(
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'abd',
            'name' => 'abd',
            'value' => $t->abd
        );

        echo form_input($abd);
        ?>
        <label for="konu">Tez Konusu</label>
        <?php
        $konu = array(
            'rows' => '2',
            'class' => 'form-control',
            'id' => 'konu',
            'name' => 'konu',
        );

        echo form_textarea($konu, $t->konu);
        ?>



    </div>
    <div class="form-group row">

        <div class="col-md-6">
            <label for="tez_turid">Tez Türü</label>
            <?php
            foreach ($tez_turleri as $tt) {
                $data_tt[$tt->tez_turid] = $tt->tez_turu;
            }

            echo form_dropdown('tez_turid', $data_tt, $t->tez_turid,
                    array('class' => 'form-control'));
            ?>
        </div>
        <div class="col-md-6">
            <label for="tez_kurum_turid">Tez Kurum Türü</label>
            <?php
            foreach ($tez_kurum_turleri as $tkt) {
                $data_tkt[$tkt->tez_kurum_turid] = $tkt->tez_kurum_turu;
            }

            echo form_dropdown('tez_kurum_turid', $data_tkt,
                    $t->tez_kurum_turid, array('class' => 'form-control'));
            ?>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label for="yil">Yıl</label>
            <?php
            $yil = array(
                'type' => 'number',
                'class' => 'form-control',
                'id' => 'yil',
                'name' => 'yil',
                'value' => $t->yil
            );
            echo form_input($yil);
            ?>
        </div>
        <div class="col-md-6">
            <label for="tez_danismanlik_turid">Danışmanlık Türü</label>
            <?php
            foreach ($tez_danismanlik_turleri as $tdt) {
                $data_tdt[$tdt->tez_danismanlik_turid] = $tdt->tez_danismanlik_turu;
            }

            echo form_dropdown('tez_danismanlik_turid', $data_tdt,
                    $t->tez_danismanlik_turid, array('class' => 'form-control'));
            ?>
        </div>
    </div>
    <?php
    echo form_hidden('tezid', $t->tezid);

    echo form_close();
    /*     * **************** */

endforeach;




