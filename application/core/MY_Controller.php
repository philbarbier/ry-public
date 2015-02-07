<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function _load_view($viewname = false, $viewdata = []) {
        $this->load->view('header', $viewdata);
        $this->load->view('nav', $viewdata);
        $this->load->view($viewname, $viewdata);
        $this->load->view('footer');
    }

}
