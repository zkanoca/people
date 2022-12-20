<?php

/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */

class Hakkinda_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_hakkinda($user) {

        $this->db->select('i.hakkinda, i.uzmanlik_alanlari, i.calisma_alanlari, ob.ogrenim_bilgiid, ob.universite, ob.okul, ob.program, ob.mezuniyet_tarihi, od.derece');
        $this->db->from('insanlar i');
        $this->db->join('ogrenim_bilgileri ob', 'ob.insanid= i.insanid');
        $this->db->join('ogrenim_dereceleri od', 'od.ogrenim_dereceid = ob.ogrenim_dereceid');

        $this->db->where('i.eposta', $user);
        $this->db->where('i.etkin', '1');
        $this->db->where('ob.sil', '0');
        $this->db->order_by('ob.mezuniyet_tarihi', "DESC");

        $query = $this->db->get();


        return $query->result();
    }

}
