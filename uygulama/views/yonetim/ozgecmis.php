<?php

/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
$this->load->helper('url');
$this->load->helper('form');

echo form_open($user . '/yonetim/ozgecmis-guncelle', array('class' => 'form-signin well well-lg', 'id' => 'form_ozgecmis_guncelle'));
$textarea_ozgecmis = array(
    'name' => 'ozgecmis',
    'id' => 'ozgecmis',
    'rows' => '15',
    'class' => 'form-control'
);

echo form_textarea($textarea_ozgecmis, $ozgecmis[0]->hakkinda);


$data = array(
    'type' => 'submit',
    'name' => 'kaydet_btn',
    'id' => 'kaydet_btn',
    'value' => 'Güncelle',
    'class' => 'btn btn-primary'
);

echo form_input($data);

