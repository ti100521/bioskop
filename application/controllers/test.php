<?php

function sum($a, $b) {
    return $a+$b;
}

class Test extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('unit_test');
    }
    
    public function index() {
        $this->unit->run(sum(4,3), 7, "testiranje sum-a");
        $this->load->view('test_view');
    }
    
    public function test1(){
//        $this->unit->set_test_items(array('test_name', 'test_datatype', 'result'));
        $this->unit->run(sum(4,3), 7, "testiranje sum-a");
        $this->load->view('test_view');
    }
}

?>