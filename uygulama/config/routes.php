<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
  | -------------------------------------------------------------------------
  | URI ROUTING
  | -------------------------------------------------------------------------
  | This file lets you re-map URI requests to specific controller functions.
  |
  | Typically there is a one-to-one relationship between a URL string
  | and its corresponding controller class/method. The segments in a
  | URL normally follow this pattern:
  |
  |	example.com/class/method/id/
  |
  | In some instances, however, you may want to remap this relationship
  | so that a different class/function is called than the one
  | corresponding to the URL.
  |
  | Please see the user guide for complete details:
  |
  |	http://codeigniter.com/user_guide/general/routing.html
  |
  | -------------------------------------------------------------------------
  | RESERVED ROUTES
  | -------------------------------------------------------------------------
  |
  | There are three reserved routes:
  |
  |	$route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  |	$route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router which controller/method to use if those
  | provided in the URL cannot be matched to a valid route.
  |
  |	$route['translate_uri_dashes'] = FALSE;
  |
  | This is not exactly a route, but allows you to automatically route
  | controller and method names that contain dashes. '-' isn't a valid
  | class or method name character, so it requires translation.
  | When you set this option to TRUE, it will replace ALL dashes in the
  | controller and method URI segments.
  |
  | Examples:	my-controller/index	-> my_controller/index
  |		my-controller/my-method	-> my_controller/my_method
 */
$route['default_controller'] = 'login/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['(:any)'] = 'anasayfa/index/$1';
$route['(:any)/anasayfa'] = 'anasayfa/index/$1';

$route['(:any)/akademik'] = 'akademik/index/$1';
$route['(:any)/yayinlar'] = 'yayinlar/index/$1';
$route['(:any)/egitimekatki'] = 'egitime_katki/index/$1';
$route['(:any)/duyurular'] = 'duyurular/index/$1';
$route['(:any)/duyuru/(:any)'] = 'duyurular/duyuru/$1/$2';
$route['(:any)/iletisim'] = 'iletisim/index/$1';
$route['(:any)/hakkinda'] = 'hakkinda/index/$1';



$route['(:any)/login/checkLogin'] = 'Login/checkLogin';
$route['(:any)/login/captcha_refresh'] = 'Login/captcha_refresh';


$route['(:any)/yonetim'] = 'yonetim/index/$1';


$route['(:any)/yonetim/ozgecmis'] = 'yonetim/ozgecmis/$1';
$route['(:any)/yonetim/ozgecmis-guncelle'] = 'yonetim/ozgecmis_guncelle/$1';


$route['(:any)/yonetim/uzmanlik-alanlari'] = 'yonetim/uzmanlik_alanlari/$1';
$route['(:any)/yonetim/uzmanlik-alanlari-guncelle'] = 'yonetim/uzmanlik_alanlari_guncelle/$1';


$route['(:any)/yonetim/arastirma-alanlari'] = 'yonetim/arastirma_alanlari/$1';
$route['(:any)/yonetim/arastirma-alanlari-guncelle'] = 'yonetim/arastirma_alanlari_guncelle/$1';


$route['(:any)/yonetim/iletisim-bilgileri'] = 'yonetim/iletisim_bilgileri/$1';
$route['(:any)/yonetim/iletisim-bilgileri-guncelle'] = 'yonetim/iletisim_bilgileri_guncelle/$1';


$route['(:any)/yonetim/fotograf'] = 'yonetim/fotograf/$1';


$route['(:any)/yonetim/bilimsel-etkinlikler'] = 'yonetim/bilimsel_etkinlikler/$1';
$route['(:any)/yonetim/bilimsel-etkinlik-guncelle/(:any)'] = 'yonetim/get_bilimsel_etkinlik_by_id/$1/$2';
$route['(:any)/yonetim/bilimsel-etkinlik-guncelle-islem/(:any)'] = 'yonetim/update_bilimsel_etkinlik_by_id/$1/$2';
$route['(:any)/yonetim/bilimsel-etkinlik-sil-islem/(:any)'] = 'yonetim/delete_bilimsel_etkinlik_by_id/$1/$2';
$route['(:any)/yonetim/bilimsel-etkinlik-ekle-islem'] = 'yonetim/insert_bilimsel_etkinlik/$1';


