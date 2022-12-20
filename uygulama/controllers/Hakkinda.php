<?php

/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
defined('BASEPATH') OR exit('Giremezsin >:(');

class Hakkinda extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($user) {

        $this->load->model('header_model');
        $dataHeader = $this->header_model->get_user4header($user);
        $this->load->view("header", array("header" => $dataHeader));

        $this->load->model('navigasyon_model');
        $dataNav = $this->navigasyon_model->get_user4nav($user);
        $this->load->view("navigasyon", array('navigasyon' => $dataNav, 'user' => $user));

        $this->load->view("sayfa_baslat", null);

        $this->load->model('anasayfa_model');
        $dataBadge = $this->anasayfa_model->get_user($user);
        $this->load->view('badge', array("badge" => $dataBadge));

        $this->load->model('hakkinda_model');
        $dataHakkinda = $this->hakkinda_model->get_hakkinda($user);

        $this->load->view("hakkinda", array("hakkinda" => $dataHakkinda));


        $this->load->view("footer", null);

        $this->load->view("sayfa_bitir", null);
    }

}

?>
 