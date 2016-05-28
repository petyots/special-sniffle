<?php

App::uses('AppController','Controller');

Class PendingController extends AppController 
{
    public $uses = arraY('Room','Property','Pending');

     public function beforeFilter()
        {

        if($this->_isLoggedIn() === false){

            $this->_flasher('You have to log - in first','info');
            $this->redirect(array('controller' => 'Operator','action' => 'login'));
        }

        }
    
    public function index()
    {
        $pendings = $this->Pending->find('all');
        
        $tempArr = $pendings;
        
        foreach($pendings as $key => $value):
        
        $room = $this->Room->findById($value['Pending']['room_id']);
        
        $location = $this->Property->findById($room['Room']['property_id']);
        
        $locationTitle = $room['Room']['room_number']." - ".$location['Property']['title'];
        
        $tempArr[$key]['Pending']['location'] = $locationTitle;
        
        endforeach;
        
        $pendings = $tempArr;
        
        unset($tempArr);
        
        $this->set('pendings',$pendings);
        
    }
    
    public function overdue()
    {
        
    }
    
}