$route['(:any)/yonetim/editorlukler'] = 'yonetim/editorlukler/$1';
$route['(:any)/yonetim/editorluk-guncelle/(:any)'] = 'yonetim/get_editorluk_by_id/$1/$2';
$route['(:any)/yonetim/editorluk-guncelle-islem/(:any)'] = 'yonetim/update_editorluk_by_id/$1/$2';
$route['(:any)/yonetim/editorluk-sil-islem/(:any)'] = 'yonetim/delete_editorluk_by_id/$1/$2';
$route['(:any)/yonetim/editorluk-ekle-islem'] = 'yonetim/insert_editorluk/$1';




$route['(:any)/yonetim/hakemlikler'] = 'yonetim/hakemlikler/$1';
$route['(:any)/yonetim/hakemlik-guncelle/(:any)'] = 'yonetim/get_hakemlik_by_id/$1/$2';
$route['(:any)/yonetim/hakemlik-guncelle-islem/(:any)'] = 'yonetim/update_hakemlik_by_id/$1/$2';
$route['(:any)/yonetim/hakemlik-sil-islem/(:any)'] = 'yonetim/delete_hakemlik_by_id/$1/$2';
$route['(:any)/yonetim/hakemlik-ekle-islem'] = 'yonetim/insert_hakemlik/$1';




$route['(:any)/yonetim/idari-gorevler'] = 'yonetim/idari_gorevler/$1';
$route['(:any)/yonetim/idari-gorev-guncelle/(:any)'] = 'yonetim/get_idari_gorev_by_id/$1/$2';
$route['(:any)/yonetim/idari-gorev-guncelle-islem/(:any)'] = 'yonetim/update_idari_gorev_by_id/$1/$2';
$route['(:any)/yonetim/idari-gorev-sil-islem/(:any)'] = 'yonetim/delete_idari_gorev_by_id/$1/$2';
$route['(:any)/yonetim/idari-gorev-ekle-islem'] = 'yonetim/insert_idari_gorev/$1';




$route['(:any)/yonetim/oduller'] = 'yonetim/oduller/$1';
$route['(:any)/yonetim/odul-guncelle/(:any)'] = 'yonetim/get_odul_by_id/$1/$2';
$route['(:any)/yonetim/odul-guncelle-islem/(:any)'] = 'yonetim/update_odul_by_id/$1/$2';
$route['(:any)/yonetim/odul-sil-islem/(:any)'] = 'yonetim/delete_odul_by_id/$1/$2';
$route['(:any)/yonetim/odul-ekle-islem'] = 'yonetim/insert_odul/$1';




$route['(:any)/yonetim/ogrenim-bilgileri'] = 'yonetim/ogrenim_bilgileri/$1';
$route['(:any)/yonetim/ogrenim-bilgisi-guncelle/(:any)'] = 'yonetim/get_ogrenim_bilgisi_by_id/$1/$2';
$route['(:any)/yonetim/ogrenim-bilgisi-guncelle-islem/(:any)'] = 'yonetim/update_ogrenim_bilgisi_by_id/$1/$2';
$route['(:any)/yonetim/ogrenim-bilgisi-sil-islem/(:any)'] = 'yonetim/delete_ogrenim_bilgisi_by_id/$1/$2';
$route['(:any)/yonetim/ogrenim-bilgisi-ekle-islem'] = 'yonetim/insert_ogrenim_bilgisi/$1';




