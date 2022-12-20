<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
$this->load->helper('url');
$this->load->helper('form');


foreach ($projeler as $p):

    $form_url = 'proje-guncelle-islem/' . $p->projeid;
    echo form_open($form_url,
            array('class' => 'well well-lg', 'id' => 'form_proje_guncelle'));
    ?>
    <div class="form-group row">
        <label for="baslik">Proje Adı</label>
        <?php
        $baslik = array(
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'baslik',
            'name' => 'baslik',
            'value' => $p->baslik
        );
        ?>
        <?php echo form_input($baslik); ?>

        <label for="baslik">Proje Sahibi</label>
        <?php
        $sahip = array(
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'sahip',
            'name' => 'sahip',
            'value' => $p->sahip
        );
        ?>
        <?php echo form_input($sahip); ?>

        <label for="proje_konusu">Proje Konusu</label>
        <?php
        $proje_konusu = array(
            'class' => 'form-control',
            'id' => 'proje_konusu',
            'name' => 'proje_konusu',
            'rows' => '1'
        );
        ?>
        <?php echo form_textarea($proje_konusu, $p->proje_konusu); ?>

        <label for="katkida_bulunanlar">Katkıda Bulunanlar<br><i class="text-info">Lütfen kişileri yazarken noktalı virgül (;) ile ayırınız.</i></label>
        <?php
        $katkida_bulunanlar = array(
            'class' => 'form-control',
            'id' => 'katkida_bulunanlar',
            'name' => 'katkida_bulunanlar',
            'rows' => '1'
        );
        ?>
        <?php echo form_textarea($katkida_bulunanlar,
                $p->katkida_bulunanlar);
        ?>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label for="proje_kategoriid">Proje Kategorisi</label>
            <?php
            foreach ($proje_kategorileri as $pk) {
                $data_pk[$pk->proje_kategoriid] = $pk->proje_kategori;
            }

            echo form_dropdown('proje_kategoriid', $data_pk,
                    $p->proje_kategoriid,
                    array('class' => 'form-control input-sm'));
            ?>
        </div>

        <div class="col-md-4">
            <label for="proje_durumid">Proje Durumu</label>
            <?php
            foreach ($proje_durumlari as $pd) {
                $data_pd[$pd->proje_durumid] = $pd->proje_durumu;
            }

            echo form_dropdown('proje_durumid', $data_pd, $p->proje_durumid,
                    array('class' => 'form-control input-sm'));
            ?>
        </div>
        <div class="col-md-4">
            <label for="proje_rolid">Projedeki Rolünüz</label>
            <?php
            foreach ($proje_rolleri as $pr) {
                $data_pr[$pr->proje_rolid] = $pr->proje_rolu;
            }

            echo form_dropdown('proje_rolid', $data_pr, $p->proje_rolid,
                    array('class' => 'form-control input-sm'));
            ?>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-3">
            <label for="balangic">Başlangıç</label>
            <?php
            $baslangic = array(
                'type' => 'text',
                'class' => 'form-control input-sm',
                'id' => 'baslangic',
                'name' => 'baslangic',
                'value' => $p->baslangic
            );
            ?>
    <?php echo form_input($baslangic); ?>
        </div>
        <div class="col-md-3">
            <label for="bitis">Bitiş</label>
            <?php
            $bitis = array(
                'type' => 'text',
                'class' => 'form-control input-sm',
                'id' => 'bitis',
                'name' => 'bitis',
                'value' => $p->bitis
            );
            ?>
    <?php echo form_input($bitis); ?>
        </div>
        <div class="col-md-3">
            <label for="sure">Süre (ay)</label>
            <?php
            $sure = array(
                'type' => 'text',
                'class' => 'form-control input-sm',
                'id' => 'sure',
                'name' => 'sure',
                'value' => $p->sure
            );
            ?>
    <?php echo form_input($sure); ?>
        </div>
        <div class="col-md-3">
            <label for="ek_sure">Ek Süre</label>
            <?php
            $ek_sure = array(
                'type' => 'text',
                'class' => 'form-control input-sm',
                'id' => 'ek_sure',
                'name' => 'ek_sure',
                'value' => $p->ek_sure
            );
            ?>
    <?php echo form_input($ek_sure); ?>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-5">
            <label for="kod">Proje Kodu</label>
            <?php
            $kod = array(
                'type' => 'text',
                'class' => 'form-control input-sm',
                'id' => 'kod',
                'name' => 'kod',
                'value' => $p->kod
            );
            ?>
    <?php echo form_input($kod); ?>
        </div>
        <div class="col-md-5">
            <label for="butce">Bütçe</label>
            <?php
            $butce = array(
                'type' => 'text',
                'class' => 'form-control input-sm',
                'id' => 'butce',
                'name' => 'butce',
                'value' => $p->butce
            );
            ?>
    <?php echo form_input($butce); ?>
        </div>

        <div class="col-md-2">
            <label for="para_birimi">P. Birimi</label>
            <?php
            $data_pb = array('TL' => 'TL', '$' => '$', '€' => '€');
            echo form_dropdown('para_birimi', $data_pb, $p->para_birimi,
                    array('class' => 'form-control input-sm'));
            ?>
        </div>
    </div>

    <?php
    echo form_hidden('projeid', $p->projeid);

    echo form_close();
    /*     * **************** */

endforeach;




