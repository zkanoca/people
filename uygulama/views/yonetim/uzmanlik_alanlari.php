<div class="alert alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <p><strong>Lütfen yazacağınız anahtar kelimeler arasına noktalı virgül (;) eklemeyi unutmayınız.</strong></p>
</div>
<?php
/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
$this->load->helper('url');
$this->load->helper('form');

echo form_open($user . '/yonetim/uzmanlik-alanlari-guncelle', array('class' => 'form-signin well well-lg', 'id' => 'form_uzmanlik_alanlari_guncelle'));
$textarea_uzmanlik_alanlari = array(
    'name' => 'uzmanlik_alanlari',
    'id' => 'uzmanlik_alanlari',
    'rows' => '5',
    'class' => 'form-control'
);

echo form_textarea($textarea_uzmanlik_alanlari, $uzmanlik_alanlari[0]->uzmanlik_alanlari);


$data = array(
    'type' => 'submit',
    'name' => 'kaydet_btn',
    'id' => 'kaydet_btn',
    'value' => 'Güncelle',
    'class' => 'btn btn-primary'
);

echo form_input($data);

