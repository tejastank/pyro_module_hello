<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hello extends Public_Controller {
    public $limit = 5; // TODO: PS - Make me a settings option

    public function __construct() {
        parent::Public_Controller();
        $this->load->model('hello_m');
        $this->lang->load('hello');
    }

    // blog/page/x also routes here
    public function index() {
        $data = $this->hello_m->get();
        $this->data['msg'] = $data;
        $this->template->build('index', $this->data);

    }
}