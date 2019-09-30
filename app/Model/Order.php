<?php

class Order extends AppModel {
    public $validate = array(
        'status' => array(
            'valid' => array(
                'rule' => array('inList', array('pending', 'approved', 'not_payment', 'audited')),
                'message' => 'Please enter a valid status',
                'allowEmpty' => false
            )
        )
    );
}