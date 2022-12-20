<?php

/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */

class Header_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_user4header($user) {
        $this->db->select('i.doktora, u.unvan, i.adi, i.soyadi, i.eposta');
        $this->db->from('insanlar AS i');
        $this->db->join('unvanlar AS u', 'u.unvanid = i.unvanid');

        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', '1');

        $query = $this->db->get();

        return $query->result();
    }

 

}
