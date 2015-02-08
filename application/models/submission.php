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

    public function get_submissions($offset = 0, $limit = 16) {
        $query = $this->db->get('submissions', $limit, $offset);
        $results = [];
        foreach ($query->result() as $row) {
            $results[$row->id] = $row;
            $query2 = $this->db->get_where('submission_files', array('submission_id' => $row->id));
            $files = [];
            foreach ($query2->result() as $row2) {
                // $row2->filename = 'submission_thumb_placeholder.jpg';
                $row2->fullpath = 'http://ry-admin.seepies.net/uploads/' . $row2->filename;
                $files[] = $row2;
            }
            $results[$row->id]->files = $files;

            $results[$row->id]->votes = $this->get_submission_votes($row->id);
        }
        // fake it, for now
        for ($i=0; $i < 19; $i++) {
            //$results[$i+1] = $results[12];
        }
        return $results;
    }

    public function get_submission($id = false) {
        $query = $this->db->get_where('submissions', array('id' => $id));
        $data = $query->row();
        $query = $this->db->get_where('submission_files', array('submission_id' => $id));
        foreach ($query->result() as $row) {
            $data->files[] = $row;
        }
        $data->votes = $this->get_submission_votes($id);

        return $data;
    }

    private function get_submission_votes($submission_id = false) {
        if (!$submission_id) return 0;
        $query = $this->db->get_where('submission_votes', array('submission_id' => $submission_id));
        return $query->num_rows();
    }
}
