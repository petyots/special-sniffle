<?php 

App::uses('AppModel','Model');

Class Rent extends AppModel {
    
    public $name = 'Rent';
    
    public $validate  = array(
                                'date_paid' => 'date',
                                'amount' => 'alphaNumeric',
                                'nextDate' => 'date',
                                'comment' => 'alphaNumeric'
                                
                             );
    
    
}