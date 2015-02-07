<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Voter extends CI_Model
{
    var $firstname = '';
    var $lastname = '';
    var $submission_id = 0;
    var $ip_address = '';
    var $email = '';
    var $socialmedia_id = 0;

    function __construct()
    {
        parent::__construct();
    }
}