$route['(:any)/yonetim/projeler'] = 'yonetim/projeler/$1';
$route['(:any)/yonetim/proje-guncelle/(:any)'] = 'yonetim/get_proje_by_id/$1/$2';
$route['(:any)/yonetim/proje-guncelle-islem/(:any)'] = 'yonetim/update_proje_by_id/$1/$2';
$route['(:any)/yonetim/proje-sil-islem/(:any)'] = 'yonetim/delete_proje_by_id/$1/$2';
$route['(:any)/yonetim/proje-ekle-islem'] = 'yonetim/insert_proje/$1';




$route['(:any)/yonetim/uyelikler'] = 'yonetim/uyelikler/$1';
$route['(:any)/yonetim/uyelik-guncelle/(:any)'] = 'yonetim/get_uyelik_by_id/$1/$2';
$route['(:any)/yonetim/uyelik-guncelle-islem/(:any)'] = 'yonetim/update_uyelik_by_id/$1/$2';
$route['(:any)/yonetim/uyelik-sil-islem/(:any)'] = 'yonetim/delete_uyelik_by_id/$1/$2';
$route['(:any)/yonetim/uyelik-ekle-islem'] = 'yonetim/insert_uyelik/$1';



$route['(:any)/yonetim/dersler'] = 'yonetim/dersler/$1';
$route['(:any)/yonetim/ders-guncelle/(:any)'] = 'yonetim/get_ders_by_id/$1/$2';
$route['(:any)/yonetim/ders-guncelle-islem/(:any)'] = 'yonetim/update_ders_by_id/$1/$2';
$route['(:any)/yonetim/ders-sil-islem/(:any)'] = 'yonetim/delete_ders_by_id/$1/$2';
$route['(:any)/yonetim/ders-ekle-islem'] = 'yonetim/insert_ders/$1';



$route['(:any)/yonetim/tezler'] = 'yonetim/tezler/$1';
$route['(:any)/yonetim/tez-guncelle/(:any)'] = 'yonetim/get_tez_by_id/$1/$2';
$route['(:any)/yonetim/tez-guncelle-islem/(:any)'] = 'yonetim/update_tez_by_id/$1/$2';
$route['(:any)/yonetim/tez-sil-islem/(:any)'] = 'yonetim/delete_tez_by_id/$1/$2';
$route['(:any)/yonetim/tez-ekle-islem'] = 'yonetim/insert_tez/$1';



$route['(:any)/yonetim/bildiriler'] = 'yonetim/bildiriler/$1';
$route['(:any)/yonetim/bildiri-guncelle/(:any)'] = 'yonetim/get_bildiri_by_id/$1/$2';
$route['(:any)/yonetim/bildiri-guncelle-islem/(:any)'] = 'yonetim/update_bildiri_by_id/$1/$2';
$route['(:any)/yonetim/bildiri-sil-islem/(:any)'] = 'yonetim/delete_bildiri_by_id/$1/$2';
$route['(:any)/yonetim/bildiri-ekle-islem'] = 'yonetim/insert_bildiri/$1';



$route['(:any)/yonetim/bilimsel-raporlar'] = 'yonetim/bilimsel_raporlar/$1';
$route['(:any)/yonetim/bilimsel-rapor-guncelle/(:any)'] = 'yonetim/get_bilimsel_rapor_by_id/$1/$2';
$route['(:any)/yonetim/bilimsel-rapor-guncelle-islem/(:any)'] = 'yonetim/update_bilimsel_rapor_by_id/$1/$2';
$route['(:any)/yonetim/bilimsel-rapor-sil-islem/(:any)'] = 'yonetim/delete_bilimsel_rapor_by_id/$1/$2';
$route['(:any)/yonetim/bilimsel-rapor-ekle-islem'] = 'yonetim/insert_bilimsel_rapor/$1';



