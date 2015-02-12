<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Submission extends CI_Model
{
    var $firstname = '';
    var $lastname = '';
    var $school = '';
    var $biotext = '';
    var $email = '';

    var $limit = 16;

    function __construct()
    {
        parent::__construct();
    }

    public function get_submissions($currpage = 1) { //offset = 0, $limit = 16) {
        $offset = ($currpage > 1) ? (($this->limit * $currpage) + 1)  : 0;
        $query = $this->db->get('submissions', $this->limit, $offset);
        $results = [];
        $i = 0; // we do this for sorting purposes
        foreach ($query->result() as $row) {
            $results[$i] = $row;
            $query2 = $this->db->get_where('submission_files', array('submission_id' => $row->id));
            $files = [];
            foreach ($query2->result() as $row2) {
                $row2->fullpath = 'http://ry-admin.seepies.net/uploads/' . $row2->filename;
                $files[] = $row2;
            }
            $results[$i]->files = $files;
            $results[$i]->votes = $this->get_submission_votes($row->id);
            $i++;

        }
        // sort submissions by number of votes descending
        $results = $this->sort_submissions($results);
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
    // bubbles!
    private function sort_submissions($unsorted = []) {
        for ($i=0; $i < count($unsorted); $i++) {
            for ($j=0; $j < count($unsorted); $j++) {
                if ($unsorted[$i]->votes > $unsorted[$j]->votes) {
                    $lower = $unsorted[$j];
                    $unsorted[$j] = $unsorted[$i];
                    $unsorted[$i] = $lower;
                }
            }
        }
        // now we re-index using the ID
        $data = [];
        foreach($unsorted as $sub) {
            $data[$sub->id] = $sub;
        }
        return $data;
    }

    public function get_submission_total() {
        $query = $this->db->get('submissions');
        return $query->num_rows();
    }
}
