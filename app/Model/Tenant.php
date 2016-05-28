<?php

App::uses('AppModel','Model');
 
Class Tenant extends AppModel {
    
    public $name = 'Tenant';
    
    public $hasOne = array(
                         'Pending' => array('className' => 'Pending')
                         );
    
    public $hasMany = array(
        
                        'Rent' => array('className' => 'Rent')
                
                          );
    
    public $validate = array(
                             'first_name' => 'alphaNumeric',
                             'middle_name' => 'alphaNumeric',
                             'last_name' => 'alphaNumeric',
                             //'nationality' => 'alphaNumeric',
                             //'mobile_number' => array('naturalNumber',true),
                             //'date_of_move_in' => array('date', 'ymd'),
                             'type'  => 'alphaNumeric',
                             'price' => 'naturalNumber' 
                             ); 
    
}