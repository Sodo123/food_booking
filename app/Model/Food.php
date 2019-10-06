<?php

class Food extends AppModel {
    public $validate = array(
        'name' => array(
            'rule' => 'notBlank'
        ),
        'cateogory_id' => array(
            'rule' => 'notBlank'
        )
    );

    public $hasAndBelongsToMany = array(
        'Order' =>
            array(
                'className' => 'Order',
                'joinTable' => 'foods_orders'
            )
        );
    public $belongsTo = 'Category';
}