<?php

/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
defined('BASEPATH') OR exit('Giremezsin >:(');

class Egitime_katki extends CI_Controller {

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

        $this->load->model('egitime_katki_model');
        $dataGuncelDersler = $this->egitime_katki_model->get_guncel_dersler($user);
        $dataOncekiDersler = $this->egitime_katki_model->get_onceki_dersler($user);
        $dataYonetilenTezler = $this->egitime_katki_model->get_yonetilen_tezler($user);

        $this->load->view("header", array("header" => $dataHeader));
        $this->load->view("navigasyon", array('navigasyon' => $dataNav, 'user' => $user));

        $this->load->view("sayfa_baslat", null);

        $this->load->view('badge', array("badge" => $dataBadge));
        $this->load->view('egitime_katki', array('guncel_dersler' => $dataGuncelDersler,
            'onceki_dersler' => $dataOncekiDersler,
            'yonetilen_tezler' => $dataYonetilenTezler
        ));
        $this->load->view("footer", null);

        $this->load->view("sayfa_bitir", null);
    }

}
