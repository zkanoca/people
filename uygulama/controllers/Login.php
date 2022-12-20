<?php

/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
defined('BASEPATH') OR exit('Giremezsin >:(');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('oturum')) {
            redirect($this->session->eposta . '/yonetim');
        }
    }

    public function index() {

        $this->load->helper(array('form'));

        $this->load->model('header_model');
        $dataHeader = $this->header_model->get_user4header('');

        $this->load->view('header', array('header' => $dataHeader));

        $this->load->view('sayfa_baslat', null);

        $dataCaptcha = create_captcha(captchaAyarlari());

        $this->session->set_userdata('captchaWord', $dataCaptcha['word']);
        $this->load->view('login', array('captcha' => $dataCaptcha));

        $this->load->view('sayfa_bitir');
    }

    public function captcha_refresh() {


        $this->load->helper(array('captcha'));

        $dataCaptcha = create_captcha(captchaAyarlari());

        $this->session->set_userdata('captchaWord', $dataCaptcha['word']);
        echo $dataCaptcha['image'];
    }

    public function checkLogin() {

        /* Form kontrolü */
        $this->load->library('form_validation');

        $this->form_validation->set_rules('eposta', 'Eposta', 'trim|required|callback_kullanici_dogrula', array('required' => '%s adresinizi yazmadınız...'));
        $this->form_validation->set_rules('parola', 'Parola', 'trim|required', array('required' => '%snızı bilmiyor musunuz?'));
        $this->form_validation->set_rules('guvenlikResmi', 'guvenlikResmi', 'trim|required|callback_guvenlik_resmi_dogrula', array('required' => 'Yoksa robot musunuz?'));

        if ($this->form_validation->run() === FALSE) { //form kontrolü başarısızsa
            $this->load->model('login_model');
            $this->login_model->oturum_bosalt();

            $this->load->model('header_model');
            $dataHeader = $this->header_model->get_user4header('');

            $this->load->view('header', array('header' => $dataHeader));

            $this->load->view('sayfa_baslat', null);

            $dataCaptcha = create_captcha(captchaAyarlari());

            $this->session->set_userdata('captchaWord', $dataCaptcha['word']);
            $this->load->view('login', array('captcha' => $dataCaptcha));

            $this->load->view('sayfa_bitir');
        } else { //form kontrolü başarılıysa
            redirect($this->session->eposta . '/yonetim');
        }
        /* Form kontrolü */
    }

    public function kullanici_dogrula() {
        $eposta = $this->input->post('eposta');
        $parola = $this->input->post('parola');

        $this->load->model('login_model');

        if ($this->login_model->ldapBaglanirGibiYap($eposta, $parola)) {
            if ($this->login_model->db_yokla($eposta)) {
                
                $this->login_model->p_oturumac($eposta, $parola);
            } else {
                $this->login_model->kullanici_ekle($eposta, $parola);
            }
            
            return TRUE;
        } else {
            $this->form_validation->set_message(__FUNCTION__, 'E-posta veya parola doğru değil. Lütfen tekrar deneyiniz.');
            return FALSE;
        }
    }

    public function guvenlik_resmi_dogrula() {
        $guvenlik_resmi = $this->input->post('guvenlikResmi');

        if ($guvenlik_resmi !== $this->session->userdata('captchaWord')) {
            $this->form_validation->set_message(__FUNCTION__, 'Güvenlik kodunu yanlış yazdınız ya da yazmadınız. Lütfen tekrar deneyiniz.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
