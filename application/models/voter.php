<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Voter extends CI_Model
{
    var $firstname = '';
    var $lastname = '';
    var $ip_address = '';
    var $email = '';
    var $facebook_id = 0;
    var $marketing = false;

    function __construct()
    {
        parent::__construct();
    }

    public function savevoter($data = []) {
        //
        $this->firstname        = $data['firstname'];
        $this->lastname         = $data['lastname'];
        $this->ip_address       = $this->input->ip_address();
        $this->email            = $data['email'];
        $this->facebook_id      = $data['smid'];
        $this->marketing        = $data['marketing'];

        $res = $this->db->insert('voters', $this);
        if ($res) {
            return $this->db->insert_id();
        }
        return $res;
    }

}

