<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Senat extends CI_Controller {

public function index() {
    $data = array(
        'title' => "Senat Polinema"
    );
    $this->load->view('senat/index', $data);
}
}