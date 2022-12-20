<?php

/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */

class Akademik_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_projeler($user) {

        $this->db->select('p.projeid, p.proje_kategoriid, p.insanid, p.baslik, p.baslangic, p.bitis, p.sure, p.ek_sure, p.kod, p.butce, p.sahip, p.katkida_bulunanlar, pr.proje_rolu, p.para_birimi');
        $this->db->from('projeler p');
        $this->db->join('insanlar i', 'i.insanid = p.insanid', 'inner');
        $this->db->join('proje_kategorileri pk', 'pk.proje_kategoriid = p.proje_kategoriid', 'inner');
        $this->db->join('proje_rolleri pr', 'pr.proje_rolid = p.proje_rolid', 'inner');

        $this->db->where('i.eposta', $user);

        $this->db->where('i.etkin', '1');
        $this->db->where('p.sil', '0');

        $query = $this->db->get();

        return $query->result();
    }

    public function get_oduller($user) {

        $this->db->select('o.odulid, o.insanid, o.odul, o.tarih, o.aciklama, o.veren');
        $this->db->from('oduller o');
        $this->db->join('insanlar i', 'i.insanid = o.insanid', 'inner');

        $this->db->where('i.eposta', $user);

        $this->db->where('i.etkin', '1');
        $this->db->where('o.sil', '0');
        $this->db->order_by('o.tarih', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }

    public function get_uyelikler($user) {

        $this->db->select('u.uyelikid, u.topluluk, u.baslangic, u.bitis, ut.uyelik_turu');
        $this->db->from('uyelikler u');
        $this->db->join('insanlar i', 'i.insanid = u.insanid', 'inner');
        $this->db->join('uyelik_turleri ut', 'ut.uyelik_turid = u.uyelik_turid', 'inner');

        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', '1');
        $this->db->where('u.sil', '0');
        $this->db->order_by('u.baslangic', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }

    public function get_idari_gorevler($user) {

        $this->db->select("ig.idari_gorevid, ig.insanid, ig.gorev, ig.baslangic, ig.bitis, ig.birim");
        $this->db->from("idari_gorevler ig");
        $this->db->join("insanlar i", "i.insanid = ig.insanid", "inner");

        $this->db->where("i.eposta", $user);

        $this->db->where("i.etkin", "1");
        $this->db->where("ig.sil", "0");

        $query = $this->db->get();

        return $query->result();
    }

    public function get_editorlukler($user) {

        $this->db->select('e.editorlukid, e.insanid, et.editorluk_turu, eg.editorluk_gorevi, yk.yayin_kapsami, bt.basim_turu, d.dil, u.ulke, e.yayin_adi, e.baslangic, e.bitis, e.alan_bilgisi, e.yayinevi, e.yil, e.doi, e.sehir');
        $this->db->from('editorlukler e');
        $this->db->join('insanlar i', 'i.insanid = e.insanid', 'inner');
        $this->db->join('editorluk_turleri et', 'e.editorluk_turid = et.editorluk_turid', 'inner');
        $this->db->join('editorluk_gorevleri eg', 'e.editorluk_gorevid = eg.editorluk_gorevid', 'inner');
        $this->db->join('yayin_kapsamlari yk', 'e.yayin_kapsamid = yk.yayin_kapsamid', 'inner');
        $this->db->join('basim_turleri bt', 'e.basim_turid = bt.basim_turid', 'inner');
        $this->db->join('diller d', 'e.dilid = d.dilid', 'inner');
        $this->db->join('ulkeler u', 'e.ulkeid = u.ulkeid', 'inner');

        $this->db->where('i.eposta', $user);

        $this->db->where('i.etkin', '1');
        $this->db->where('e.sil', '0');
        $this->db->order_by('e.baslangic', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }

    public function get_hakemlikler($user) {

        $this->db->select('h.hakemlikid, h.insanid, ht.hakemlik_turu, mi.makale_indeks, bt.basim_turu, u.ulke, d.dil, h.yayin_adi, h.alan_bilgisi, h.yayinevi, h.baslangic, h.bitis, h.yil, h.doi, h.sehir');
        $this->db->from('hakemlikler h');
        $this->db->join('insanlar i', 'i.insanid = h.insanid', 'inner');
        $this->db->join('hakemlik_turleri ht', 'ht.hakemlik_turid = h.hakemlik_turid', 'inner');
        $this->db->join('makale_indeksleri mi', 'mi.makale_indeksid = h.makale_indeksid', 'inner');
        $this->db->join('basim_turleri bt', 'bt.basim_turid = h.basim_turid', 'inner');
        $this->db->join('ulkeler u', 'u.ulkeid = h.ulkeid', 'inner');
        $this->db->join('diller d', 'd.dilid= h.dilid', 'inner');

        $this->db->where("i.eposta", $user);

        $this->db->where('i.etkin', '1');
        $this->db->where('h.sil', '0');
        $this->db->order_by('h.baslangic', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }

    public function get_bilimsel_etkinlikler($user) {

        $this->db->select('be.bilimsel_etkinlikid, be.insanid, be.bilimsel_etkinlik, be.tarih');
        $this->db->from('bilimsel_etkinlikler be');
        $this->db->join('insanlar i', 'i.insanid = be.insanid', 'inner');

        $this->db->where('i.eposta', $user);

        $this->db->where('i.etkin', '1');
        $this->db->where('be.sil', '0');
        $this->db->order_by('be.tarih', 'DESC');
        $this->db->order_by('be.bilimsel_etkinlikid', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }

    public function get_ogrenim_bilgileri($user) {

        $this->db->select('ob.ogrenim_bilgiid, ob.universite, ob.okul, ob.program, ob.mezuniyet_tarihi, od.derece');
        $this->db->from('ogrenim_bilgileri ob');
        $this->db->join('insanlar i', 'ob.insanid= i.insanid');
        $this->db->join('ogrenim_dereceleri od', 'od.ogrenim_dereceid = ob.ogrenim_dereceid');

        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', "1");
        $this->db->order_by('ob.mezuniyet_tarihi', "DESC");

        $query = $this->db->get();

        return $query->result();
    }

//    public function get_diger_akademik_calismalar($user) {
//
//        $this->db->select("p.projeid, p.proje_kategoriid, p.insanid, p.baslik, p.baslangic, p.bitis, p.sure, p.ek_sure, p.kod, p.butce, p.sahip, p.katkida_bulunanlar");
//        $this->db->from("projeler p");
//        $this->db->join("insanlar i", "i.insanid = p.insanid", "inner");
//
//        $this->db->where("i.eposta", $user);
//
//        $this->db->where("i.etkin", "1");
//        $this->db->where("p.sil", "0");
//
//        $query = $this->db->get();
//
//        return $query->result();
//    }
}
