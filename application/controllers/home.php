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
        $this->data['submissions'] = $this->submission->get_submissions();
        //var_dump($this->data); die;
        $this->data['nav']['dactive'] = true;
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
}
