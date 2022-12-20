<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
$this->load->helper('url');
$this->load->helper('form');


foreach ($ogrenim_bilgileri as $ob):

    $form_url = 'ogrenim-bilgisi-guncelle-islem/' . $ob->ogrenim_bilgiid;
    echo form_open($form_url, array('class' => 'well well-lg', 'id' => 'form_ogrenim_bilgisi_guncelle'));
    ?>
    <div class="form-group row">
        <label for="universite">Üniversite</label>
        <?php
        $universite = array(
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'universite',
            'name' => 'universite',
            'value' => $ob->universite
        );
        ?>
        <?php echo form_input($universite); ?>

        <label for="okul">Enstitü/Fakülte/Yüksekokul</label>
        <?php
        $okul = array(
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'okul',
            'name' => 'okul',
            'value' => $ob->okul
        );
        ?>
        <?php echo form_input($okul); ?>

        <label for="program">Program</label>
        <?php
        $program = array(
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'program',
            'name' => 'program',
            'value' => $ob->program
        );
        ?>
        <?php echo form_input($program); ?>


    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label for="ogrenim_dereceid">Öğrenim Derecesi</label>
            <?php
            foreach ($ogrenim_dereceleri as $od) {
                $data_od[$od->ogrenim_dereceid] = $od->derece;
            }
            ?>
            <?php echo form_dropdown('ogrenim_dereceid', $data_od, $ob->ogrenim_dereceid, array('class' => 'form-control')); ?>
        </div>
        <div class="col-md-6">
            <label for="mezuniyet_tarihi">Mezuniyet Tarihi</label>
            <?php
            $mezuniyet_tarihi = array(
                'type' => 'text',
                'class' => 'form-control',
                'id' => 'mezuniyet_tarihi',
                'name' => 'mezuniyet_tarihi',
                'value' => $ob->mezuniyet_tarihi
            );
            ?>
            <?php echo form_input($mezuniyet_tarihi); ?>

        </div>
    </div>
    <?php
    echo form_hidden('ogrenim_bilgiid', $ob->ogrenim_bilgiid);

    echo form_close();
    /*     * **************** */

endforeach;




