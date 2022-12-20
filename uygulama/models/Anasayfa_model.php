<?php

/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */

class Anasayfa_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_user($user) {

        $this->db->select('i.*, u.unvan, b.birim');
        $this->db->from('insanlar i');
        $this->db->join('unvanlar u', 'u.unvanid = i.unvanid');
        $this->db->join('birimler b', 'b.birimid = i.birimid');
        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', '1');

        $query = $this->db->get();


        return $query->result();
    }

//    public function get_giris($user) {
//
//
//        $this->db->select('i.doktora, i.adi, i.soyadi, i.eposta, .itelefon, i.gsm, i.dahili, i.faks i.fotograf, u.unvan, b.birim');
//        $this->db->from('insanlar i');
//        $this->db->join('unvanlar u', 'u.unvanid = i.unvanid');
//        $this->db->join('birimler b', 'b.birimid = i.birimid');
//        $this->db->where('i.eposta', $user);
//        $this->db->where('i.etkin', "1");
//
//        $query = $this->db->get();
//
//
//        return $query->result();
//    }
//
//    public function get_userid($user) {
//
//
//        $this->db->select('insanid');
//        $this->db->from('insanlar');
//        $this->db->where('i.eposta', $user);
//        $this->db->where('i.etkin', "1");
//
//        $query = $this->db->get();
//
//
//        return $query->result();
//    }

}
