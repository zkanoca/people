<?php

/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
defined('BASEPATH') OR exit('Giremezsin >:(');

class Yayinlar extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($user) {

        $this->load->model('header_model');
        $dataHeader = $this->header_model->get_user4header($user);

        $this->load->model('navigasyon_model');
        $dataNav = $this->navigasyon_model->get_user4nav($user);


        $this->load->model('anasayfa_model');
        $dataBadge = $this->anasayfa_model->get_user($user);

        $this->load->model('yayinlar_model');
        $dataMakaleler = $this->yayinlar_model->get_makaleler($user);
        $dataBildiriler = $this->yayinlar_model->get_bildiriler($user);
        $dataPatentler = $this->yayinlar_model->get_patentler($user);
        $dataKitaplar = $this->yayinlar_model->get_kitaplar($user);
        $dataSanatEtkinlikleri = $this->yayinlar_model->get_sanat_etkinlikleri($user);
        $dataBilimselRaporlar = $this->yayinlar_model->get_bilimsel_raporlar($user);
        //$dataSporEtkinlikleri = $this->yayinlar_model->get_spor_etkinlikleri($user);

        $this->load->view("header", array("header" => $dataHeader));
        $this->load->view("navigasyon", array('navigasyon' => $dataNav, 'user' => $user));

        $this->load->view("sayfa_baslat", null);

        $this->load->view('badge', array("badge" => $dataBadge));
        $this->load->view('yayinlar', array('makaleler' => $dataMakaleler,
            'bildiriler' => $dataBildiriler,
            'kitaplar' => $dataKitaplar,
            'patentler' => $dataPatentler,
            'sanat_etkinlikleri' => $dataSanatEtkinlikleri,
            'bilimsel_raporlar' => $dataBilimselRaporlar,
            //'spor_etkinlikleri' => $dataSporEtkinlikleri
        ));
        $this->load->view("footer", null);

        $this->load->view("sayfa_bitir", null);
    }

}
