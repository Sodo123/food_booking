<?php

class OrdersController extends AppController {

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
        $orders = $this->Order->find('all');
        
        $this->set(array('meals' => $meals, 'drinks' => $drinks, 'orders' => $orders));
    }

    public function add(){
        if ($this->request->is('post')) {
            pr($this->request->params['food']);
            //Added this line
            // $this->Order->set('user_id', $this->Auth->user('id'));
            // $this->Order->set('status', 'pending');

            // // $this->request->data['Order']['user_id'] = $this->Auth->user('id');
            // // $this->request->data['Order']['status'] = 'pending';
            //  if (!isset($this->request->params['customer_name'])) {
            //         $this->Order->set('customer_name', $this->Auth->user('username'));
            // }
            
            // if ($this->Order->save()) {
            //      $this->Flash->success(__('Your post has been saved.'));
            // }
            // return $this->redirect(array('action' => 'index'));
        }
    }

}