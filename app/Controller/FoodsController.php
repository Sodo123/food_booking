<?php

class FoodsController extends AppController {

    public $helpers = array('Html', 'Form','Flash');
    public $components = array('Flash');


    public function index() {
        $meals = $this->Food->find('all', array(
            'conditions' => array('Food.category_id' => 1)
        ));
        $drinks = $this->Food->find('all', array(
            'conditions' => array('Food.category_id' => 2)
        ));
        
        $this->set(array('meals' => $meals, 'drinks' => $drinks));
    }

}
