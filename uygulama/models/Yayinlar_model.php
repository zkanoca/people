<?php

/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */

class Yayinlar_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_makaleler($user) {

        $this->db->select('m.makaleid, mk.makale_kategorisi, m.yazarlar, m.yazar_sayisi, m.yazar_siralamasi, m.insanid, m.baslik, m.dergi, m.volume, m.ilk_sayfa, m.son_sayfa, m.issn, m.doi, m.yil, m.ay, m.cilt, m.sayi, m.url1, m.url2, m.url1_etiket, m.url2_etiket, m.alan_bilgisi, m.keywords, m.toplam_atif_sayisi, u.ulke, m.sehir, m.ozel_sayi, d.dil, m.sponsor');
        $this->db->from('makaleler m');
        $this->db->join('insanlar i', 'i.insanid = m.insanid', 'inner');
        $this->db->join('makale_kategorileri mk', 'mk.makale_kategoriid = m.makale_kategoriid', 'inner');
        $this->db->join('ulkeler u', 'u.ulkeid = m.ulkeid', 'inner');
        $this->db->join('diller d', 'd.dilid = m.dilid', 'inner');

        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', '1');
        $this->db->where('m.sil', '0');

        $this->db->order_by('m.makale_kategoriid', 'ASC');
        $this->db->order_by('m.yil', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }

    public function get_bildiriler($user) {

        $this->db->select('b.bildiriid, bk.bildiri_kategorisi, b.yazarlar, b.yazar_sayisi, b.yazar_siralamasi, b.baslik, b.etkinlik_adi, b.sehir, u.ulke, b.url1, b.url2, b.url1_etiket, b.url2_etiket, b.alan_bilgisi, b.etkinlik_baslangic_tarihi, b.etkinlik_bitis_tarihi, bt.basim_turu, b.bildiri_yayin_durumid, d.dil, b.basim_tarihi, b.cilt, b.sayi, b.ozel_sayi, b.ilk_sayfa, b.son_sayfa, b.doi, b.isbn, b.issn, b.sponsor, b.toplam_atif_sayisi');
        $this->db->from('bildiriler b');
        $this->db->join('insanlar i', 'i.insanid = b.insanid', 'inner');
        $this->db->join('bildiri_kategorileri bk', 'bk.bildiri_kategoriid = b.bildiri_kategoriid', 'inner');
        $this->db->join('ulkeler u', 'u.ulkeid = b.ulkeid', 'inner');
        $this->db->join('basim_turleri bt', 'bt.basim_turid = b.basim_turid', 'inner');
        $this->db->join('bildiri_yayin_durumlari byd', 'byd.bildiri_yayin_durumid = b.bildiri_yayin_durumid', 'inner');
        $this->db->join('diller d', 'd.dilid = b.dilid', 'inner');

        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', '1');
        $this->db->where('b.sil', '0');

        $this->db->order_by('b.etkinlik_baslangic_tarihi', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }

    public function get_kitaplar($user) {

        $this->db->select('k.kitapid, k.baslik, k.yazarlar, k.yazar_sayisi, k.yazar_siralamasi, k.editorler, k.yayinevi, k.sehir, k.yil, k.isbn, k.baski, k.sayfa_sayisi, k.url, d.dil, kt.kitap_turu, k.alan_bilgisi, bt.basim_turu, k.toplam_atif_sayisi, u.ulke');
        $this->db->from('kitaplar k');
        $this->db->join('insanlar i', 'i.insanid = k.insanid', 'inner');
        $this->db->join('diller d', 'd.dilid = k.dilid', 'inner');
        $this->db->join('kitap_turleri kt', 'kt.kitap_turid = k.kitap_turid', 'inner');
        $this->db->join('basim_turleri bt', 'k.basim_turid = bt.basim_turid', 'inner');
        $this->db->join('ulkeler u', 'u.ulkeid = k.ulkeid', 'inner');

        $this->db->where('i.eposta', $user);

        $this->db->where('i.etkin', '1');
        $this->db->where('k.sil', '0');

        $query = $this->db->get();

        return $query->result();
    }

    public function get_patentler($user) {

        $this->db->select('p.patentid, pk.patent_kategori, pk.patent_section, pdt.patent_dosya_turu, p.basvuru_sahipleri, p.bulus_sahipleri, pbt.patent_basvuru_turu, p.numara, p.sinif, p.patent, p.ozet, p.yil');
        $this->db->from('patentler p');
        $this->db->join('patent_kategorileri pk', 'p.patent_kategoriid = pk.patent_kategoriid', 'inner');
        $this->db->join('insanlar i', 'i.insanid = p.insanid', 'inner');
        $this->db->join('patent_basvuru_turleri pbt', 'pbt.patent_basvuru_turid = p.patent_basvuru_turid', 'inner');
        $this->db->join('patent_dosya_turleri pdt', 'pdt.patent_dosya_turid = p.patent_dosya_turid', 'inner');

        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', '1');
        $this->db->where('p.sil', '0');
        $this->db->order_by('p.patent_basvuru_turid', 'DESC');
        $this->db->order_by('p.patent_kategoriid', 'ASC');
        $this->db->order_by('p.yil', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }

    public function get_sanat_etkinlikleri($user) {

        $this->db->select('se.sanat_etkinlikid, se.sanat_etkinlik_adi, se.etkinlik_baslangic_tarihi, se.etkinlik_bitis_tarihi, se.yer, se.sehir, u.ulke, se.url, se.sure, se.duzenleyenler, d.dil');
        $this->db->from('sanat_etkinlikleri se');
        $this->db->join('insanlar i', 'i.insanid = se.insanid', 'inner');
        $this->db->join('ulkeler u', 'u.ulkeid = se.ulkeid', 'inner');
        $this->db->join('diller d', 'd.dilid = se.dilid', 'inner');

        $this->db->where('i.eposta', $user);

        $this->db->where('i.etkin', '1');
        $this->db->where('se.sil', '0');

        $this->db->order_by('se.etkinlik_baslangic_tarihi', 'desc');

        $query = $this->db->get();

        return $query->result();
    }

    public function get_bilimsel_raporlar($user) {

        $this->db->select('br.bilimsel_raporid, br.bilimsel_rapor_adi, br.kurum_adi, br.sehir, br.tarih, br.url, br.ulke');
        $this->db->from('bilimsel_raporlar br');
        $this->db->join('insanlar i', 'i.insanid = br.insanid', 'inner');

        $this->db->where('i.eposta', $user);

        $this->db->where('i.etkin', '1');
        $this->db->where('br.sil', '0');

        $query = $this->db->get();

        return $query->result();
    }

    public function get_spor_etkinlikleri($user) {

        $this->db->select('se.spor_etkinlikid, se.spor_etkinlik_adi, se.tarih, se.sehir, se.ulke, se.url');
        $this->db->from('spor_etkinlikleri se');
        $this->db->join('insanlar i', 'i.insanid = se.insanid', 'inner');

        $this->db->where('i.eposta', $user);

        $this->db->where('i.etkin', '1');
        $this->db->where('se.sil', '0');

        $this->db->order_by('se.tarih', 'desc');

        $query = $this->db->get();

        return $query->result();
    }

}
