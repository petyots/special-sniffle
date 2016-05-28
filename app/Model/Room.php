<?php 

App::uses('AppModel','Model');

Class Room extends AppModel {
    
    public $name = 'Room';
    
    
    
    
    public $hasMany = array (
                                'Tenant' => array('className' => 'Tenant'),
                                
                            );
                            
                          
                            
    public $validate = array('property_id' => 'alphaNumeric',
                             'number_of_beds' => 'alphaNumeric',
                             'type'  => 'alphaNumeric',
                             //'price' => 'naturalNumber' 
                             );                        
                            
    
}