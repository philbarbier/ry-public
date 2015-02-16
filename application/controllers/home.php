<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
    
    var $data = [];

    function __construct()
    {
        parent::__construct();
        $this->data['nav']['dactive'] = false;
        $this->data['nav']['aactive'] = false;
        $this->data['nav']['mactive'] = false;
        $this->data['nav']['ractive'] = false;
    }
    
    public function index() {
        $this->load->model('submission', 'submission', true);
        $currpage = is_numeric($this->input->get('p')) ? $this->input->get('p') : 1;
        $this->data['submissions'] = $this->submission->get_submissions($currpage);
        $this->data['nav']['dactive'] = true;
        $total = $this->submission->get_submission_total();
        $this->data['nav']['totalpages'] = ceil($total / 16);
        $this->data['nav']['currpage'] = $currpage;
        $this->_load_view('homepage', $this->data);
    }

    public function howtoenter() {
        $this->_load_view('howtoenter', $this->data);
    }

    public function about() {
        $this->data['nav']['aactive'] = true;
        $this->_load_view('about', $this->data);
    }

    public function make() {
        $this->data['nav']['mactive'] = true;
        $this->_load_view('make', $this->data);
    }

    public function rules() {
        $this->data['nav']['ractive'] = true;
        $this->_load_view('rules', $this->data);
    }

    public function terms() {
        $this->_load_view('terms', $this->data);
    }

    public function addvoter() {
        $this->load->model('voter');
        $id = $this->voter->savevoter($this->input->post());
        header('Content-Type: application/json');
        echo json_encode(array('voter_id' => $id));
        die;
    }

    public function vote() {
        $this->load->model('Submission_vote');
        $result = $this->Submission_vote->vote($this->input->post());
        header('Content-Type: application/json');
        echo json_encode(array('error' => !$result));
        die;
    }
}