$route['(:any)/yonetim/kitaplar'] = 'yonetim/kitaplar/$1';
$route['(:any)/yonetim/kitap-guncelle/(:any)'] = 'yonetim/get_kitap_by_id/$1/$2';
$route['(:any)/yonetim/kitap-guncelle-islem/(:any)'] = 'yonetim/update_kitap_by_id/$1/$2';
$route['(:any)/yonetim/kitap-sil-islem/(:any)'] = 'yonetim/delete_kitap_by_id/$1/$2';
$route['(:any)/yonetim/kitap-ekle-islem'] = 'yonetim/insert_kitap/$1';



$route['(:any)/yonetim/makaleler'] = 'yonetim/makaleler/$1';
$route['(:any)/yonetim/makale-guncelle/(:any)'] = 'yonetim/get_makale_by_id/$1/$2';
$route['(:any)/yonetim/makale-guncelle-islem/(:any)'] = 'yonetim/update_makale_by_id/$1/$2';
$route['(:any)/yonetim/makale-sil-islem/(:any)'] = 'yonetim/delete_makale_by_id/$1/$2';
$route['(:any)/yonetim/makale-ekle-islem'] = 'yonetim/insert_makale/$1';



$route['(:any)/yonetim/patentler'] = 'yonetim/patentler/$1';
$route['(:any)/yonetim/patent-guncelle/(:any)'] = 'yonetim/get_patent_by_id/$1/$2';
$route['(:any)/yonetim/patent-guncelle-islem/(:any)'] = 'yonetim/update_patent_by_id/$1/$2';
$route['(:any)/yonetim/patent-sil-islem/(:any)'] = 'yonetim/delete_patent_by_id/$1/$2';
$route['(:any)/yonetim/patent-ekle-islem'] = 'yonetim/insert_patent/$1';



$route['(:any)/yonetim/sanat-etkinlikleri'] = 'yonetim/sanat_etkinlikleri/$1';
$route['(:any)/yonetim/sanat-etkinlik-guncelle/(:any)'] = 'yonetim/get_sanat_etkinlik_by_id/$1/$2';
$route['(:any)/yonetim/sanat-etkinlik-guncelle-islem/(:any)'] = 'yonetim/update_sanat_etkinlik_by_id/$1/$2';
$route['(:any)/yonetim/sanat-etkinlik-sil-islem/(:any)'] = 'yonetim/delete_sanat_etkinlik_by_id/$1/$2';
$route['(:any)/yonetim/sanat-etkinlik-ekle-islem'] = 'yonetim/insert_sanat_etkinlik/$1';



$route['(:any)/yonetim/spor-etkinlikleri'] = 'yonetim/spor_etkinlikleri/$1';
$route['(:any)/yonetim/spor-etkinlik-guncelle/(:any)'] = 'yonetim/get_spor_etkinlik_by_id/$1/$2';
$route['(:any)/yonetim/spor-etkinlik-guncelle-islem/(:any)'] = 'yonetim/update_spor_etkinlik_by_id/$1/$2';
$route['(:any)/yonetim/spor-etkinlik-sil-islem/(:any)'] = 'yonetim/delete_spor_etkinlik_by_id/$1/$2';
$route['(:any)/yonetim/spor-etkinlik-ekle-islem'] = 'yonetim/insert_spor_etkinlik/$1';



$route['(:any)/yonetim/duyurular'] = 'yonetim/duyurular/$1';
$route['(:any)/yonetim/duyuru-guncelle/(:any)'] = 'yonetim/get_duyuru_by_id/$1/$2';
$route['(:any)/yonetim/duyuru-guncelle-islem/(:any)'] = 'yonetim/update_duyuru_by_id/$1/$2';
$route['(:any)/yonetim/duyuru-sil-islem/(:any)'] = 'yonetim/delete_duyuru_by_id/$1/$2';
$route['(:any)/yonetim/duyuru-ekle-islem'] = 'yonetim/insert_duyuru/$1';


 

$route['(:any)/yonetim/profil'] = 'yonetim/profil/$1';
$route['(:any)/yonetim/cikis'] = 'yonetim/cikis/$1';