<?php

class FoodsController extends AppController {

    public $helpers = array('Html', 'Form','Flash');
    public $components = array('Flash');
    var $uses = array('Order', 'Food');

    public function index() {
        $meals = $this->Food->find('all', array(
            'conditions' => array('Food.category_id' => 1)
        ));
        $drinks = $this->Food->find('all', array(
            'conditions' => array('Food.category_id' => 2)
        ));
        
        $this->set(array('meals' => $meals, 'drinks' => $drinks));
    }

    public function add() {

        if ($this->request->is('post')) {
            //Added this line
            $this->request->data['Order']['user_id'] = $this->Auth->user('id');
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
        }
    }

}
