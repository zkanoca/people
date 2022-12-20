<?php

/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
defined('BASEPATH') OR exit('Giremezsin >:(');

class Akademik extends CI_Controller {

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

        $this->load->model('akademik_model');
        $dataProjeler = $this->akademik_model->get_projeler($user);
        $dataOduller = $this->akademik_model->get_oduller($user);
        $dataUyelikler = $this->akademik_model->get_uyelikler($user);
        $dataIdariGorevler = $this->akademik_model->get_idari_gorevler($user);
        $dataEditorlukler = $this->akademik_model->get_editorlukler($user);
        $dataHakemlikler = $this->akademik_model->get_hakemlikler($user);

        $dataBilimselEtkinlikler = $this->akademik_model->get_bilimsel_etkinlikler($user);
        $dataOgrenimBilgileri = $this->akademik_model->get_ogrenim_bilgileri($user);
        //$dataDigerAkademikCalismalar = $this->akademik_model->get_diger_akademik_calismalar($user);

        $this->load->view("header", array("header" => $dataHeader));
        $this->load->view("navigasyon", array('navigasyon' => $dataNav, 'user' => $user));
        $this->load->view("sayfa_baslat", null);
        
        $this->load->view('badge', array("badge" => $dataBadge));
        $this->load->view("akademik", array('projeler' => $dataProjeler,
            'oduller' => $dataOduller,
            'uyelikler' => $dataUyelikler,
            'idari_gorevler' => $dataIdariGorevler,
            'editorlukler' => $dataEditorlukler,
            'hakemlikler' => $dataHakemlikler,
            'bilimsel_etkinlikler' => $dataBilimselEtkinlikler,
            'ogrenim_bilgileri' => $dataOgrenimBilgileri,
                //'diger_akademik_calismalar' => $dataDigerAkademikCalismalar,
        ));
        $this->load->view("footer", null);
        $this->load->view("sayfa_bitir", null);
    }

}
