<?php

/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */

class Egitime_katki_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_guncel_dersler($user) {

        $this->db->select('d.dersid, d.insanid, d.ders, d.ders_kodu, di.dil, dd.ders_derecesi, d.baslangic, d.bitis, d.haftalik_ders_saati ');
        $this->db->from('dersler d');
        $this->db->join('insanlar i', 'i.insanid = d.insanid', 'inner');
        $this->db->join('diller di', 'di.dilid = d.dilid', 'inner');
        $this->db->join('ders_dereceleri dd', 'dd.ders_dereceid = d.ders_dereceid', 'inner');

        $this->db->where('i.eposta', $user);
        
        $this->db->where('d.bitis', '< CURDATE()');
        $this->db->where('i.etkin', '1');
         $this->db->where('d.sil', '0');

        $query = $this->db->get();

        return $query->result();
    }

    public function get_onceki_dersler($user) {

        $this->db->select('d.dersid, d.insanid, d.ders, d.ders_kodu, di.dil, dd.ders_derecesi, d.baslangic, d.bitis, d.haftalik_ders_saati ');
        $this->db->from('dersler d');
        $this->db->join('insanlar i', 'i.insanid = d.insanid', 'inner');
        $this->db->join('diller di', 'di.dilid = d.dilid', 'inner');
        $this->db->join('ders_dereceleri dd', 'dd.ders_dereceid = d.ders_dereceid', 'inner');

        $this->db->where('i.eposta', $user);
        
        $this->db->where('d.bitis', '>= CURDATE()');
        $this->db->where('i.etkin', '1');
         $this->db->where('d.sil', '0');

        $query = $this->db->get();

        return $query->result();
    }

    public function get_yonetilen_tezler($user) {

        $this->db->select('t.tezid, t.yazar, t.baslik, t.universite, t.enstitu, t.abd, t.yil, tt.tez_turu');
        $this->db->from('tezler t');
        $this->db->join('insanlar i', 'i.insanid = t.insanid', 'inner');
        $this->db->join('tez_turleri tt', 't.tez_turid = tt.tez_turid', 'inner');

        $this->db->where('i.eposta', $user);

        $this->db->where('i.etkin', '1');
        $this->db->where('t.sil', '0');
        $this->db->order_by('t.yil', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }

}
