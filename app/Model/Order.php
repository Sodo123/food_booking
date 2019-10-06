<?php

class Order extends AppModel {
    public $drinks = "hello";
    public $validate = array(
        'status' => array(
            'valid' => array(
                'rule' => array('inList', array('pending', 'approved', 'not_payment', 'audited')),
                'message' => 'Please enter a valid status',
                'allowEmpty' => false
            )
        )
    );

    public $hasAndBelongsToMany = array(
        'Food' =>
            array(
                'className' => 'Food',
                'joinTable' => 'foods_orders',
            ),
        );
    public $belongsTo = 'User';

}