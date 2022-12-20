<?php

/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */

class Navigasyon_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_user4nav($user) {

        $this->db->select('i.doktora, u.unvan, i.adi, i.soyadi, i.eposta, COUNT(d.duyuruid) AS duyuruSayisi');
        $this->db->from('insanlar i');
        $this->db->join('unvanlar u', 'u.unvanid = i.unvanid');
        $this->db->join('duyurular d', 'd.insanid = i.insanid');

        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', "1");
        $this->db->where("d.sil", "0");
        $this->db->where("d.gecerlilik >=", date('Y-m-d'));

        $query = $this->db->get();


        return $query->result();
    }

}
