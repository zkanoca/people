

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Captcha extends CI_Controller {

// Load Helper in and Start session.
    function __construct() {
        parent::__construct();

        session_start();
    }

    function index() {
        $this->load->helper(array('captcha'));

        $captchaAyarlari = array(
//'word' => 'Random 123',
            'img_path' => './captcha/',
            'img_url' => base_url() . 'captcha',
            'font_path' => './sistem/fonts/Bleeding_Cowboys.ttf',
            'img_width' => '200',
            'img_height' => '60',
            'expiration' => '3600',
            'word_length' => 6,
            'font_size' => 24,
            'img_id' => 'guvenlikResmi',
            'pool' => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            // White background and border, black text and red grid
            'colors' => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(rand(0, 200), rand(00, 200), rand(00, 100)),
                'grid' => array(rand(0, 200), rand(00, 200), rand(00, 100))
            )
        );
        
        $dataCaptcha = create_captcha($captchaAyarlari);
        $this->load->view('giris_formu', array('captcha' => $dataCaptcha));
    }

    public function captcha_refresh() {
        $this->load->helper(array('url', 'captcha'));
        $captchaAyarlari = array(
//'word' => 'Random 123',
            'img_path' => './captcha/',
            'img_url' => base_url() . 'captcha',
            'font_path' => './sistem/fonts/Bleeding_Cowboys.ttf',
            'img_width' => '200',
            'img_height' => '60',
            'expiration' => '3600',
            'word_length' => 6,
            'font_size' => 24,
            'img_id' => 'guvenlikResmi',
            'pool' => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            // White background and border, black text and red grid
            'colors' => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(rand(0, 200), rand(00, 200), rand(00, 100)),
                'grid' => array(rand(0, 200), rand(00, 200), rand(00, 100))
            )
        );
        $data = create_captcha($captchaAyarlari);
        $_SESSION['captchaWord'] = $data['word'];
        echo $data['image'];
    }

}
?>

