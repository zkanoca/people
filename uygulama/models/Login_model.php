<?php

/* Yazar: Özkan ÖZLÜ
 * Yazar E-posta: ozkanozlu@ibu.edu.tr
 * 
 */
defined('BASEPATH') OR exit('Giremezsin >:(');

class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function login($eposta) {

        $this->db->select('i.*, u.unvan, b.birim');
        $this->db->from('insanlar i');
        $this->db->join('unvanlar u', 'u.unvanid = i.unvanid');
        $this->db->join('birimler b', 'b.birimid = i.birimid');
        $this->db->where('i.eposta', $eposta);
        $this->db->where('i.etkin', '1');

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            $this->session->set_userdata(
                    array('oturum' => TRUE, 'eposta' => $eposta, 'insanid' => $query->result()[0]->insanid)
            );

            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function ldapBaglan($eposta, $parola) {
        $ldaphost = "194.27.34.203";
        /* for a SSL secured ldap_connect()
          $ldaphost = "ldap.yourdomain.com"; */
        $ldapport = 389;
        $ds = ldap_connect($ldaphost, $ldapport) or die();
        $sonuc = FALSE;
        if ($ds) {
            $binddn = 'uid=' . $eposta . ',ou=people,dc=ibu,dc=edu,dc=tr';

            $ldapbind = @ldap_bind($ds, $binddn, $parola);

            if ($ldapbind) {
                $this->session->set_userdata(
                        array('oturum' => TRUE, 'eposta' => $eposta)
                );
                $sonuc = TRUE;
            } else {
                $this->session->unset_userdata(array('oturum', 'eposta', 'insanid'));
                $sonuc = FALSE;
            }
        }

        return $sonuc;
    }

    public function ldapBaglanirGibiYap($eposta) {
        $this->session->set_userdata(array('oturum' => TRUE, 'eposta' => $eposta));
        return TRUE;
    }

    public function kullanici_ekle($eposta, $p_oturum) {
        $data = array('eposta' => $eposta, 'p_oturum' => $p_oturum);
        $this->db->insert('insanlar', $data);
    }

    public function db_yokla($eposta) {
        $this->db->select('i.insanid, i.eposta');
        $this->db->from('insanlar i');
        $this->db->where('i.eposta', $eposta);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function p_oturumac($eposta, $p_oturum) {
        $data = array('p_oturum' => $p_oturum);
        $this->db->where('eposta', $eposta);
        $this->db->update('insanlar', $data);
    }

    public function oturum_kayit($eposta, $ip, $zamanDamgasi, $eylemTuru) {
        $data = array('eposta' => $eposta, 'p_oturum' => $p_oturum);
        $this->db->insert('insanlar', $data);
    }

    public function oturum_bosalt() {
        $this->session->unset_userdata(array('oturum', 'eposta'));
    }

}
