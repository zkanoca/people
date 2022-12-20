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

echo form_open($user . '/yonetim/arastirma-alanlari-guncelle', array('class' => 'form-signin well well-lg', 'id' => 'form_arastirma_alanlari_guncelle'));
$textarea_arastirma_alanlari = array(
    'name' => 'arastirma_alanlari',
    'id' => 'arastirma_alanlari',
    'rows' => '5',
    'class' => 'form-control'
);

echo form_textarea($textarea_arastirma_alanlari, $arastirma_alanlari[0]->calisma_alanlari);


$data = array(
    'type' => 'submit',
    'name' => 'kaydet_btn',
    'id' => 'kaydet_btn',
    'value' => 'Güncelle',
    'class' => 'btn btn-primary'
);

echo form_input($data);

