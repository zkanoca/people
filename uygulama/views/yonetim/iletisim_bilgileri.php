<?php

/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
$this->load->helper('url');
$this->load->helper('form');

echo form_open($user . '/yonetim/iletisim-bilgileri-guncelle', array('class' => 'form-signin well well-lg', 'id' => 'form_iletisim_bilgileri_guncelle'));


$telefon = array(
    'type' => 'text',
    'name' => 'telefon',
    'id' => 'telefon',
    'value' => $iletisim_bilgileri[0]->telefon,
    'class' => 'form-control'
);


$dahili = array(
    'type' => 'text',
    'name' => 'dahili',
    'id' => 'dahili',
    'value' => $iletisim_bilgileri[0]->dahili,
    'class' => 'form-control'
);


$gsm = array(
    'type' => 'text',
    'name' => 'gsm',
    'id' => 'gsm',
    'value' => $iletisim_bilgileri[0]->gsm,
    'class' => 'form-control'
);


$faks = array(
    'type' => 'text',
    'name' => 'faks',
    'id' => 'faks',
    'value' => $iletisim_bilgileri[0]->faks,
    'class' => 'form-control'
);






$kaydet = array(
    'type' => 'submit',
    'name' => 'kaydet_btn',
    'id' => 'kaydet_btn',
    'value' => 'Kaydet',
    'class' => 'btn btn-primary'
);



echo '<div class="form-group">';
echo '<label for="telefon">Telefon Numarası</label>';
echo form_input($telefon);
echo '</div>';
echo '<div class="form-group">';
echo '<label for="dahili">Dahili Telefon Numarası</label>';
echo form_input($dahili);
echo '</div>';
echo '<div class="form-group">';
echo '<label for="gsm">GSM Telefon Numarası</label>';
echo form_input($gsm);
echo '</div>';
echo '<div class="form-group">';
echo '<label for="faks">Faks Numarası</label>';
echo form_input($faks);
echo '</div>';
echo form_input($kaydet);

