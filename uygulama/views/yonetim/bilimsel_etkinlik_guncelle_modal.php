<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
$this->load->helper('url');
$this->load->helper('form');


foreach ($bilimsel_etkinlik as $be):
    $bilimsel_etkinlik = array(
        'type' => 'text',
        'name' => 'bilimsel_etkinlik',
        'id' => 'bilimsel_etkinlik',
        'value' => $be->bilimsel_etkinlik,
        'class' => 'form-control'
    );
    $tarih = array(
        'type' => 'text',
        'name' => 'tarih',
        'id' => 'tarih',
        'value' => $be->tarih,
        'class' => 'form-control'
    );

    $form_url = $user . '/yonetim/bilimsel-etkinlik-guncelle-islem/' . $be->bilimsel_etkinlikid;
    echo form_open($form_url, array('class' => 'form-signin well well-lg', 'id' => 'form_bilimsel_etkinlik_guncelle'));
    ?>
    <div class="form-group">
        <label for="bilimsel_etkinlik">Bilimsel Etkinlik</label>
        <?php echo form_input($bilimsel_etkinlik); ?>
    </div>
    <div class="form-group">
        <label for="tarih">Tarih</label>
        <?php echo form_input($tarih); ?>
    </div>

    <?php
    echo form_hidden('bilimsel_etkinlikid', $be->bilimsel_etkinlikid);
    echo form_close();

endforeach;




