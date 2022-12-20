<?php

/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */

class Duyurudetay_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_duyurudetay($user, $takma_ad) {

        $this->db->select("d.tarih, d.baslik, d.metin, d.duyuruid, d.takma_ad");
        $this->db->from("duyurular d");
        $this->db->join("insanlar i", "i.insanid = d.insanid", "inner");

        $this->db->where("i.eposta", $user);
        $this->db->where("d.etkin", "1");
        $this->db->where("i.etkin", "1");
        $this->db->where("d.sil", "0");
        $this->db->where("d.gecerlilik >=", date('Y-m-d'));
        $this->db->where("d.takma_ad", $takma_ad);

        $query = $this->db->get();

        return $query->result();
    }

}
