<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
$this->load->helper('url');
$this->load->helper('form');


foreach ($akadmeik_gorevler as $ag):
    $birim = array(
        'type' => 'text',
        'name' => 'birim',
        'id' => 'birim',
        'value' => $ag->birim,
        'class' => 'form-control'
    );
    $unvanid = array();
    $aciklama = array(
        'type' => 'text',
        'name' => 'aciklama',
        'id' => 'aciklama',
        'value' => $ag->aciklama,
        'class' => 'form-control'
    );
    $akademik_durum = array();
    $baslangic = array(
        'type' => 'text',
        'name' => 'baslangic',
        'id' => 'baslangic',
        'value' => $ag->baslangic,
        'class' => 'form-control'
    );
    $bitis = array(
        'type' => 'text',
        'name' => 'bitis',
        'id' => 'bitis',
        'value' => $ag->bitis,
        'class' => 'form-control'
    );
    $form_url = $user . '/yonetim/akademik-gorev-guncelle-islem/' . $ag->akademik_gorevid;
    echo form_open($form_url, array('class' => 'form-signin well well-lg', 'id' => 'form_akademik_gorev_guncelle'));
    ?>
    <div class="form-group">
        <label for="birim">Birim</label>
        <?php echo form_input($birim); ?>
    </div>
    <div class="form-group">
        <div class="col-md-6">
            <label for="baslangic">Başlangıç Tarihi</label>
            <?php echo form_input($baslangic); ?>
        </div>
        <div class="col-md-6">
            <label for="bitis">Bitiş Tarihi</label>
            <?php echo form_input($bitis); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="aciklama">Açıklama</label>
        <?php echo form_input($aciklama); ?>
    </div>

    <?php
    echo form_hidden('akademik_gorevid', $ag->akademik_gorevid);
    echo form_close();

endforeach;




