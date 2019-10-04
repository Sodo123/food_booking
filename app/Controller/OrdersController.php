<?php

class OrdersController extends AppController {

    public $helpers = array('Html', 'Form','Flash');
    public $components = array('Flash');
    var $uses = array('Order', 'Food', 'FoodOrder');

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
            pr($this->request->data['foods']);

            //Added this line
             $this->Order->set('user_id', $this->Auth->user('id'));
             $this->Order->set('status', 'pending');

            if (!isset($this->request->params['customer_name'])) {
                    $this->Order->set('customer_name', $this->Auth->user('username'));
            }
            
            $order = $this->Order->save();
            pr($order);
            if (!empty($order)) {
                $this->Flash->success(__('Your post has been saved.'));
                $foods = $this->request->data['foods'];
                for ($i = 1; $i < count($foods); $i++) {
                    $this->FoodOrder->create();
                    $this->FoodOrder->set('order_id', $this->Order->id);
                    $this->FoodOrder->set('food_id', $foods[$i]);
                    $this->FoodOrder->save();
                    echo $i;
                }
            }
            return $this->redirect(array('action' => 'index'));
        }
    }

}