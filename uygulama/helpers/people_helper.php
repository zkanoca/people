<?php

/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */

if (!function_exists('yazarlar')) {

    function yazarlar($yazarlar, $sira, $sayi) {
        //$yazarlar = str_replace(array('ı','İ','ç','Ç','ş','Ş','ö','Ö','ğ','Ğ','ü','Ü'), $replace, $subject)
        $adlar = explode('; ', $yazarlar);
        $kad = array();
        $y = '';

        foreach ($adlar as $a) {

            $ad = explode(' ', $a);

            $y = end($ad) . ', ';

            $y .= substr($ad[0], 0, 1) . '. ';

            if (count($ad) > 2) {
                $y .= substr($ad[2], 0, 1) . '. ';
            }

            if (count($ad) > 3) {
                $y .= substr($ad[3], 0, 1) . '. ';
            }

            $y .= ', ';

            $kad[] = $y;
        }

        //$kad[$sira - 1] = '<mark>' . substr($kad[$sira - 1], 0, -3) . '</mark>, ';

        $sonuc = implode(' ', $kad);

        return $sonuc; //sondaki ', ' kısmını sil
    }

}

if (!function_exists('patentSahipleri')) {

    function patentSahipleri($ps) {
        $adlar = explode('+', $ps);
        $sonuc = '';
        $kad = array();
        foreach ($adlar as $a) {
            $kad = explode(' ', $a);


            for ($i = 0; $i < count($kad) - 1; $i++) {
                $sonuc .= substr($kad[$i], 0, 1) . '. ';
            }
            $sonuc .= end($kad) . ', ';
        }

        return substr($sonuc, 0, -2);
    }

}

if (!function_exists('doktora')) {

    function doktora($dr) {
        return $dr == '1' ? 'Dr.' : '';
    }

}


if (!function_exists('captchaAyarlari')) {

    function captchaAyarlari() {
        $captchaAyarlari = array(
            'img_path' => './captcha/',
            'img_url' => base_url() . 'captcha',
            'font_path' => './sistem/fonts/Bleeding_Cowboys.ttf',
            'img_width' => '360',
            'img_height' => '60',
            'expiration' => '3600',
            'word_length' => 6,
            'font_size' => 24,
            'img_id' => 'guvenlikResmi',
            'pool' => '0123456789abcdefghjkmnpqrstuvwxyz',
            'colors' => array(
                'background' => array(250, 250, 250),
                'border' => array(255, 255, 255),
                'text' => array(rand(0, 200), rand(0, 200), rand(0, 200)),
                'grid' => array(rand(0, 200), rand(0, 200), rand(0, 200))
            )
        );

        return $captchaAyarlari;
    }

}


if (!function_exists('onemliKisiler')) {

    function onemliKisiler() {
        $ok = array('robb.flynn', 'james.hettfield', 'bill.cosby',
            'kemal.sunal', 'cem_karaca', 'demis.roussos',
            'michael.jackson', 'mike_tyson', 'dexter.holland',
            'jack_sparrow', 'thomas.anderson', 'parvin.varaiya',
            'william.shockley', 'gareth.hughes', 'baris_manco',
            'turkan_soray', 'cuneyt_arkin', 'kartal.tibet',
            'gary_moore', 'tom_bishop', 'denzel.washington',
            'mel_gibson', 'clarice_starling', 'darth.vader',
            'tyler_durden', 'indiana.jones', 'james_bond',
            'donvito_corleone', 'hannibal_lecter', 'marty_mcfly',
            'sarah_connor', 'john_coffey', 'clint.eastwood',
            'hansolo', 'stanley_ipkiss', 'william_wallace');

        $r = rand(0, count($ok) - 1);

        return $ok[$r];
    }

}