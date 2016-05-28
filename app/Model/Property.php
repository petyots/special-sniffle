<?php 

App::uses('AppModel','Model');

Class Property extends AppModel {
    
    public $name = 'Property';
    
    public $hasMany = array (
                                'Room' => array('className' => 'Room')
                            );
    
    public $validate = array('title'  => 'alphaNumeric',
                             'location' => 'alphaNumeric',
                             'number_of_beds' => 'naturalNumber',
                             
                             );
    
}