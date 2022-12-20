<?php

/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */

class Yonetim_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_insanid_by_eposta($user) {
        $this->db->select('insanid');
        $this->db->from('insanlar');
        $this->db->where('eposta', $user);
        $this->db->where('etkin', '1');
        $query = $this->db->get();

        return $query->result()[0]->insanid;
    }

    public function get_menu($user) {

        $this->db->select('i.*, u.unvan, b.birim');
        $this->db->from('insanlar i');
        $this->db->join('unvanlar u', 'u.unvanid = i.unvanid');
        $this->db->join('birimler b', 'b.birimid = i.birimid');
        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', '1');

        $query = $this->db->get();

        return $query->result();
    }

    public function get_ozgecmis($user) {

        $this->db->select('hakkinda');
        $this->db->from('insanlar');
        $this->db->where('eposta', $user);
        $this->db->where('etkin', '1');

        $query = $this->db->get();

        return $query->result();
    }

    public function ozgecmis_guncelle($eposta, $ozgecmis) {
        $data = array('hakkinda' => $ozgecmis);

        $this->db->where('eposta', $eposta);
        $sonuc = $this->db->update('insanlar', $data);

        return $sonuc;
    }

    public function get_uzmanlik_alanlari($user) {

        $this->db->select('uzmanlik_alanlari');
        $this->db->from('insanlar');
        $this->db->where('eposta', $user);
        $this->db->where('etkin', '1');

        $query = $this->db->get();

        return $query->result();
    }

    public function uzmanlik_alanlari_guncelle($eposta, $uzmanlik_alanlari) {
        $data = array('uzmanlik_alanlari' => $uzmanlik_alanlari);
        $this->db->where('eposta', $eposta);
        $sonuc = $this->db->update('insanlar', $data);

        return $sonuc;
    }

    public function get_arastirma_alanlari($user) {

        $this->db->select('calisma_alanlari');
        $this->db->from('insanlar');
        $this->db->where('eposta', $user);
        $this->db->where('etkin', '1');

        $query = $this->db->get();

        return $query->result();
    }

    public function arastirma_alanlari_guncelle($eposta, $arastirma_alanlari) {
        $data = array('calisma_alanlari' => $arastirma_alanlari);
        $this->db->where('eposta', $eposta);
        $sonuc = $this->db->update('insanlar', $data);

        return $sonuc;
    }

    public function get_iletisim_bilgileri($user) {

        $this->db->select('telefon, gsm, dahili, faks');
        $this->db->from('insanlar');
        $this->db->where('eposta', $user);
        $this->db->where('etkin', '1');

        $query = $this->db->get();

        return $query->result();
    }

    public function iletisim_bilgileri_guncelle($eposta, $iletisim_bilgileri) {
        $data = array(
            'telefon' => $iletisim_bilgileri['telefon'],
            'dahili' => $iletisim_bilgileri['dahili'],
            'gsm' => $iletisim_bilgileri['gsm'],
            'faks' => $iletisim_bilgileri['faks']);
        $this->db->where('eposta', $eposta);
        $sonuc = $this->db->update('insanlar', $data);

        return $sonuc;
    }

    public function get_bilimsel_etkinlinler($user) {

        $this->db->select('be.bilimsel_etkinlikid, be.bilimsel_etkinlik, be.tarih, be.insanid');
        $this->db->from('bilimsel_etkinlikler be');
        $this->db->join('insanlar i', 'i.insanid = be.insanid');
        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', '1');
        $this->db->where('be.sil', '0');
        $this->db->order_by('be.tarih', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }

    public function get_bilimsel_etkinlik_by_id($user, $bilimsel_etkinlikid) {
        $this->db->select('be.bilimsel_etkinlikid, be.bilimsel_etkinlik, be.tarih, be.insanid');
        $this->db->from('bilimsel_etkinlikler be');
        $this->db->join('insanlar i', 'i.insanid = be.insanid');
        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', '1');
        $this->db->where('be.sil', '0');
        $this->db->where('be.bilimsel_etkinlikid', $bilimsel_etkinlikid);

        $query = $this->db->get();

        return $query->result();
    }

    public function update_bilimsel_etkinlik_by_id($bilimsel_etkinlikid,
            $bilimsel_etkinlik) {
        $data = array(
            //'bilimsel_etkinlikid' => $bilimsel_etkinlik['bilimsel_etkinlikid'],
            'tarih' => $bilimsel_etkinlik['tarih'],
            'bilimsel_etkinlik' => $bilimsel_etkinlik['bilimsel_etkinlik']);

        $this->db->where('bilimsel_etkinlikid', $bilimsel_etkinlikid);
        $sonuc = $this->db->update('bilimsel_etkinlikler', $data);

        return $sonuc;
    }

    public function delete_bilimsel_etkinlik_by_id($bilimsel_etkinlikid) {
        $data = array('sil' => '1');

        $this->db->where('bilimsel_etkinlikid', $bilimsel_etkinlikid);
        $sonuc = $this->db->update('bilimsel_etkinlikler', $data);

        return $sonuc;
    }

    public function insert_bilimsel_etkinlik($user, $bilimsel_etkinlik) {
        $data = array(
            'insanid' => '1',
            'tarih' => $bilimsel_etkinlik['tarih'],
            'bilimsel_etkinlik' => $bilimsel_etkinlik['bilimsel_etkinlik']);

        $sonuc = $this->db->insert('bilimsel_etkinlikler', $data);

        return $sonuc;
    }

    /*     * **********************HAKEMLİKLER****************************** */

    public function get_hakemlikler($user) {

        $this->db->select('h.hakemlikid, h.hakemlik_turid, h.insanid, h.makale_indeksid, h.yayin_kapsamid, h.basim_turid, h.dilid, h.ulkeid, h.yayin_adi, h.alan_bilgisi, h.yayinevi, h.yil, h.doi, h.sehir, ht.hakemlik_turu, mi.makale_indeks, yk.yayin_kapsami, bt.basim_turu, d.dil, u.ulke');
        $this->db->from('hakemlikler h');
        $this->db->join('insanlar i', 'i.insanid = h.insanid');
        $this->db->join('hakemlik_turleri ht',
                'h.hakemlik_turid = ht.hakemlik_turid');
        $this->db->join('makale_indeksleri mi',
                'mi.makale_indeksid = h.makale_indeksid');
        $this->db->join('yayin_kapsamlari yk',
                'h.yayin_kapsamid = yk.yayin_kapsamid');
        $this->db->join('basim_turleri bt', 'h.basim_turid = bt.basim_turid');
        $this->db->join('diller d', 'd.dilid = h.dilid');
        $this->db->join('ulkeler u', 'u.ulkeid = h.ulkeid');
        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', '1');
        $this->db->where('h.sil', '0');
        $this->db->order_by('h.yil', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_hakemlik_by_id($user, $hakemlikid) {
        $this->db->select('h.hakemlikid, h.hakemlik_turid, h.insanid, h.makale_indeksid, h.yayin_kapsamid, h.basim_turid, h.dilid, h.ulkeid, h.yayin_adi, h.alan_bilgisi, h.yayinevi, h.yil, h.doi, h.sehir, ht.hakemlik_turu, mi.makale_indeks, yk.yayin_kapsami, bt.basim_turu, d.dil, u.ulke');
        $this->db->from('hakemlikler h');
        $this->db->join('insanlar i', 'i.insanid = h.insanid');
        $this->db->join('hakemlik_turleri ht',
                'h.hakemlik_turid = ht.hakemlik_turid');
        $this->db->join('makale_indeksleri mi',
                'mi.makale_indeksid = h.makale_indeksid');
        $this->db->join('yayin_kapsamlari yk',
                'h.yayin_kapsamid = yk.yayin_kapsamid');
        $this->db->join('basim_turleri bt', 'h.basim_turid = bt.basim_turid');
        $this->db->join('diller d', 'd.dilid = h.dilid');
        $this->db->join('ulkeler u', 'u.ulkeid = h.ulkeid');
        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', '1');
        $this->db->where('h.hakemlikid', $hakemlikid);
        $query = $this->db->get();
        return $query->result();
    }

    public function update_hakemlik_by_id($hakemlikid, $hakemlik) {

        $this->db->where('hakemlikid', $hakemlikid);
        $sonuc = $this->db->update('hakemlikler', $hakemlik);
        return $sonuc;
    }

    public function delete_hakemlik_by_id($hakemlikid) {
        $data = array('sil' => '1');
        $this->db->where('hakemlikid', $hakemlikid);
        $sonuc = $this->db->update('hakemlikler', $data);
        return $sonuc;
    }

    public function insert_hakemlik($user, $hakemlik) {
        $sonuc = $this->db->insert('hakemlikler', $hakemlik);
        return $sonuc;
    }

    /*     * **********************EDİTÖRLÜKLER****************************** */

    public function get_editorlukler($user) {

        $this->db->select('e.editorlukid, e.editorluk_turid, e.insanid, e.editorluk_gorevid, e.yayin_kapsamid, e.basim_turid, e.dilid, e.ulkeid, e.yayin_adi, e.baslangic, e.bitis, e.alan_bilgisi, e.yayinevi, e.yil, e.doi, e.sehir, et.editorluk_turu, eg.editorluk_gorevi, yk.yayin_kapsami, bt.basim_turu, d.dil, u.ulke');
        $this->db->from('editorlukler e');
        $this->db->join('insanlar i', 'i.insanid = e.insanid');
        $this->db->join('editorluk_turleri et',
                'e.editorluk_turid = et.editorluk_turid');
        $this->db->join('editorluk_gorevleri eg',
                'eg.editorluk_gorevid = e.editorluk_gorevid');
        $this->db->join('yayin_kapsamlari yk',
                'e.yayin_kapsamid = yk.yayin_kapsamid');
        $this->db->join('basim_turleri bt', 'e.basim_turid = bt.basim_turid');
        $this->db->join('diller d', 'd.dilid = e.dilid');
        $this->db->join('ulkeler u', 'u.ulkeid = e.ulkeid');
        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', '1');
        $this->db->where('e.sil', '0');
        $this->db->order_by('e.yil', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_editorluk_by_id($user, $editorlukid) {
        $this->db->select('e.editorlukid, e.editorluk_turid, e.insanid, e.editorluk_gorevid, e.yayin_kapsamid, e.basim_turid, e.dilid, e.ulkeid, e.yayin_adi, e.baslangic, e.bitis, e.alan_bilgisi, e.yayinevi, e.yil, e.doi, e.sehir, et.editorluk_turu, eg.editorluk_gorevi, yk.yayin_kapsami, bt.basim_turu, d.dil, u.ulke');
        $this->db->from('editorlukler e');
        $this->db->join('insanlar i', 'i.insanid = e.insanid');
        $this->db->join('editorluk_turleri et',
                'e.editorluk_turid = et.editorluk_turid');
        $this->db->join('editorluk_gorevleri eg',
                'eg.editorluk_gorevid = e.editorluk_gorevid');
        $this->db->join('yayin_kapsamlari yk',
                'e.yayin_kapsamid = yk.yayin_kapsamid');
        $this->db->join('basim_turleri bt', 'e.basim_turid = bt.basim_turid');
        $this->db->join('diller d', 'd.dilid = e.dilid');
        $this->db->join('ulkeler u', 'u.ulkeid = e.ulkeid');
        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', '1');
        $this->db->where('e.editorlukid', $editorlukid);
        $query = $this->db->get();
        return $query->result();
    }

    public function update_editorluk_by_id($editorlukid, $editorluk) {

        $this->db->where('editorlukid', $editorlukid);
        $sonuc = $this->db->update('editorlukler', $editorluk);
        return $sonuc;
    }

    public function delete_editorluk_by_id($editorlukid) {
        $data = array('sil' => '1');
        $this->db->where('editorlukid', $editorlukid);
        $sonuc = $this->db->update('editorlukler', $data);
        return $sonuc;
    }

    public function insert_editorluk($user, $editorluk) {
        $sonuc = $this->db->insert('editorlukler', $editorluk);
        return $sonuc;
    }

    /*     * **********************İDARİ GÖREVLER****************************** */

    public function get_idari_gorevler($user) {

        $this->db->select('ig.idari_gorevid, ig.insanid, ig.gorev, ig.baslangic, ig.bitis, ig.birim');
        $this->db->from('idari_gorevler ig');
        $this->db->join('insanlar i', 'i.insanid = ig.insanid');
        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', '1');
        $this->db->where('ig.sil', '0');
        $this->db->order_by('ig.baslangic', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_idari_gorev_by_id($user, $idari_gorevid) {
        $this->db->select('ig.idari_gorevid, ig.insanid, ig.gorev, ig.baslangic, ig.bitis, ig.birim');
        $this->db->from('idari_gorevler ig');
        $this->db->join('insanlar i', 'i.insanid = ig.insanid');
        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', '1');
        $this->db->where('ig.sil', '0');
        $this->db->where('ig.idari_gorevid', $idari_gorevid);
        $query = $this->db->get();
        return $query->result();
    }

    public function update_idari_gorev_by_id($idari_gorevid, $idari_gorev) {

        $this->db->where('idari_gorevid', $idari_gorevid);
        $sonuc = $this->db->update('idari_gorevler', $idari_gorev);
        return $sonuc;
    }

    public function delete_idari_gorev_by_id($idari_gorevid) {
        $data = array('sil' => '1');
        $this->db->where('idari_gorevid', $idari_gorevid);
        $sonuc = $this->db->update('idari_gorevler', $data);
        return $sonuc;
    }

    public function insert_idari_gorev($user, $idari_gorev) {
        $sonuc = $this->db->insert('idari_gorevler', $idari_gorev);
        return $sonuc;
    }

    /*     * **********************ÖDÜLLER****************************** */

    public function get_oduller($user) {

        $this->db->select('o.odulid, o.odul_kurulus_turid, o.insanid, o.odul, o.veren, o.tarih, o.aciklama');
        $this->db->from('oduller o');
        $this->db->join('insanlar i', 'i.insanid = o.insanid');
        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', '1');
        $this->db->where('o.sil', '0');
        $this->db->order_by('o.tarih', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_odul_by_id($user, $odulid) {
        $this->db->select('o.odulid, o.odul_kurulus_turid, o.insanid, o.odul, o.veren, o.tarih, o.aciklama');
        $this->db->from('oduller o');
        $this->db->join('insanlar i', 'i.insanid = o.insanid');
        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', '1');
        $this->db->where('o.sil', '0');
        $this->db->where('o.odulid', $odulid);
        $query = $this->db->get();
        return $query->result();
    }

    public function update_odul_by_id($odulid, $odul) {

        $this->db->where('odulid', $odulid);
        $sonuc = $this->db->update('oduller', $odul);
        return $sonuc;
    }

    public function delete_odul_by_id($odulid) {
        $data = array('sil' => '1');
        $this->db->where('odulid', $odulid);
        $sonuc = $this->db->update('oduller', $data);
        return $sonuc;
    }

    public function insert_odul($user, $odul) {
        $sonuc = $this->db->insert('oduller', $odul);
        return $sonuc;
    }

    /*     * **********************ÖĞRENİM BİLGİLERİ****************************** */

    public function get_ogrenim_bilgileri($user) {

        $this->db->select('ob.ogrenim_bilgiid, ob.insanid, ob.ogrenim_dereceid, od.derece, ob.universite, ob.okul, ob.program, ob.mezuniyet_tarihi');
        $this->db->from('ogrenim_bilgileri ob');
        $this->db->join('insanlar i', 'i.insanid = ob.insanid');
        $this->db->join('ogrenim_dereceleri od',
                'od.ogrenim_dereceid = ob.ogrenim_dereceid');
        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', '1');
        $this->db->where('ob.sil', '0');
        $this->db->order_by('ob.mezuniyet_tarihi', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_ogrenim_bilgisi_by_id($user, $ogrenim_bilgiid) {
        $this->db->select('ob.ogrenim_bilgiid, ob.insanid, ob.ogrenim_dereceid, od.derece, ob.universite, ob.okul, ob.program, ob.mezuniyet_tarihi');
        $this->db->from('ogrenim_bilgileri ob');
        $this->db->join('insanlar i', 'i.insanid = ob.insanid');
        $this->db->join('ogrenim_dereceleri od',
                'od.ogrenim_dereceid = ob.ogrenim_dereceid');
        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', '1');
        $this->db->where('ob.sil', '0');
        $this->db->where('ob.ogrenim_bilgiid', $ogrenim_bilgiid);
        $query = $this->db->get();
        return $query->result();
    }

    public function update_ogrenim_bilgisi_by_id($ogrenim_bilgiid,
            $ogrenim_bilgisi) {

        $this->db->where('ogrenim_bilgiid', $ogrenim_bilgiid);
        $sonuc = $this->db->update('ogrenim_bilgileri', $ogrenim_bilgisi);
        return $sonuc;
    }

    public function delete_ogrenim_bilgisi_by_id($ogrenim_bilgiid) {
        $data = array('sil' => '1');
        $this->db->where('ogrenim_bilgiid', $ogrenim_bilgiid);
        $sonuc = $this->db->update('ogrenim_bilgileri', $data);
        return $sonuc;
    }

    public function insert_ogrenim_bilgisi($user, $ogrenim_bilgisi) {
        $sonuc = $this->db->insert('ogrenim_bilgileri', $ogrenim_bilgisi);
        return $sonuc;
    }

    /*     * **********************ÜYELİKLER****************************** */

    public function get_uyelikler($user) {

        $this->db->select('u.uyelikid, u.uyelik_turid, u.uyelik_kurulus_turid, u.insanid, u.topluluk, u.baslangic, u.bitis, ut.uyelik_turu, ukt.uyelik_kurulus_turu');
        $this->db->from('uyelikler u');
        $this->db->join('insanlar i', 'i.insanid = u.insanid');
        $this->db->join('uyelik_turleri ut', 'ut.uyelik_turid = u.uyelik_turid');
        $this->db->join('uyelik_kurulus_turleri ukt',
                'ukt.uyelik_kurulus_turid = u.uyelik_kurulus_turid');
        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', '1');
        $this->db->where('u.sil', '0');
        $this->db->order_by('u.baslangic', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_uyelik_by_id($user, $uyelikid) {
        $this->db->select('u.uyelikid, u.uyelik_turid, u.uyelik_kurulus_turid, u.insanid, u.topluluk, u.baslangic, u.bitis, ut.uyelik_turu, ukt.uyelik_kurulus_turu');
        $this->db->from('uyelikler u');
        $this->db->join('insanlar i', 'i.insanid = u.insanid');
        $this->db->join('uyelik_turleri ut', 'ut.uyelik_turid = u.uyelik_turid');
        $this->db->join('uyelik_kurulus_turleri ukt',
                'ukt.uyelik_kurulus_turid = u.uyelik_kurulus_turid');
        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', '1');
        $this->db->where('u.sil', '0');
        $this->db->where('u.uyelikid', $uyelikid);
        $query = $this->db->get();
        return $query->result();
    }

    public function update_uyelik_by_id($uyelikid, $uyelik) {

        $this->db->where('uyeilkid', $uyelikid);
        $sonuc = $this->db->update('uyelikler', $uyelik);
        return $sonuc;
    }

    public function delete_uyelik_by_id($uyelikid) {
        $data = array('sil' => '1');
        $this->db->where('uyelikid', $uyelikid);
        $sonuc = $this->db->update('uyelikler', $data);
        return $sonuc;
    }

    public function insert_uyelik($user, $uyelik) {
        $sonuc = $this->db->insert('uyelikler', $uyelik);
        return $sonuc;
    }

    /*     * **********************PROJELER****************************** */

    public function get_projeler($user) {

        $this->db->select('p.projeid, p.proje_kategoriid, p.proje_durumid, p.proje_rolid, p.insanid, p.baslik, p.proje_konusu, p.baslangic, p.bitis, p.sure, p.ek_sure, p.kod, p.butce, p.para_birimi, p.sahip, p.katkida_bulunanlar, pk.proje_kategori, pd.proje_durumu, pr.proje_rolu');
        $this->db->from('projeler p');
        $this->db->join('insanlar i', 'i.insanid = p.insanid');
        $this->db->join('proje_kategorileri pk',
                'pk.proje_kategoriid = p.proje_kategoriid');
        $this->db->join('proje_rolleri pr', 'pr.proje_rolid = p.proje_rolid');
        $this->db->join('proje_durumlari pd',
                'pd.proje_durumid = p.proje_durumid');
        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', '1');
        $this->db->where('p.sil', '0');
        $this->db->order_by('p.baslangic', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_proje_by_id($user, $projeid) {
        $this->db->select('p.projeid, p.proje_kategoriid, p.proje_durumid, p.proje_rolid, p.insanid, p.baslik, p.proje_konusu, p.baslangic, p.bitis, p.sure, p.ek_sure, p.kod, p.butce, p.para_birimi, p.sahip, p.katkida_bulunanlar, pk.proje_kategori, pd.proje_durumu, pr.proje_rolu');
        $this->db->from('projeler p');
        $this->db->join('insanlar i', 'i.insanid = p.insanid');
        $this->db->join('proje_kategorileri pk',
                'pk.proje_kategoriid = p.proje_kategoriid');
        $this->db->join('proje_rolleri pr', 'pr.proje_rolid = p.proje_rolid');
        $this->db->join('proje_durumlari pd',
                'pd.proje_durumid = p.proje_durumid');
        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', '1');
        $this->db->where('p.sil', '0');
        $this->db->where('p.projeid', $projeid);
        $query = $this->db->get();
        return $query->result();
    }

    public function update_proje_by_id($projeid, $proje) {

        $this->db->where('projeid', $projeid);
        $sonuc = $this->db->update('projeler', $proje);
        return $sonuc;
    }

    public function delete_proje_by_id($projeid) {
        $data = array('sil' => '1');
        $this->db->where('projeid', $projeid);
        $sonuc = $this->db->update('projeler', $data);
        return $sonuc;
    }

    public function insert_proje($user, $proje) {
        $sonuc = $this->db->insert('projeler', $proje);
        return $sonuc;
    }

    /*     * **********************DERSLER****************************** */

    public function get_dersler($user) {

        $this->db->select('d.dersid, d.ders_dereceid, d.dilid, d.insanid, d.ders, d.ders_kodu, d.haftalik_ders_saati, d.baslangic, d.bitis, dd.ders_derecesi, di.dil');
        $this->db->from('dersler d');
        $this->db->join('insanlar i', 'i.insanid = d.insanid');
        $this->db->join('diller di', 'di.dilid= d.dilid');
        $this->db->join('ders_dereceleri dd',
                'dd.ders_dereceid = d.ders_dereceid');
        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', '1');
        $this->db->where('d.sil', '0');
        $this->db->order_by('d.baslangic', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_ders_by_id($user, $dersid) {
        $this->db->select('d.dersid, d.ders_dereceid, d.dilid, d.insanid, d.ders, d.ders_kodu, d.haftalik_ders_saati, d.baslangic, d.bitis, dd.ders_derecesi, di.dil');
        $this->db->from('dersler d');
        $this->db->join('insanlar i', 'i.insanid = d.insanid');
        $this->db->join('diller di', 'di.dilid= d.dilid');
        $this->db->join('ders_dereceleri dd',
                'dd.ders_dereceid = d.ders_dereceid');
        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', '1');
        $this->db->where('d.sil', '0');
        $this->db->where('d.dersid', $dersid);
        $query = $this->db->get();
        return $query->result();
    }

    public function update_ders_by_id($dersid, $ders) {

        $this->db->where('dersid', $dersid);
        $sonuc = $this->db->update('dersler', $ders);
        return $sonuc;
    }

    public function delete_ders_by_id($dersid) {
        $data = array('sil' => '1');
        $this->db->where('dersid', $dersid);
        $sonuc = $this->db->update('dersler', $data);
        return $sonuc;
    }

    public function insert_ders($user, $ders) {
        $sonuc = $this->db->insert('dersler', $ders);
        return $sonuc;
    }

    /*     * **********************TEZLER****************************** */

    public function get_tezler($user) {

        $this->db->select('t.tezid, t.tez_turid, t.tez_kurum_turid, t.tez_danismanlik_turid, t.insanid, t.yazar, t.baslik, t.konu, t.universite, t.enstitu, t.abd, t.yil, t.danisman1, t.danisman2, tt.tez_turu, tkt.tez_kurum_turu, tdt.tez_danismanlik_turu');
        $this->db->from('tezler t');
        $this->db->join('insanlar i', 'i.insanid = t.insanid');
        $this->db->join('tez_turleri tt', 'tt.tez_turid = t.tez_turid');
        $this->db->join('tez_danismanlik_turleri tdt',
                'tdt.tez_danismanlik_turid = t.tez_danismanlik_turid');
        $this->db->join('tez_kurum_turleri tkt',
                'tkt.tez_kurum_turid = t.tez_kurum_turid');
        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', '1');
        $this->db->where('t.sil', '0');
        $this->db->order_by('t.yil', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_tez_by_id($user, $tezid) {
        $this->db->select('t.tezid, t.tez_turid, t.tez_kurum_turid, t.tez_danismanlik_turid, t.insanid, t.yazar, t.baslik, t.konu, t.universite, t.enstitu, t.abd, t.yil, t.danisman1, t.danisman2, tt.tez_turu, tkt.tez_kurum_turu, tdt.tez_danismanlik_turu');
        $this->db->from('tezler t');
        $this->db->join('insanlar i', 'i.insanid = t.insanid');
        $this->db->join('tez_turleri tt', 'tt.tez_turid = t.tez_turid');
        $this->db->join('tez_danismanlik_turleri tdt',
                'tdt.tez_danismanlik_turid = t.tez_danismanlik_turid');
        $this->db->join('tez_kurum_turleri tkt',
                'tkt.tez_kurum_turid = t.tez_kurum_turid');
        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', '1');
        $this->db->where('t.sil', '0');
        $this->db->where('t.tezid', $tezid);
        $query = $this->db->get();
        return $query->result();
    }

    public function update_tez_by_id($tezid, $tez) {

        $this->db->where('tezid', $tezid);
        $sonuc = $this->db->update('tezler', $tez);
        return $sonuc;
    }

    public function delete_tez_by_id($tezid) {
        $data = array('sil' => '1');
        $this->db->where('tezid', $tezid);
        $sonuc = $this->db->update('tezler', $data);
        return $sonuc;
    }

    public function insert_tez($user, $tez) {
        $sonuc = $this->db->insert('tezler', $tez);
        return $sonuc;
    }

    /*     * **********************BİLDİRİLER****************************** */

    public function get_bildiriler($user) {

        $this->db->select('b.bildiriid, b.insanid, b.bildiri_kategoriid, b.basim_turid, b.bildiri_yayin_durumid, b.dilid, b.ulkeid, b.yazarlar, b.yazar_sayisi, b.yazar_siralamasi, b.baslik, b.etkinlik_adi, b.sehir, b.alan_bilgisi, b.etkinlik_baslangic_tarihi, b.etkinlik_bitis_tarihi, b.basim_tarihi, b.cilt, b.sayi, b.ozel_sayi, b.ilk_sayfa, b.son_sayfa, b.doi, b.isbn, b.issn, b.sponsor, b.toplam_atif_sayisi');
        $this->db->from('bildiriler b');
        $this->db->join('insanlar i', 'i.insanid = b.insanid');
        $this->db->join('bildiri_kategorileri bk',
                'bk.bildiri_kategoriid= b.bildiri_kategoriid');
        $this->db->join('basim_turleri bt', 'bt.basim_turid = b.basim_turid');
        $this->db->join('bildiri_yayin_durumlari byd',
                'byd.bildiri_yayin_durumid = b.bildiri_yayin_durumid');
        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', '1');
        $this->db->where('b.sil', '0');
        $this->db->order_by('b.etkinlik_baslangic_tarihi', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_bildiri_by_id($user, $bildiriid) {
        $this->db->select('b.bildiriid, b.insanid, b.bildiri_kategoriid, b.basim_turid, b.bildiri_yayin_durumid, b.dilid, b.ulkeid, b.yazarlar, b.yazar_sayisi, b.yazar_siralamasi, b.baslik, b.etkinlik_adi, b.sehir, b.alan_bilgisi, b.etkinlik_baslangic_tarihi, b.etkinlik_bitis_tarihi, b.basim_tarihi, b.cilt, b.sayi, b.ozel_sayi, b.ilk_sayfa, b.son_sayfa, b.doi, b.isbn, b.issn, b.sponsor, b.toplam_atif_sayisi');
        $this->db->from('bildiriler b');
        $this->db->join('insanlar i', 'i.insanid = b.insanid');
        $this->db->join('bildiri_kategorileri bk',
                'bk.bildiri_kategoriid = b.bildiri_kategoriid');
        $this->db->join('basim_turleri bt', 'bt.basim_turid = b.basim_turid');
        $this->db->join('bildiri_yayin_durumlari byd',
                'byd.bildiri_yayin_durumid = b.bildiri_yayin_durumid');
        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', '1');
        $this->db->where('b.sil', '0');
        $this->db->where('b.bildiriid', $bildiriid);
        $query = $this->db->get();
        return $query->result();
    }

    public function update_bildiri_by_id($bildiriid, $bildiri) {

        $this->db->where('bildiriid', $bildiriid);
        $sonuc = $this->db->update('bildiriler', $bildiri);
        return $sonuc;
    }

    public function delete_bildiri_by_id($bildiriid) {
        $data = array('sil' => '1');
        $this->db->where('bildiriid', $bildiriid);
        $sonuc = $this->db->update('bildiriler', $data);
        return $sonuc;
    }

    public function insert_bildiri($user, $bildiri) {
        $sonuc = $this->db->insert('bildiriler', $bildiri);
        return $sonuc;
    }

    /*     * *************************GENEL ************************** */

    public function get_editorluk_turleri() {
        $this->db->select('editorluk_turid, editorluk_turu');
        $this->db->from('editorluk_turleri');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_editorluk_gorevleri() {
        $this->db->select('editorluk_gorevid, editorluk_gorevi');
        $this->db->from('editorluk_gorevleri');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_hakemlik_turleri() {
        $this->db->select('hakemlik_turid, hakemlik_turu');
        $this->db->from('hakemlik_turleri');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_makale_indeksleri() {
        $this->db->select('makale_indeksid, makale_indeks');
        $this->db->from('makale_indeksleri');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_yayin_kapsamlari() {
        $this->db->select('yayin_kapsamid, yayin_kapsami');
        $this->db->from('yayin_kapsamlari');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_basim_turleri() {
        $this->db->select('basim_turid, basim_turu');
        $this->db->from('basim_turleri');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_diller() {
        $this->db->select('dilid, dil');
        $this->db->from('diller');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_ulkeler() {
        $this->db->select('ulkeid, ulke');
        $this->db->from('ulkeler');
        $this->db->order_by('ulke', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_odul_kurulus_turleri() {
        $this->db->select('odul_kurulus_turid, odul_kurulus_turu');
        $this->db->from('odul_kurulus_turleri');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_ogrenim_dereceleri() {
        $this->db->select('ogrenim_dereceid, derece');
        $this->db->from('ogrenim_dereceleri');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_proje_kategorileri() {
        $this->db->select('proje_kategoriid, proje_kategori');
        $this->db->from('proje_kategorileri');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_proje_durumlari() {
        $this->db->select('proje_durumid, proje_durumu');
        $this->db->from('proje_durumlari');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_proje_rolleri() {
        $this->db->select('proje_rolid, proje_rolu');
        $this->db->from('proje_rolleri');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_uyelik_turleri() {
        $this->db->select('uyelik_turid, uyelik_turu');
        $this->db->from('uyelik_turleri');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_uyelik_kurulus_turleri() {
        $this->db->select('uyelik_kurulus_turid, uyelik_kurulus_turu');
        $this->db->from('uyelik_kurulus_turleri');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_ders_dereceleri() {
        $this->db->select('ders_dereceid, ders_derecesi');
        $this->db->from('ders_dereceleri');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_tez_turleri() {
        $this->db->select('tez_turid, tez_turu');
        $this->db->from('tez_turleri');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_tez_kurum_turleri() {
        $this->db->select('tez_kurum_turid, tez_kurum_turu');
        $this->db->from('tez_kurum_turleri');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_tez_danismanlik_turleri() {
        $this->db->select('tez_danismanlik_turid, tez_danismanlik_turu');
        $this->db->from('tez_danismanlik_turleri');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_bildiri_kategorileri() {
        $this->db->select('bildiri_kategoriid, bildiri_kategorisi');
        $this->db->from('bildiri_kategorileri');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_bildiri_yayin_durumlari() {
        $this->db->select('bildiri_yayin_durumid, bildiri_yayin_durumu');
        $this->db->from('bildiri_yayin_durumlari');

        $query = $this->db->get();
        return $query->result();
    }

}
