<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Submission_vote extends CI_Model
{
    var $submission_id = 0;
    var $voter_id = 0;

    public function vote($data = []) {
        $this->submission_id    = $data['submission_id'];
        $this->voter_id         = $data['voter_id'];
        return $this->db->insert('submission_votes', $this);
    }
}
