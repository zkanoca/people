<?php

/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
defined('BASEPATH') OR exit('Giremezsin >:(');

class Yonetim extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('oturum')) {
            redirect('');
        }
    }

    public function index($user) {

        $this->load->model('header_model');
        $dataHeader = $this->header_model->get_user4header($user);

        $this->load->view("header", array("header" => $dataHeader));

        $this->load->view("sayfa_baslat", null);

        $this->load->model('yonetim_model');

        $this->load->view('yonetim/ynavigasyon', array('user' => $user));

        $this->load->view("sayfa_bitir", null);

        $this->load->view("footer", null);
    }

    /*     * **************ÖZGEÇMİŞ************************************************ */

    public function ozgecmis($user) {
        $this->load->model('header_model');
        $dataHeader = $this->header_model->get_user4header($user);

        $this->load->view("header", array("header" => $dataHeader));

        $this->load->view("sayfa_baslat", null);

        $this->load->model('yonetim_model');

        $this->load->view('yonetim/ynavigasyon', array('user' => $user));
        $this->load->view('yonetim/sayfa_baslik', array('sb' => 'Özgeçmiş'));

        $dataOzgecmis = $this->yonetim_model->get_ozgecmis($user);
        $this->load->view('yonetim/ozgecmis',
                array('ozgecmis' => $dataOzgecmis, 'user' => $user));

        $this->load->view("sayfa_bitir", null);

        $this->load->view("footer", null);
    }

    public function ozgecmis_guncelle($user) {

        $ozgecmis = $this->input->post('ozgecmis');
        $this->load->model('header_model');
        $dataHeader = $this->header_model->get_user4header($user);

        $this->load->view("header", array("header" => $dataHeader));

        $this->load->view("sayfa_baslat", null);

        $this->load->model('yonetim_model');

        $this->load->view('yonetim/ynavigasyon', array('user' => $user));
        $this->load->view('yonetim/sayfa_baslik', array('sb' => 'Özgeçmiş'));

        $this->load->model('yonetim_model');
        if ($this->yonetim_model->ozgecmis_guncelle($user, $ozgecmis)) {
            $this->load->view("yonetim/guncelleme_basarili", null);
        } else {
            $this->load->view("yonetim/guncelleme_basarisiz", null);
        }

        $dataOzgecmis = $this->yonetim_model->get_ozgecmis($user);
        $this->load->view('yonetim/ozgecmis', array('ozgecmis' => $dataOzgecmis));

        $this->load->view("sayfa_bitir", null);

        $this->load->view("footer", null);
    }

    /*     * **********************UZMANLIK ALANLARI************************* */

    public function uzmanlik_alanlari($user) {
        $this->load->model('header_model');
        $dataHeader = $this->header_model->get_user4header($user);

        $this->load->view("header", array("header" => $dataHeader));

        $this->load->view("sayfa_baslat", null);

        $this->load->model('yonetim_model');

        $this->load->view('yonetim/ynavigasyon', array('user' => $user));
        $this->load->view('yonetim/sayfa_baslik',
                array('sb' => 'Uzmanlık Alanları'));

        $data_uzmanlik_alanlari = $this->yonetim_model->get_uzmanlik_alanlari($user);
        $this->load->view('yonetim/uzmanlik_alanlari',
                array('uzmanlik_alanlari' => $data_uzmanlik_alanlari, 'user' => $user));

        $this->load->view("sayfa_bitir", null);

        $this->load->view("footer", null);
    }

    public function uzmanlik_alanlari_guncelle($user) {

        $uzmanlik_alanlari = $this->input->post('uzmanlik_alanlari');
        $this->load->model('header_model');
        $dataHeader = $this->header_model->get_user4header($user);

        $this->load->view("header", array("header" => $dataHeader));

        $this->load->view("sayfa_baslat", null);

        $this->load->model('yonetim_model');

        $this->load->view('yonetim/ynavigasyon', array('user' => $user));
        $this->load->view('yonetim/sayfa_baslik',
                array('sb' => 'Uzmanlık Alanları'));

        $this->load->model('yonetim_model');
        if ($this->yonetim_model->uzmanlik_alanlari_guncelle($user,
                        $uzmanlik_alanlari)) {
            $this->load->view("yonetim/guncelleme_basarili", null);
        } else {
            $this->load->view("yonetim/guncelleme_basarisiz", null);
        }

        $data_uzmanlik_alanlari = $this->yonetim_model->get_uzmanlik_alanlari($user);
        $this->load->view('yonetim/uzmanlik_alanlari',
                array('uzmanlik_alanlari' => $data_uzmanlik_alanlari));

        $this->load->view("sayfa_bitir", null);

        $this->load->view("footer", null);
    }

    /*     * **********************ARAŞTIRMA ALANLARI************************* */

    public function arastirma_alanlari($user) {
        $this->load->model('header_model');
        $dataHeader = $this->header_model->get_user4header($user);

        $this->load->view("header", array("header" => $dataHeader));

        $this->load->view("sayfa_baslat", null);

        $this->load->model('yonetim_model');

        $this->load->view('yonetim/ynavigasyon', array('user' => $user));
        $this->load->view('yonetim/sayfa_baslik',
                array('sb' => 'Araştırma Alanları'));

        $data_arastirma_alanlari = $this->yonetim_model->get_arastirma_alanlari($user);
        $this->load->view('yonetim/arastirma_alanlari',
                array('arastirma_alanlari' => $data_arastirma_alanlari, 'user' => $user));

        $this->load->view("sayfa_bitir", null);

        $this->load->view("footer", null);
    }

    public function arastirma_alanlari_guncelle($user) {

        $arastirma_alanlari = $this->input->post('arastirma_alanlari');
        $this->load->model('header_model');
        $dataHeader = $this->header_model->get_user4header($user);

        $this->load->view("header", array("header" => $dataHeader));

        $this->load->view("sayfa_baslat", null);

        $this->load->model('yonetim_model');

        $this->load->view('yonetim/ynavigasyon', array('user' => $user));
        $this->load->view('yonetim/sayfa_baslik',
                array('sb' => 'Araştırma Alanları'));

        $this->load->model('yonetim_model');
        if ($this->yonetim_model->arastirma_alanlari_guncelle($user,
                        $arastirma_alanlari)) {
            $this->load->view("yonetim/guncelleme_basarili", null);
        } else {
            $this->load->view("yonetim/guncelleme_basarisiz", null);
        }

        $data_arastirma_alanlari = $this->yonetim_model->get_arastirma_alanlari($user);
        $this->load->view('yonetim/arastirma_alanlari',
                array('arastirma_alanlari' => $data_arastirma_alanlari));

        $this->load->view("sayfa_bitir", null);

        $this->load->view("footer", null);
    }

    /*     * **********************İLETİŞİM BİLGİLERİ************************* */

    public function iletisim_bilgileri($user) {
        $this->load->model('header_model');
        $dataHeader = $this->header_model->get_user4header($user);

        $this->load->view("header", array("header" => $dataHeader));

        $this->load->view("sayfa_baslat", null);

        $this->load->model('yonetim_model');

        $this->load->view('yonetim/ynavigasyon', array('user' => $user));
        $this->load->view('yonetim/sayfa_baslik',
                array('sb' => 'İletişim Bilgileri'));

        $data_iletisim_bilgileri = $this->yonetim_model->get_iletisim_bilgileri($user);
        $this->load->view('yonetim/iletisim_bilgileri',
                array('iletisim_bilgileri' => $data_iletisim_bilgileri, 'user' => $user));

        $this->load->view("sayfa_bitir", null);

        $this->load->view("footer", null);
    }

    public function iletisim_bilgileri_guncelle($user) {

        $iletisim_bilgileri['telefon'] = $this->input->post('telefon');
        $iletisim_bilgileri['dahili'] = $this->input->post('dahili');
        $iletisim_bilgileri['gsm'] = $this->input->post('gsm');
        $iletisim_bilgileri['faks'] = $this->input->post('faks');


        $this->load->model('header_model');
        $dataHeader = $this->header_model->get_user4header($user);

        $this->load->view("header", array("header" => $dataHeader));

        $this->load->view("sayfa_baslat", null);

        $this->load->model('yonetim_model');

        $this->load->view('yonetim/ynavigasyon', array('user' => $user));
        $this->load->view('yonetim/sayfa_baslik',
                array('sb' => 'İletişim Bilgileri'));

        $this->load->model('yonetim_model');
        if ($this->yonetim_model->iletisim_bilgileri_guncelle($user,
                        $iletisim_bilgileri)) {
            $this->load->view("yonetim/guncelleme_basarili", null);
        } else {
            $this->load->view("yonetim/guncelleme_basarisiz", null);
        }

        $data_iletisim_bilgileri = $this->yonetim_model->get_iletisim_bilgileri($user);
        $this->load->view('yonetim/iletisim_bilgileri',
                array('iletisim_bilgileri' => $data_iletisim_bilgileri));

        $this->load->view("sayfa_bitir", null);

        $this->load->view("footer", null);
    }

    /*     * **********************BİLİMSEL ETKİNLİKLER *************************** */

    public function bilimsel_etkinlikler($user) {
        $this->load->model('header_model');
        $dataHeader = $this->header_model->get_user4header($user);

        $this->load->view("header", array("header" => $dataHeader));

        $this->load->view("sayfa_baslat", null);

        $this->load->model('yonetim_model');

        $this->load->view('yonetim/ynavigasyon', array('user' => $user));

        $this->load->view('yonetim/sayfa_baslik',
                array('sb' => 'Bilimsel Etkinlikler'));

        $this->load->model('yonetim_model');
        $data_bilimsel_etkinlikler = $this->yonetim_model->get_bilimsel_etkinlinler($user);

        $this->load->view('yonetim/bilimsel_etkinlikler',
                array('bilimsel_etkinlikler' => $data_bilimsel_etkinlikler));

        $this->load->view("sayfa_bitir", null);

        $this->load->view("footer", null);
    }

    public function get_bilimsel_etkinlik_by_id($user, $bilimsel_etkinlikid) {
        $this->load->model('yonetim_model');
        $data_bilimsel_etkinlik = $this->yonetim_model->get_bilimsel_etkinlik_by_id($user,
                $bilimsel_etkinlikid);

        $this->load->view('yonetim/bilimsel_etkinlik_guncelle_modal',
                array('bilimsel_etkinlik' => $data_bilimsel_etkinlik, 'user' => $user));
    }

    public function update_bilimsel_etkinlik_by_id($user, $bilimsel_etkinlikid) {
        $bilimsel_etkinlik['bilimsel_etkinlikid'] = $this->input->post('bilimsel_etkinlikid');
        $bilimsel_etkinlik['bilimsel_etkinlik'] = $this->input->post('bilimsel_etkinlik');
        $bilimsel_etkinlik['tarih'] = $this->input->post('tarih');

        $this->load->model('yonetim_model');
        if ($this->yonetim_model->update_bilimsel_etkinlik_by_id($bilimsel_etkinlikid,
                        $bilimsel_etkinlik)) {
            $this->load->view('yonetim/guncelleme_basarili');
        } else {
            $this->load->view('yonetim/guncelleme_basarisiz');
        }
    }

    public function delete_bilimsel_etkinlik_by_id($user, $bilimsel_etkinlikid) {
        //$bilimsel_etkinlik['bilimsel_etkinlikid'] = $this->input->post('bilimsel_etkinlikid');

        $this->load->model('yonetim_model');
        if ($this->yonetim_model->delete_bilimsel_etkinlik_by_id($bilimsel_etkinlikid)) {
            $this->load->view('yonetim/silme_basarili');
        } else {
            $this->load->view('yonetim/silme_basarisiz');
        }
    }

    public function insert_bilimsel_etkinlik($user) {
        $this->load->model('yonetim_model');


        $bilimsel_etkinlik['bilimsel_etkinlik'] = $this->input->post('bilimsel_etkinlik');
        $bilimsel_etkinlik['tarih'] = $this->input->post('tarih');
        $bilimsel_etkinlik['insanid'] = $this->yonetim_model->get_insanid_by_eposta($user);



        if ($this->yonetim_model->insert_bilimsel_etkinlik($user,
                        $bilimsel_etkinlik)) {
            $this->load->view('yonetim/kayit_basarili');
        } else {
            $this->load->view('yonetim/kayit_basarisiz');
        }
    }

    /*     * ********************************EDİTÖRLÜKLER*************************** */

    public function editorlukler($user) {
        $this->load->model('header_model');
        $dataHeader = $this->header_model->get_user4header($user);

        $this->load->view("header", array("header" => $dataHeader));

        $this->load->view("sayfa_baslat", null);

        $this->load->model('yonetim_model');

        $this->load->view('yonetim/ynavigasyon', array('user' => $user));

        $this->load->view('yonetim/sayfa_baslik', array('sb' => 'Editörlükler'));

        $this->load->model('yonetim_model');
        $data_editorlukler = $this->yonetim_model->get_editorlukler($user);
        $data_editorluk_turleri = $this->yonetim_model->get_editorluk_turleri();
        $data_editorluk_gorevleri = $this->yonetim_model->get_editorluk_gorevleri();
        $data_yayin_kapsamlari = $this->yonetim_model->get_yayin_kapsamlari();
        $data_basim_turleri = $this->yonetim_model->get_basim_turleri();
        $data_diller = $this->yonetim_model->get_diller();
        $data_ulkeler = $this->yonetim_model->get_ulkeler();

        $this->load->view('yonetim/editorlukler',
                array('editorlukler' => $data_editorlukler,
            'editorluk_turleri' => $data_editorluk_turleri,
            'editorluk_gorevleri' => $data_editorluk_gorevleri,
            'yayin_kapsamlari' => $data_yayin_kapsamlari,
            'basim_turleri' => $data_basim_turleri,
            'diller' => $data_diller,
            'ulkeler' => $data_ulkeler));

        $this->load->view("sayfa_bitir", null);

        $this->load->view("footer", null);
    }

    public function get_editorluk_by_id($user, $editorlukid) {
        $this->load->model('yonetim_model');
        $data_editorluk = $this->yonetim_model->get_editorluk_by_id($user,
                $editorlukid);
        $data_editorluk_turleri = $this->yonetim_model->get_editorluk_turleri();
        $data_editorluk_gorevleri = $this->yonetim_model->get_editorluk_gorevleri();
        $data_yayin_kapsamlari = $this->yonetim_model->get_yayin_kapsamlari();
        $data_basim_turleri = $this->yonetim_model->get_basim_turleri();
        $data_diller = $this->yonetim_model->get_diller();
        $data_ulkeler = $this->yonetim_model->get_ulkeler();

        $this->load->view('yonetim/editorluk_guncelle_modal',
                array('editorluk' => $data_editorluk,
            'user' => $user,
            'editorluk_turleri' => $data_editorluk_turleri,
            'editorluk_gorevleri' => $data_editorluk_gorevleri,
            'yayin_kapsamlari' => $data_yayin_kapsamlari,
            'basim_turleri' => $data_basim_turleri,
            'diller' => $data_diller,
            'ulkeler' => $data_ulkeler));
    }

    public function update_editorluk_by_id($user, $editorlukid) {
        //$editorluk['editorlukid'] = $this->input->post('editorlukid');
        $editorluk['editorluk_turid'] = $this->input->post('editorluk_turid');
        $editorluk['editorluk_gorevid'] = $this->input->post('editorluk_gorevid');
        $editorluk['yayin_kapsamid'] = $this->input->post('yayin_kapsamid');
        $editorluk['basim_turid'] = $this->input->post('basim_turid');
        $editorluk['dilid'] = $this->input->post('dilid');
        $editorluk['ulkeid'] = $this->input->post('ulkeid');
        $editorluk['yayin_adi'] = $this->input->post('yayin_adi');
        $editorluk['baslangic'] = $this->input->post('baslangic');
        $editorluk['bitis'] = $this->input->post('bitis');
        $editorluk['alan_bilgisi'] = $this->input->post('alan_bilgisi');
        $editorluk['yayinevi'] = $this->input->post('yayinevi');
        $editorluk['yil'] = $this->input->post('yil');
        $editorluk['doi'] = $this->input->post('doi');
        $editorluk['sehir'] = $this->input->post('sehir');

        $this->load->model('yonetim_model');
        if ($this->yonetim_model->update_editorluk_by_id($editorlukid,
                        $editorluk)) {
            $this->load->view('yonetim/guncelleme_basarili');
        } else {
            $this->load->view('yonetim/guncelleme_basarisiz');
        }
    }

    public function delete_editorluk_by_id($user, $editorlukid) {

        $this->load->model('yonetim_model');
        if ($this->yonetim_model->delete_editorluk_by_id($editorlukid)) {
            $this->load->view('yonetim/silme_basarili');
        } else {
            $this->load->view('yonetim/silme_basarisiz');
        }
    }

    public function insert_editorluk($user) {
        $this->load->model('yonetim_model');


        $editorluk['editorluk_turid'] = $this->input->post('editorluk_turid');
        $editorluk['editorluk_gorevid'] = $this->input->post('editorluk_gorevid');
        $editorluk['yayin_kapsamid'] = $this->input->post('yayin_kapsamid');
        $editorluk['basim_turid'] = $this->input->post('basim_turid');
        $editorluk['dilid'] = $this->input->post('dilid');
        $editorluk['ulkeid'] = $this->input->post('ulkeid');
        $editorluk['yayin_adi'] = $this->input->post('yayin_adi');
//        $editorluk['baslangic'] = $this->input->post('baslangic');
//        $editorluk['bitis'] = $this->input->post('bitis');
        $editorluk['alan_bilgisi'] = $this->input->post('alan_bilgisi');
        $editorluk['yayinevi'] = $this->input->post('yayinevi');
        $editorluk['yil'] = $this->input->post('yil');
        $editorluk['doi'] = $this->input->post('doi');
        $editorluk['sehir'] = $this->input->post('sehir');
        $editorluk['insanid'] = $this->yonetim_model->get_insanid_by_eposta($user);



        if ($this->yonetim_model->insert_editorluk($user, $editorluk)) {
            $this->load->view('yonetim/kayit_basarili');
        } else {
            $this->load->view('yonetim/kayit_basarisiz');
        }
    }

    /*     * **************************HAKEMLİKLER************************ */

    public function hakemlikler($user) {
        $this->load->model('header_model');
        $dataHeader = $this->header_model->get_user4header($user);

        $this->load->view("header", array("header" => $dataHeader));

        $this->load->view("sayfa_baslat", null);

        $this->load->model('yonetim_model');

        $this->load->view('yonetim/ynavigasyon', array('user' => $user));

        $this->load->view('yonetim/sayfa_baslik', array('sb' => 'Hakemlikler'));

        $this->load->model('yonetim_model');
        $data_hakemlikler = $this->yonetim_model->get_hakemlikler($user);
        $data_hakemlik_turleri = $this->yonetim_model->get_hakemlik_turleri();
        $data_makale_indeksleri = $this->yonetim_model->get_makale_indeksleri();
        $data_yayin_kapsamlari = $this->yonetim_model->get_yayin_kapsamlari();
        $data_basim_turleri = $this->yonetim_model->get_basim_turleri();
        $data_diller = $this->yonetim_model->get_diller();
        $data_ulkeler = $this->yonetim_model->get_ulkeler();

        $this->load->view('yonetim/hakemlikler',
                array('hakemlikler' => $data_hakemlikler,
            'hakemlik_turleri' => $data_hakemlik_turleri,
            'makale_indeksleri' => $data_makale_indeksleri,
            'yayin_kapsamlari' => $data_yayin_kapsamlari,
            'basim_turleri' => $data_basim_turleri,
            'diller' => $data_diller,
            'ulkeler' => $data_ulkeler));

        $this->load->view("sayfa_bitir", null);

        $this->load->view("footer", null);
    }

    public function get_hakemlik_by_id($user, $hakemlikid) {
        $this->load->model('yonetim_model');
        $data_hakemlik = $this->yonetim_model->get_hakemlik_by_id($user,
                $hakemlikid);
        $data_hakemlik_turleri = $this->yonetim_model->get_hakemlik_turleri();
        $data_makale_indeksleri = $this->yonetim_model->get_makale_indeksleri();
        $data_yayin_kapsamlari = $this->yonetim_model->get_yayin_kapsamlari();
        $data_basim_turleri = $this->yonetim_model->get_basim_turleri();
        $data_diller = $this->yonetim_model->get_diller();
        $data_ulkeler = $this->yonetim_model->get_ulkeler();

        $this->load->view('yonetim/hakemlik_guncelle_modal',
                array('hakemlik' => $data_hakemlik,
            'user' => $user,
            'hakemlik_turleri' => $data_hakemlik_turleri,
            'makale_indeksleri' => $data_makale_indeksleri,
            'yayin_kapsamlari' => $data_yayin_kapsamlari,
            'basim_turleri' => $data_basim_turleri,
            'diller' => $data_diller,
            'ulkeler' => $data_ulkeler));
    }

    public function update_hakemlik_by_id($user, $hakemlikid) {

        $hakemlik['hakemlik_turid'] = $this->input->post('hakemlik_turid');
        $hakemlik['makale_indeksid'] = $this->input->post('makale_indeksid');
        $hakemlik['yayin_kapsamid'] = $this->input->post('yayin_kapsamid');
        $hakemlik['basim_turid'] = $this->input->post('basim_turid');
        $hakemlik['dilid'] = $this->input->post('dilid');
        $hakemlik['ulkeid'] = $this->input->post('ulkeid');
        $hakemlik['yayin_adi'] = $this->input->post('yayin_adi');
//        $hakemlik['baslangic'] = $this->input->post('baslangic');
//        $hakemlik['bitis'] = $this->input->post('bitis');
        $hakemlik['alan_bilgisi'] = $this->input->post('alan_bilgisi');
        $hakemlik['yayinevi'] = $this->input->post('yayinevi');
        $hakemlik['yil'] = $this->input->post('yil');
        $hakemlik['doi'] = $this->input->post('doi');
        $hakemlik['sehir'] = $this->input->post('sehir');

        $this->load->model('yonetim_model');
        if ($this->yonetim_model->update_hakemlik_by_id($hakemlikid, $hakemlik)) {
            $this->load->view('yonetim/guncelleme_basarili');
        } else {
            $this->load->view('yonetim/guncelleme_basarisiz');
        }
    }

    public function delete_hakemlik_by_id($user, $hakemlikid) {

        $this->load->model('yonetim_model');
        if ($this->yonetim_model->delete_hakemlik_by_id($hakemlikid)) {
            $this->load->view('yonetim/silme_basarili');
        } else {
            $this->load->view('yonetim/silme_basarisiz');
        }
    }

    public function insert_hakemlik($user) {
        $this->load->model('yonetim_model');


        $hakemlik['hakemlik_turid'] = $this->input->post('hakemlik_turid');
        $hakemlik['makale_indeksid'] = $this->input->post('makale_indeksid');
        $hakemlik['yayin_kapsamid'] = $this->input->post('yayin_kapsamid');
        $hakemlik['basim_turid'] = $this->input->post('basim_turid');
        $hakemlik['dilid'] = $this->input->post('dilid');
        $hakemlik['ulkeid'] = $this->input->post('ulkeid');
        $hakemlik['yayin_adi'] = $this->input->post('yayin_adi');
        $hakemlik['baslangic'] = $this->input->post('baslangic');
        $hakemlik['bitis'] = $this->input->post('bitis');
        $hakemlik['alan_bilgisi'] = $this->input->post('alan_bilgisi');
        $hakemlik['yayinevi'] = $this->input->post('yayinevi');
        $hakemlik['yil'] = $this->input->post('yil');
        $hakemlik['doi'] = $this->input->post('doi');
        $hakemlik['sehir'] = $this->input->post('sehir');
        $hakemlik['insanid'] = $this->yonetim_model->get_insanid_by_eposta($user);



        if ($this->yonetim_model->insert_hakemlik($user, $hakemlik)) {
            $this->load->view('yonetim/kayit_basarili');
        } else {
            $this->load->view('yonetim/kayit_basarisiz');
        }
    }

    /*     * **************************İDARİ GÖREVLER************************ */

    public function idari_gorevler($user) {
        $this->load->model('header_model');
        $dataHeader = $this->header_model->get_user4header($user);

        $this->load->view("header", array("header" => $dataHeader));

        $this->load->view("sayfa_baslat", null);

        $this->load->model('yonetim_model');

        $this->load->view('yonetim/ynavigasyon', array('user' => $user));

        $this->load->view('yonetim/sayfa_baslik',
                array('sb' => 'İdari Görevler'));

        $this->load->model('yonetim_model');
        $data_idari_gorevler = $this->yonetim_model->get_idari_gorevler($user);
        $this->load->view('yonetim/idari_gorevler',
                array('idari_gorevler' => $data_idari_gorevler));

        $this->load->view("sayfa_bitir", null);

        $this->load->view("footer", null);
    }

    public function get_idari_gorev_by_id($user, $idari_gorevid) {
        $this->load->model('yonetim_model');
        $data_idari_gorev = $this->yonetim_model->get_idari_gorev_by_id($user,
                $idari_gorevid);


        $this->load->view('yonetim/idari_gorev_guncelle_modal',
                array('idari_gorev' => $data_idari_gorev,
            'user' => $user));
    }

    public function update_idari_gorev_by_id($user, $idari_gorevid) {

        $idari_gorev['gorev'] = $this->input->post('gorev');
        $idari_gorev['baslangic'] = $this->input->post('baslangic');
        $idari_gorev['bitis'] = $this->input->post('bitis');
        $idari_gorev['birim'] = $this->input->post('birim');

        $this->load->model('yonetim_model');
        if ($this->yonetim_model->update_idari_gorev_by_id($idari_gorevid,
                        $idari_gorev)) {
            $this->load->view('yonetim/guncelleme_basarili');
        } else {
            $this->load->view('yonetim/guncelleme_basarisiz');
        }
    }

    public function delete_idari_gorev_by_id($user, $idari_gorevid) {

        $this->load->model('yonetim_model');
        if ($this->yonetim_model->delete_idari_gorev_by_id($idari_gorevid)) {
            $this->load->view('yonetim/silme_basarili');
        } else {
            $this->load->view('yonetim/silme_basarisiz');
        }
    }

    public function insert_idari_gorev($user) {
        $this->load->model('yonetim_model');

        $idari_gorev['gorev'] = $this->input->post('gorev');
        $idari_gorev['baslangic'] = $this->input->post('baslangic');
        $idari_gorev['bitis'] = $this->input->post('bitis');
        $idari_gorev['birim'] = $this->input->post('birim');
        $idari_gorev['insanid'] = $this->yonetim_model->get_insanid_by_eposta($user);

        if ($this->yonetim_model->insert_idari_gorev($user, $idari_gorev)) {
            $this->load->view('yonetim/kayit_basarili');
        } else {
            $this->load->view('yonetim/kayit_basarisiz');
        }
    }

    /*     * **************************ÖDÜLLER************************ */

    public function oduller($user) {
        $this->load->model('header_model');
        $dataHeader = $this->header_model->get_user4header($user);

        $this->load->view("header", array("header" => $dataHeader));

        $this->load->view("sayfa_baslat", null);

        $this->load->model('yonetim_model');

        $this->load->view('yonetim/ynavigasyon', array('user' => $user));

        $this->load->view('yonetim/sayfa_baslik', array('sb' => 'Ödüller'));

        $this->load->model('yonetim_model');
        $data_oduller = $this->yonetim_model->get_oduller($user);
        $data_odul_kurulus_turleri = $this->yonetim_model->get_odul_kurulus_turleri();

        $this->load->view('yonetim/oduller',
                array('oduller' => $data_oduller, 'odul_kurulus_turleri' => $data_odul_kurulus_turleri));

        $this->load->view("sayfa_bitir", null);

        $this->load->view("footer", null);
    }

    public function get_odul_by_id($user, $odulid) {
        $this->load->model('yonetim_model');
        $data_odul = $this->yonetim_model->get_odul_by_id($user, $odulid);
        $data_odul_kurulus_turleri = $this->yonetim_model->get_odul_kurulus_turleri();

        $this->load->view('yonetim/odul_guncelle_modal',
                array('oduller' => $data_odul,
            'user' => $user,
            'odul_kurulus_turleri' => $data_odul_kurulus_turleri));
    }

    public function update_odul_by_id($user, $odulid) {

        $odul['odul_kurulus_turid'] = $this->input->post('odul_kurulus_turid');
        $odul['odul'] = $this->input->post('odul');
        $odul['veren'] = $this->input->post('veren');
        $odul['tarih'] = $this->input->post('tarih');
        $odul['aciklama'] = $this->input->post('aciklama');

        $this->load->model('yonetim_model');
        if ($this->yonetim_model->update_odul_by_id($odulid, $odul)) {
            $this->load->view('yonetim/guncelleme_basarili');
        } else {
            $this->load->view('yonetim/guncelleme_basarisiz');
        }
    }

    public function delete_odul_by_id($user, $odulid) {

        $this->load->model('yonetim_model');
        if ($this->yonetim_model->delete_odul_by_id($odulid)) {
            $this->load->view('yonetim/silme_basarili');
        } else {
            $this->load->view('yonetim/silme_basarisiz');
        }
    }

    public function insert_odul($user) {
        $this->load->model('yonetim_model');

        $odul['odul_kurulus_turid'] = $this->input->post('odul_kurulus_turid');
        $odul['odul'] = $this->input->post('odul');
        $odul['veren'] = $this->input->post('veren');
        $odul['tarih'] = $this->input->post('tarih');
        $odul['aciklama'] = $this->input->post('aciklama');
        $odul['insanid'] = $this->yonetim_model->get_insanid_by_eposta($user);

        if ($this->yonetim_model->insert_odul($user, $odul)) {
            $this->load->view('yonetim/kayit_basarili');
        } else {
            $this->load->view('yonetim/kayit_basarisiz');
        }
    }

    /*     * **************************ÖĞRENİM BİLGİLERİ************************ */

    public function ogrenim_bilgileri($user) {
        $this->load->model('header_model');
        $dataHeader = $this->header_model->get_user4header($user);

        $this->load->view("header", array("header" => $dataHeader));

        $this->load->view("sayfa_baslat", null);

        $this->load->model('yonetim_model');

        $this->load->view('yonetim/ynavigasyon', array('user' => $user));

        $this->load->view('yonetim/sayfa_baslik',
                array('sb' => 'Öğrenim Bilgileri'));

        $this->load->model('yonetim_model');
        $data_ogrenim_bilgileri = $this->yonetim_model->get_ogrenim_bilgileri($user);
        $data_ogrenim_dereceleri = $this->yonetim_model->get_ogrenim_dereceleri();

        $this->load->view('yonetim/ogrenim_bilgileri',
                array('ogrenim_bilgileri' => $data_ogrenim_bilgileri, 'ogrenim_dereceleri' => $data_ogrenim_dereceleri));

        $this->load->view("sayfa_bitir", null);

        $this->load->view("footer", null);
    }

    public function get_ogrenim_bilgisi_by_id($user, $ogrenim_bilgiid) {
        $this->load->model('yonetim_model');
        $data_ogrenim_bilgileri = $this->yonetim_model->get_ogrenim_bilgisi_by_id($user,
                $ogrenim_bilgiid);
        $data_ogrenim_dereceleri = $this->yonetim_model->get_ogrenim_dereceleri();

        $this->load->view('yonetim/ogrenim_bilgisi_guncelle_modal',
                array('ogrenim_bilgileri' => $data_ogrenim_bilgileri,
            'ogrenim_dereceleri' => $data_ogrenim_dereceleri,
            'user' => $user));
    }

    public function update_ogrenim_bilgisi_by_id($user, $ogrenim_bilgiid) {

        $ogrenim_bilgisi['ogrenim_dereceid'] = $this->input->post('ogrenim_dereceid');
        $ogrenim_bilgisi['universite'] = $this->input->post('universite');
        $ogrenim_bilgisi['okul'] = $this->input->post('okul');
        $ogrenim_bilgisi['program'] = $this->input->post('program');
        $ogrenim_bilgisi['mezuniyet_tarihi'] = $this->input->post('mezuniyet_tarihi');

        $this->load->model('yonetim_model');
        if ($this->yonetim_model->update_ogrenim_bilgisi_by_id($ogrenim_bilgiid,
                        $ogrenim_bilgisi)) {
            $this->load->view('yonetim/guncelleme_basarili');
        } else {
            $this->load->view('yonetim/guncelleme_basarisiz');
        }
    }

    public function delete_ogrenim_bilgisi_by_id($user, $ogrenim_bilgiid) {

        $this->load->model('yonetim_model');
        if ($this->yonetim_model->delete_ogrenim_bilgisi_by_id($ogrenim_bilgiid)) {
            $this->load->view('yonetim/silme_basarili');
        } else {
            $this->load->view('yonetim/silme_basarisiz');
        }
    }

    public function insert_ogrenim_bilgisi($user) {
        $this->load->model('yonetim_model');

        $ogrenim_bilgisi['ogrenim_dereceid'] = $this->input->post('ogrenim_dereceid');
        $ogrenim_bilgisi['universite'] = $this->input->post('universite');
        $ogrenim_bilgisi['okul'] = $this->input->post('okul');
        $ogrenim_bilgisi['program'] = $this->input->post('program');
        $ogrenim_bilgisi['mezuniyet_tarihi'] = $this->input->post('mezuniyet_tarihi');
        $ogrenim_bilgisi['insanid'] = $this->yonetim_model->get_insanid_by_eposta($user);

        if ($this->yonetim_model->insert_ogrenim_bilgisi($user, $ogrenim_bilgisi)) {
            $this->load->view('yonetim/kayit_basarili');
        } else {
            $this->load->view('yonetim/kayit_basarisiz');
        }
    }

    /*     * **************************PROJELER************************ */

    public function projeler($user) {
        $this->load->model('header_model');
        $dataHeader = $this->header_model->get_user4header($user);

        $this->load->view("header", array("header" => $dataHeader));

        $this->load->view("sayfa_baslat", null);

        $this->load->model('yonetim_model');

        $this->load->view('yonetim/ynavigasyon', array('user' => $user));

        $this->load->view('yonetim/sayfa_baslik', array('sb' => 'Projeler'));

        $this->load->model('yonetim_model');
        $data_projeler = $this->yonetim_model->get_projeler($user);
        $data_proje_kategorileri = $this->yonetim_model->get_proje_kategorileri();
        $data_proje_durumlari = $this->yonetim_model->get_proje_durumlari();
        $data_proje_rolleri = $this->yonetim_model->get_proje_rolleri();

        $this->load->view('yonetim/projeler',
                array('projeler' => $data_projeler,
            'proje_kategorileri' => $data_proje_kategorileri,
            'proje_durumlari' => $data_proje_durumlari,
            'proje_rolleri' => $data_proje_rolleri));

        $this->load->view("sayfa_bitir", null);

        $this->load->view("footer", null);
    }

    public function get_proje_by_id($user, $projeid) {
        $this->load->model('yonetim_model');
        $data_projeler = $this->yonetim_model->get_proje_by_id($user, $projeid);
        $data_proje_kategorileri = $this->yonetim_model->get_proje_kategorileri();
        $data_proje_durumlari = $this->yonetim_model->get_proje_durumlari();
        $data_proje_rolleri = $this->yonetim_model->get_proje_rolleri();

        $this->load->view('yonetim/proje_guncelle_modal',
                array('projeler' => $data_projeler,
            'user' => $user,
            'proje_kategorileri' => $data_proje_kategorileri,
            'proje_durumlari' => $data_proje_durumlari,
            'proje_rolleri' => $data_proje_rolleri));
    }

    public function update_proje_by_id($user, $projeid) {

        $proje['proje_kategoriid'] = $this->input->post('proje_kategoriid');
        $proje['proje_durumid'] = $this->input->post('proje_durumid');
        $proje['proje_rolid'] = $this->input->post('proje_rolid');
        $proje['baslik'] = $this->input->post('baslik');
        $proje['proje_konusu'] = $this->input->post('proje_konusu');
        $proje['baslangic'] = $this->input->post('baslangic');
        $proje['bitis'] = $this->input->post('bitis');
        $proje['sure'] = $this->input->post('sure');
        $proje['ek_sure'] = $this->input->post('ek_sure');
        $proje['kod'] = $this->input->post('kod');
        $proje['butce'] = $this->input->post('butce');
        $proje['para_birimi'] = $this->input->post('para_birimi');
        $proje['sahip'] = $this->input->post('sahip');
        $proje['katkida_bulunanlar'] = $this->input->post('katkida_bulunanlar');

        $this->load->model('yonetim_model');
        if ($this->yonetim_model->update_proje_by_id($projeid, $proje)) {
            $this->load->view('yonetim/guncelleme_basarili');
        } else {
            $this->load->view('yonetim/guncelleme_basarisiz');
        }
    }

    public function delete_proje_by_id($user, $projeid) {

        $this->load->model('yonetim_model');
        if ($this->yonetim_model->delete_proje_by_id($projeid)) {
            $this->load->view('yonetim/silme_basarili');
        } else {
            $this->load->view('yonetim/silme_basarisiz');
        }
    }

    public function insert_proje($user) {
        $this->load->model('yonetim_model');

        $proje['proje_kategoriid'] = $this->input->post('proje_kategoriid');
        $proje['proje_durumid'] = $this->input->post('proje_durumid');
        $proje['proje_rolid'] = $this->input->post('proje_rolid');
        $proje['baslik'] = $this->input->post('baslik');
        $proje['proje_konusu'] = $this->input->post('proje_konusu');
        $proje['baslangic'] = $this->input->post('baslangic');
        $proje['bitis'] = $this->input->post('bitis');
        $proje['sure'] = $this->input->post('sure');
        $proje['ek_sure'] = $this->input->post('ek_sure');
        $proje['kod'] = $this->input->post('kod');
        $proje['butce'] = $this->input->post('butce');
        $proje['para_birimi'] = $this->input->post('para_birimi');
        $proje['sahip'] = $this->input->post('sahip');
        $proje['katkida_bulunanlar'] = $this->input->post('katkida_bulunanlar');
        $proje['insanid'] = $this->yonetim_model->get_insanid_by_eposta($user);

        if ($this->yonetim_model->insert_proje($user, $proje)) {
            $this->load->view('yonetim/kayit_basarili');
        } else {
            $this->load->view('yonetim/kayit_basarisiz');
        }
    }

    /*     * **************************ÜYELİKLER************************ */

    public function uyelikler($user) {
        $this->load->model('header_model');
        $dataHeader = $this->header_model->get_user4header($user);

        $this->load->view("header", array("header" => $dataHeader));

        $this->load->view("sayfa_baslat", null);

        $this->load->model('yonetim_model');

        $this->load->view('yonetim/ynavigasyon', array('user' => $user));

        $this->load->view('yonetim/sayfa_baslik', array('sb' => 'Üyelikler'));

        $this->load->model('yonetim_model');
        $data_uyelikler = $this->yonetim_model->get_uyelikler($user);
        $data_uyelik_turleri = $this->yonetim_model->get_uyelik_turleri();
        $data_uyelik_kurulus_turleri = $this->yonetim_model->get_uyelik_kurulus_turleri();

        $this->load->view('yonetim/uyelikler',
                array('uyelikler' => $data_uyelikler,
            'uyelik_turleri' => $data_uyelik_turleri,
            'uyelik_kurulus_turleri' => $data_uyelik_kurulus_turleri));

        $this->load->view("sayfa_bitir", null);

        $this->load->view("footer", null);
    }

    public function get_uyelik_by_id($user, $projeid) {
        $this->load->model('yonetim_model');
        $data_uyelikler = $this->yonetim_model->get_uyelik_by_id($user,
                $uyelikid);
        $data_uyelik_turleri = $this->yonetim_model->get_uyelik_turleri();
        $data_uyelik_kurulus_turleri = $this->yonetim_model->get_uyelik_kurulus_turleri();

        $this->load->view('yonetim/proje_guncelle_modal',
                array('uyelikler' => $data_uyelikler,
            'user' => $user,
            'uyelik_turleri' => $data_uyelik_turleri,
            'uyelik_turleri' => $data_uyelik_turleri));
    }

    public function update_uyelik_by_id($user, $uyelikid) {

        $uyelik['uyelik_turid'] = $this->input->post('uyelik_turid');
        $uyelik['uyelik_kurulus_turid'] = $this->input->post('uyelik_kurulus_turid');
        $uyelik['topluluk'] = $this->input->post('topluluk');
        $uyelik['baslangic'] = $this->input->post('baslangic');
        $uyelik['bitis'] = $this->input->post('bitis');


        $this->load->model('yonetim_model');
        if ($this->yonetim_model->update_uyelik_by_id($uyelikid, $uyelik)) {
            $this->load->view('yonetim/guncelleme_basarili');
        } else {
            $this->load->view('yonetim/guncelleme_basarisiz');
        }
    }

    public function delete_uyelik_by_id($user, $uyelikid) {

        $this->load->model('yonetim_model');
        if ($this->yonetim_model->delete_uyelik_by_id($uyelikid)) {
            $this->load->view('yonetim/silme_basarili');
        } else {
            $this->load->view('yonetim/silme_basarisiz');
        }
    }

    public function insert_uyelik($user) {
        $this->load->model('yonetim_model');

        $uyelik['uyelik_turid'] = $this->input->post('uyelik_turid');
        $uyelik['uyelik_kurulus_turid'] = $this->input->post('uyelik_kurulus_turid');
        $uyelik['topluluk'] = $this->input->post('topluluk');
        $uyelik['baslangic'] = $this->input->post('baslangic');
        $uyelik['bitis'] = $this->input->post('bitis');
        $uyelik['insanid'] = $this->yonetim_model->get_insanid_by_eposta($user);

        if ($this->yonetim_model->insert_uyelik($user, $uyelik)) {
            $this->load->view('yonetim/kayit_basarili');
        } else {
            $this->load->view('yonetim/kayit_basarisiz');
        }
    }

    /*     * **************************DERSLER************************ */

    public function dersler($user) {
        $this->load->model('header_model');
        $dataHeader = $this->header_model->get_user4header($user);

        $this->load->view("header", array("header" => $dataHeader));

        $this->load->view("sayfa_baslat", null);

        $this->load->model('yonetim_model');

        $this->load->view('yonetim/ynavigasyon', array('user' => $user));

        $this->load->view('yonetim/sayfa_baslik', array('sb' => 'Dersler'));

        $this->load->model('yonetim_model');
        $data_dersler = $this->yonetim_model->get_dersler($user);
        $data_ders_dereceleri = $this->yonetim_model->get_ders_dereceleri();
        $data_diller = $this->yonetim_model->get_diller();

        $this->load->view('yonetim/dersler',
                array('dersler' => $data_dersler,
            'ders_dereceleri' => $data_ders_dereceleri,
            'diller' => $data_diller));

        $this->load->view("sayfa_bitir", null);

        $this->load->view("footer", null);
    }

    public function get_ders_by_id($user, $dersid) {
        $this->load->model('yonetim_model');
        $data_dersler = $this->yonetim_model->get_ders_by_id($user, $dersid);
        $data_ders_dereceleri = $this->yonetim_model->get_ders_dereceleri();
        $data_diller = $this->yonetim_model->get_diller();


        $this->load->view('yonetim/ders_guncelle_modal',
                array('dersler' => $data_dersler,
            'user' => $user,
            'ders_dereceleri' => $data_ders_dereceleri,
            'diller' => $data_diller));
    }

    public function update_ders_by_id($user, $dersid) {

        $ders['ders_dereceid'] = $this->input->post('ders_dereceid');
        $ders['dilid'] = $this->input->post('dilid');
        $ders['ders'] = $this->input->post('ders');
        $ders['ders_kodu'] = $this->input->post('ders_kodu');
        $ders['haftalik_ders_saati'] = $this->input->post('haftalik_ders_saati');
        $ders['baslangic'] = $this->input->post('baslangic');
        $ders['bitis'] = $this->input->post('bitis');


        $this->load->model('yonetim_model');
        if ($this->yonetim_model->update_ders_by_id($dersid, $ders)) {
            $this->load->view('yonetim/guncelleme_basarili');
        } else {
            $this->load->view('yonetim/guncelleme_basarisiz');
        }
    }

    public function delete_ders_by_id($user, $dersid) {

        $this->load->model('yonetim_model');
        if ($this->yonetim_model->delete_ders_by_id($dersid)) {
            $this->load->view('yonetim/silme_basarili');
        } else {
            $this->load->view('yonetim/silme_basarisiz');
        }
    }

    public function insert_ders($user) {
        $this->load->model('yonetim_model');

        $ders['ders_dereceid'] = $this->input->post('ders_dereceid');
        $ders['dilid'] = $this->input->post('dilid');
        $ders['ders'] = $this->input->post('ders');
        $ders['ders_kodu'] = $this->input->post('ders_kodu');
        $ders['haftalik_ders_saati'] = $this->input->post('haftalik_ders_saati');
        $ders['baslangic'] = $this->input->post('baslangic');
        $ders['bitis'] = $this->input->post('bitis');
        $ders['insanid'] = $this->yonetim_model->get_insanid_by_eposta($user);

        if ($this->yonetim_model->insert_ders($user, $ders)) {
            $this->load->view('yonetim/kayit_basarili');
        } else {
            $this->load->view('yonetim/kayit_basarisiz');
        }
    }

    /*     * **************************YÖNETİLEN TEZLER************************ */

    public function tezler($user) {
        $this->load->model('header_model');
        $dataHeader = $this->header_model->get_user4header($user);

        $this->load->view("header", array("header" => $dataHeader));

        $this->load->view("sayfa_baslat", null);

        $this->load->model('yonetim_model');

        $this->load->view('yonetim/ynavigasyon', array('user' => $user));

        $this->load->view('yonetim/sayfa_baslik',
                array('sb' => 'Yönetilen Tezler'));

        $this->load->model('yonetim_model');
        $data_tezler = $this->yonetim_model->get_tezler($user);
        $data_tez_turleri = $this->yonetim_model->get_tez_turleri();
        $data_tez_kurum_turleri = $this->yonetim_model->get_tez_kurum_turleri();
        $data_tez_danismanlik_turleri = $this->yonetim_model->get_tez_danismanlik_turleri();

        $this->load->view('yonetim/tezler',
                array('tezler' => $data_tezler,
            'tez_turleri' => $data_tez_turleri,
            'tez_kurum_turleri' => $data_tez_kurum_turleri,
            'tez_danismanlik_turleri' => $data_tez_danismanlik_turleri));

        $this->load->view("sayfa_bitir", null);

        $this->load->view("footer", null);
    }

    public function get_tez_by_id($user, $tezid) {
        $this->load->model('yonetim_model');
        $data_tezler = $this->yonetim_model->get_tez_by_id($user, $tezid);
        $data_tez_turleri = $this->yonetim_model->get_tez_turleri();
        $data_tez_kurum_turleri = $this->yonetim_model->get_tez_kurum_turleri();
        $data_tez_danismanlik_turleri = $this->yonetim_model->get_tez_danismanlik_turleri();


        $this->load->view('yonetim/tez_guncelle_modal',
                array('tezler' => $data_tezler,
            'user' => $user,
            'tez_turleri' => $data_tez_turleri,
            'tez_danismanlik_turleri' => $data_tez_danismanlik_turleri,
            'tez_kurum_turleri' => $data_tez_kurum_turleri));
    }

    public function update_tez_by_id($user, $tezid) {

        $tez['tez_turid'] = $this->input->post('tez_turid');
        $tez['tez_kurum_turid'] = $this->input->post('tez_kurum_turid');
        $tez['tez_danismanlik_turid'] = $this->input->post('tez_danismanlik_turid');
        $tez['yazar'] = $this->input->post('yazar');
        $tez['baslik'] = $this->input->post('baslik');
        $tez['konu'] = $this->input->post('konu');
        $tez['universite'] = $this->input->post('universite');
        $tez['enstitu'] = $this->input->post('enstitu');
        $tez['abd'] = $this->input->post('abd');
        $tez['yil'] = $this->input->post('yil');
        $tez['danisman1'] = $this->input->post('danisman1');
        $tez['danisman2'] = $this->input->post('danisman2');


        $this->load->model('yonetim_model');
        if ($this->yonetim_model->update_tez_by_id($tezid, $tez)) {
            $this->load->view('yonetim/guncelleme_basarili');
        } else {
            $this->load->view('yonetim/guncelleme_basarisiz');
        }
    }

    public function delete_tez_by_id($user, $tezid) {

        $this->load->model('yonetim_model');
        if ($this->yonetim_model->delete_tez_by_id($tezid)) {
            $this->load->view('yonetim/silme_basarili');
        } else {
            $this->load->view('yonetim/silme_basarisiz');
        }
    }

    public function insert_tez($user) {
        $this->load->model('yonetim_model');

        $tez['tez_turid'] = $this->input->post('tez_turid');
        $tez['tez_kurum_turid'] = $this->input->post('tez_kurum_turid');
        $tez['tez_danismanlik_turid'] = $this->input->post('tez_danismanlik_turid');
        $tez['yazar'] = $this->input->post('yazar');
        $tez['baslik'] = $this->input->post('baslik');
        $tez['konu'] = $this->input->post('konu');
        $tez['universite'] = $this->input->post('universite');
        $tez['enstitu'] = $this->input->post('enstitu');
        $tez['abd'] = $this->input->post('abd');
        $tez['yil'] = $this->input->post('yil');
        $tez['danisman1'] = $this->input->post('danisman1');
        $tez['danisman2'] = $this->input->post('danisman2');
        $tez['insanid'] = $this->yonetim_model->get_insanid_by_eposta($user);

        if ($this->yonetim_model->insert_tez($user, $tez)) {
            $this->load->view('yonetim/kayit_basarili');
        } else {
            $this->load->view('yonetim/kayit_basarisiz');
        }
    }

    /*     * **************************BİLDİRİLER************************ */

    public function bildiriler($user) {
        $this->load->model('header_model');
        $dataHeader = $this->header_model->get_user4header($user);

        $this->load->view("header", array("header" => $dataHeader));

        $this->load->view("sayfa_baslat", null);

        $this->load->model('yonetim_model');

        $this->load->view('yonetim/ynavigasyon', array('user' => $user));

        $this->load->view('yonetim/sayfa_baslik', array('sb' => 'Bildiriler'));

        $this->load->model('yonetim_model');
        $data_bildiriler = $this->yonetim_model->get_bildiriler($user);
        $data_bildiri_kategorileri = $this->yonetim_model->get_bildiri_kategorileri();
        $data_basim_turleri = $this->yonetim_model->get_basim_turleri();
        $data_bildiri_yayin_durumlari = $this->yonetim_model->get_bildiri_yayin_durumlari();
        $data_diller = $this->yonetim_model->get_diller();
        $data_ulkeler = $this->yonetim_model->get_ulkeler();

        $this->load->view('yonetim/bildiriler',
                array('bildiriler' => $data_bildiriler,
            'bildiri_kategorileri' => $data_bildiri_kategorileri,
            'basim_turleri' => $data_basim_turleri,
            'bildiri_yayin_durumlari' => $data_bildiri_yayin_durumlari,
            'diller' => $data_diller,
            'ulkeler' => $data_ulkeler));

        $this->load->view("sayfa_bitir", null);

        $this->load->view("footer", null);
    }

    public function get_bildiri_by_id($user, $bildiriid) {
        $this->load->model('yonetim_model');
        $data_bildiriler = $this->yonetim_model->get_bildiri_by_id($user,
                $bildiriid);
        $data_bildiri_kategorileri = $this->yonetim_model->get_bildiri_kategorileri();
        $data_basim_turleri = $this->yonetim_model->get_basim_turleri();
        $data_bildiri_yayin_durumlari = $this->yonetim_model->get_bildiri_yayin_durumlari();
        $data_diller = $this->yonetim_model->get_diller();
        $data_ulkeler = $this->yonetim_model->get_ulkeler();


        $this->load->view('yonetim/bildiri_guncelle_modal',
                array('bildiriler' => $data_bildiriler,
            'bildiri_kategorileri' => $data_bildiri_kategorileri,
            'basim_turleri' => $data_basim_turleri,
            'bildiri_yayin_durumlari' => $data_bildiri_yayin_durumlari,
            'diller' => $data_diller,
            'user' => $user,
            'ulkeler' => $data_ulkeler));
    }

    public function update_bildiri_by_id($user, $bildiriid) {

        $alanlar = array('bildiri_kategoriid', 'basim_turid', 'bildiri_yayin_durumid',
            'dilid', 'ulkeid', 'yazarlar', 'yazar_siralamasi', 'baslik', 'etkinlik_adi',
            'sehir', 'alan_bilgisi', 'etkinlik_baslangic_tarihi', 'etkinlik_bitis_tarihi',
            'basim_tarihi', 'cilt', 'sayi', 'ozel_sayi', 'ilk_sayfa', 'son_sayfa',
            'doi', 'isbn', 'issn', 'sponsor', 'toplam_atif_sayisi');
        foreach ($alanlar as $a) {
            $bildiri[$a] = $this->input->post($a);
        }

        $this->load->model('yonetim_model');
        if ($this->yonetim_model->update_bildiri_by_id($bildiriid, $bildiri)) {
            $this->load->view('yonetim/guncelleme_basarili');
        } else {
            $this->load->view('yonetim/guncelleme_basarisiz');
        }
    }

    public function delete_bildiri_by_id($user, $bildiriid) {

        $this->load->model('yonetim_model');
        if ($this->yonetim_model->delete_bildiri_by_id($bildiriid)) {
            $this->load->view('yonetim/silme_basarili');
        } else {
            $this->load->view('yonetim/silme_basarisiz');
        }
    }

    public function insert_bildiri($user) {
        $this->load->model('yonetim_model');

        $alanlar = array('bildiri_kategoriid', 'basim_turid', 'bildiri_yayin_durumid',
            'dilid', 'ulkeid', 'yazarlar', 'yazar_siralamasi', 'baslik', 'etkinlik_adi',
            'sehir', 'alan_bilgisi', 'etkinlik_baslangic_tarihi', 'etkinlik_bitis_tarihi',
            'basim_tarihi', 'cilt', 'sayi', 'ozel_sayi', 'ilk_sayfa', 'son_sayfa',
            'doi', 'isbn', 'issn', 'sponsor', 'toplam_atif_sayisi');

        foreach ($alanlar as $a) {
            $bildiri[$a] = $this->input->post($a);
        }
        $bildiri['insanid'] = $this->yonetim_model->get_insanid_by_eposta($user);

        if ($this->yonetim_model->insert_bildiri($user, $bildiri)) {
            $this->load->view('yonetim/kayit_basarili');
        } else {
            $this->load->view('yonetim/kayit_basarisiz');
        }
    }

    /*     * ********************************ÇIKIŞ*************************** */

    public function cikis() {
        $eposta = $this->session->userdata('eposta');
        $this->session->unset_userdata(array('oturum', 'eposta'));
        redirect($eposta);
    }

}
