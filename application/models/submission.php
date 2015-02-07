<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Submission extends CI_Model
{
    var $firstname = '';
    var $lastname = '';
    var $school = '';
    var $biotext = '';
    var $email = '';

    function __construct()
    {
        parent::__construct();
    }

    public function add_submission($data = []) {
        $this->firstname = $data['firstname'];
        $this->lastname = $data['lastname'];
        $this->school = $data['school'];
        $this->biotext = $data['biotext'];
        $this->email = $data['email'];

        $res = $this->db->insert('submissions', $this);
        if (!$res) {
            return false;
        }
        $submission_id = $this->db->insert_id();
        //
        $data['submission_id']  = $submission_id;
        $data['filename']       = $data['file']['file_name'];
        $this->load->model('submissionfile', 'sf');
        $res = $this->sf->addfile($data); 
        if (!$res) {
            return false;
        }
        return true;
    }
}
