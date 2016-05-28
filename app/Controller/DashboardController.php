<?php

App::uses('AppController','Controller');

Class DashboardController extends AppController
{
    public $uses = array('Property','Room','Tenant','Pending');

     public function beforeFilter()
        {

        if($this->_isLoggedIn() === false){

            $this->_flasher('You have to log - in first','info');
            $this->redirect(array('controller' => 'Operator','action' => 'login'));
        }

        }

    public function index()
    {

        $counters = array();

        $properties = $this->Property->find('count');

        $rooms = $this->Room->find('count');
        
        $tenants = $this->Tenant->find('count',array('conditions' => array('Tenant.active' => true)));
        
        $pendings = $this->Pending->find('count');
        
        $overdue = $this->Pending->find('count',array('conditions' => array('checks' => array('>0'))));
        
        $beds = $this->Room->virtualFields['total_beds'] = "SUM(Room.number_of_beds)";
        
        $totalBeds = $this->Room->find('all', array('fields' => array('total_beds')));
        
        $freeBeds = $totalBeds[0]['Room']['total_beds'] - $tenants;
        
        $counters['properties'] = $properties;
        
        $counters['rooms'] = $rooms;
        
        $counters['tenants'] = $tenants;
        
        $counters['pendings'] = $pendings;
        
        $counters['overdue'] = $overdue;
        
        $counters['free_beds'] = $freeBeds;
        
        $this->set('counter',$counters);
        
        
        
    }
    
}