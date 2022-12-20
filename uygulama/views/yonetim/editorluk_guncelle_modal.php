<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
$this->load->helper('url');
$this->load->helper('form');


foreach ($editorluk as $e):

    $form_url = $user . '/yonetim/editorluk-guncelle-islem/' . $e->editorlukid;
    echo form_open($form_url, array('class' => 'well well-lg', 'id' => 'form_editorluk_guncelle'));
    ?>
    <div class="form-group row">
        <label for="yayin_adi">Yayın Adı</label>
        <?php
        $yayin_adi = array(
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'yayin_adi',
            'name' => 'yayin_adi',
            'value' => $e->yayin_adi
        );
        ?>
        <?php echo form_input($yayin_adi); ?>

        <label for="yayinevi">Yayınevi</label>
        <?php
        $yayinevi = array(
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'yayinevi',
            'name' => 'yayinevi',
            'value' => $e->yayinevi
        );
        ?>
        <?php echo form_input($yayinevi); ?>


        <label for="alan_bilgisi">Alan Bilgisi</label>
        <?php
        $alan_bilgisi = array(
            'rows' => '3',
            'class' => 'form-control',
            'id' => 'alan_bilgisi',
            'name' => 'alan_bilgisi'
        );
        ?>
        <?php echo form_textarea($alan_bilgisi, $e->alan_bilgisi); ?>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label for="editorluk_turid">Editörlük Türü</label>
            <?php
            foreach ($editorluk_turleri as $et) {
                $data_et[$et->editorluk_turid] = $et->editorluk_turu;
            }
            ?>
            <?php echo form_dropdown('editorluk_turid', $data_et, $e->editorluk_turid, array('class' => 'form-control')); ?>
        </div>
        <div class="col-md-6">
            <label for="editorluk_gorevid">Editörlük Görevi</label>
            <?php
            foreach ($editorluk_gorevleri as $eg) {
                $data_eg[$eg->editorluk_gorevid] = $eg->editorluk_gorevi;
            }
            ?>
            <?php echo form_dropdown('editorluk_gorevid', $data_eg, $e->editorluk_gorevid, array('class' => 'form-control')); ?>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label for="yayin_kapsamid">Yayın Kapsamı</label>
            <?php
            foreach ($yayin_kapsamlari as $yk) {
                $data_yk[$yk->yayin_kapsamid] = $yk->yayin_kapsami;
            }
            ?>
            <?php echo form_dropdown('yayin_kapsamid', $data_yk, $e->yayin_kapsamid, array('class' => 'form-control')); ?>
            <?php //echo form_dropdown('yayin_kapsamid', array('1' => 'Uluslararası', '2' => 'Ulusal'), $e->yayin_kapsamid, array('class' => 'form-control')); ?>
        </div>
        <div class="col-md-4">
            <label for="basim_turid">Basım Türü</label>
            <?php
            foreach ($basim_turleri as $bt) {
                $data_bt[$bt->basim_turid] = $bt->basim_turu;
            }
            ?>
            <?php echo form_dropdown('basim_turid', $data_bt, $e->basim_turid, array('class' => 'form-control')); ?>
        </div>
        <div class="col-md-4">
            <label for="dilid">Dil</label>
            <?php
            foreach ($diller as $d) {
                $data_d[$d->dilid] = $d->dil;
            }
            ?>
            <?php echo form_dropdown('dilid', $data_d, $e->dilid, array('class' => 'form-control')); ?>
        </div>
    </div>
    <div class="form-group row">

        <div class="col-md-6">
            <label for="ulkeid">Ülke</label>
            <?php
            foreach ($ulkeler as $u) {
                $data_u[$u->ulkeid] = $u->ulke;
            }
            ?>
            <?php echo form_dropdown('ulkeid', $data_u, $e->ulkeid, array('class' => 'form-control')); ?>
        </div>
        <div class="col-md-6">
            <label for="sehir">Şehir</label>
            <?php
            $sehir = array(
                'type' => 'text',
                'class' => 'form-control',
                'id' => 'sehir',
                'name' => 'sehir',
                'value' => $e->sehir
            );
            ?>
            <?php echo form_input($sehir); ?>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label for="doi">DOI numarası</label>
            <?php
            $doi = array(
                'type' => 'text',
                'class' => 'form-control',
                'id' => 'doi',
                'name' => 'doi',
                'value' => $e->doi
            );
            ?>
            <?php echo form_input($doi); ?>
        </div>
        <div class="col-md-6">
            <label for="yil">Yıl</label>
            <?php
            $yil = array(
                'type' => 'number',
                'class' => 'form-control',
                'id' => 'yil',
                'name' => 'yil',
                'value' => $e->yil
            );
            ?>
            <?php echo form_input($yil); ?>
        </div>
    </div>
    <?php
    echo form_hidden('editorlukid', $e->editorlukid);
    echo form_close();

endforeach;




