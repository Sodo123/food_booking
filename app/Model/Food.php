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
}