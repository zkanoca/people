<?php

/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */

class Iletisim extends CI_Controller {

    public function index($user) {
        $this->load->helper(array('form', 'url', 'captcha'));

        /* Form kontrolü */
        $this->load->library('form_validation');

        $this->form_validation->set_message('min_length', '{field} alanı {param} karakterden daha kısa olmamalı.');

        $this->form_validation->set_rules('adisoyadi', 'Adınız soyadınız', 'required|min_length[4]', array('required' => 'Mutlaka bir adınız ve soyadınız vardır.', 'minlength' => 'Bu kadar kısa bir adınızın ve soyadınızın olması ilginç... :/'));
        $this->form_validation->set_rules('eposta', 'E-posta adresiniz', 'required|min_length[5]', array('required' => '%s geçerli görünmüyor.')
        );
        $this->form_validation->set_rules('konu', 'Mesajın konusu', 'required|min_length[3]', array('required' => 'Mesajınızın bir konusu olsa daha iyi değil mi?'));
        $this->form_validation->set_rules('mesaj', 'Mesaj', 'required|min_length[10]', array('required' => 'Boş mesaj göndermekteki amacınızın ne olduğunu bilmiyoruz.'));
        $this->form_validation->set_rules('guvenlikResmi', 'Güvenlik Resmi', 'required', array('required' => 'Yoksa robot musunuz?'));
        /* Form kontrolü */

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

        $dataCaptcha = create_captcha(captchaAyarlari());

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("iletisim", array("user" => $user, 'captcha' => $dataCaptcha));
        } else {
            $dataIletisim = array(
                'adisoyadi' => $this->input->post('adisoyadi'),
                'eposta' => $this->input->post('eposta'),
                'konu' => $this->input->post('konu'),
                'mesaj' => $this->input->post('mesaj'),
                'ip' => $this->input->ip_address(),
                'zaman' => date('d.m.Y H:i:s')
            );

            $this->load->library('email');

            $this->email->from('ozkanozlu@ibu.edu.tr', 'Özkan ÖZLÜ');
            $this->email->to($user);
            $this->email->subject('Profil sayfanızdan mesaj var: ' . $dataIletisim['konu']);

            $mesaj = '<h3><strong>Web sitesinden mesaj</strong></h3>';
            $mesaj .= '<p><strong>' . $dataIletisim['adisoyadi'] . ' (' . $dataIletisim['eposta'] . ')</strong>, ' . $dataIletisim['ip'] . ' adresinden ' . $dataIletisim['zaman'] . ' zamanında, size aşağıdaki mesajı gönderdi.</p><p>' . $dataIletisim['mesaj'] . '</p>';

            $this->email->message($dataIletisim['mesaj']);

            $this->email->send();

            $this->load->view('mesajgonderme', array('dataIletisim' => $dataIletisim, 'user' => $user));
        }




        $this->load->view("footer", null);

        $this->load->view("sayfa_bitir", null);
    }

}
