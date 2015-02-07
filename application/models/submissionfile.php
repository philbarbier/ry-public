<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SubmissionFile extends CI_Model
{
    var $submission_id = 0;
    var $filename = '';

    function __construct()
    {
        parent::__construct();
    }

    public function addfile($data = []) {
        $this->submission_id    = $data['submission_id'];
        $this->filename         = $data['filename'];
        return $this->db->insert('submission_files', $this);
    }
}

