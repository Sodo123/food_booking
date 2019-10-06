<?php

class OrdersController extends AppController {

    public $helpers = array('Html', 'Form','Flash');
    public $components = array('Flash');
    var $uses = array('Order', 'Food', 'FoodOrder');

    public function isAuthorized($user) {// cập nhật lại
        return true;
    }

    public function beforeFilter()
    {
        if($this->Auth->user('role')=='admin'){
            $this->set("role",'admin');//it will set a variable role for your view 
        }
        else
        {
            $this->set("role",'guest');//2 is the role of normal users
        }
        $this->set("user_id",$this->Auth->user('id'));
    }

    public function index() {
        $meals = $this->Food->find('all', array(
            'conditions' => array('Food.category_id' => 1)
        ));
        $drinks = $this->Food->find('all', array(
            'conditions' => array('Food.category_id' => 2)
        ));
        $orders = $this->Order->find('all',array('order' => array('Order.created' => 'asc')));
        $new_orders = array();
        $i = 0;
        foreach($orders as $order) {
            $drinksStr = [];
            foreach($order['Food'] as $food)
            {
                if( $food['category_id'] == 2) {
                    $drinksStr[] = $food['name'] . ' (' . $food['FoodsOrder']['quantity'] . ')';
                }
            }
            $order['Order']['drinks'] = join(", ",$drinksStr);
            $new_orders[$i] = $order;
            $i++;
        }
        //pr($new_orders);
        $this->set(array('meals' => $meals, 'drinks' => $drinks, 'orders' => $new_orders));
    }

    public function add(){
        if ($this->request->is('post')) {
            pr($this->request->data);

            //Added this line
             $this->Order->set('user_id', $this->Auth->user('id'));
             $this->Order->set('status', 'pending');

            if (!empty($this->request->data['customer_name'])) {
                $this->Order->set('customer_name', $this->request->data['customer_name']);
            }else {
                $this->Order->set('customer_name', $this->Auth->user('username'));
            }
            if (isset($this->request->data['note'])) {
                $this->Order->set('note', $this->request->data['note']);
        }
            
            $order = $this->Order->save();
            pr($order);
            if (!empty($order)) {
                $this->Flash->success(__('Your post has been saved.'));
                $foods = $this->request->data['foods'];
                for ($i = 0; $i < count($foods); $i++) {
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

    public function delete() {
        if ($this->request->is('post')) {
            $id = $this->request->data['id'];
            pr($id);
            
            if ($this->Order->delete($id)) {
                $this->Flash->success(__('Order deleted'));
            }
            $this->Flash->error(__('Order was not deleted'));
            return $this->redirect(array('action' => 'index'));
        }
    }
    
    public function debt(){

        $conditions = array('status' => 'approved');
        if($this->Auth->user('role') != 'admin'){// không phải admin thì chỉ xem order của mình
            $user_id = $this->Auth->user('id');
            $conditions['Order.user_id'] = $user_id;
        }
        $filter = array(
            'order' => array('Order.created' => 'asc'),
            'conditions' => $conditions
        );
        $orders = $this->Order->find('all',$filter);
        $new_orders = array();
        $i = 0;
        foreach($orders as $order) {
            $drinksStr = [];
            foreach($order['Food'] as $food)
            {
                if( $food['category_id'] == 2) {
                    $drinksStr[] = $food['name'] . ' (' . $food['FoodsOrder']['quantity'] . ')';
                }
            }
            $order['Order']['drinks'] = join(", ",$drinksStr);
            $new_orders[$i] = $order;
            $i++;
        }
        $this->set(array('orders' => $new_orders));
    }

    public function view(){
        $filter = array(
            'order' => array('Order.created' => 'desc')
        );
        if($this->Auth->user('role') != 'admin'){// không phải admin thì chỉ xem order của mình
            $user_id = $this->Auth->user('id');
            $filter['conditions'] = array(array('Order.user_id' => $user_id));
        }

        $orders = $this->Order->find('all',$filter);
        $new_orders = array();
        $i = 0;
        foreach($orders as $order) {
            $drinksStr = [];
            foreach($order['Food'] as $food)
            {
                if( $food['category_id'] == 2) {
                    $drinksStr[] = $food['name'] . ' (' . $food['FoodsOrder']['quantity'] . ')';
                }
            }
            $order['Order']['drinks'] = join(", ",$drinksStr);
            $new_orders[$i] = $order;
            $i++;
        }
        $this->set(array('orders' => $new_orders));
    }

}