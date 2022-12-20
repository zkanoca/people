<?php

/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */

class Duyurular_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_duyurular($user) {

        $this->db->select("d.tarih, d.baslik, d.metin, d.duyuruid, d.takma_ad");
        $this->db->from("duyurular d");
        $this->db->join("insanlar i", "i.insanid = d.insanid", "inner");

        $this->db->where("i.eposta", $user);
        $this->db->where("d.etkin", "1");
        $this->db->where("i.etkin", "1");
        $this->db->where("d.sil", "0");
        $this->db->where("d.gecerlilik >=", date('Y-m-d'));
        $this->db->order_by("d.tarih", "DESC");

        //$sorgu = "SELECT d.tarih, d.baslik, d.metin, d.gecerlilik FROM duyurular d INNER JOIN insanlar i ON i.insanid=d.insanid WHERE i.eposta = '$user' AND d.etkin = 1 AND i.etkin = 1 AND d.sil = 0 AND d.gecerlilik >= CURRENT_DATE() ORDER BY d.tarih DESC";
        $query = $this->db->get();
        //$query = $this->db->query($sorgu);


        return $query->result();
    }

}
