<?php

App::uses('AppController','Controller');

Class RoomController extends AppController {
    
    public $uses = array('Pending','Room','Property','Tenant');

     public function beforeFilter()
        {

        if($this->_isLoggedIn() === false){

            $this->_flasher('You have to log - in first','info');
            $this->redirect(array('controller' => 'Operator','action' => 'login'));
        }

        }

    public function _freeBeds($roomId = null){
        
        if(!$roomId){
            
            throw new NotFoundException("Internal Error");
            
        }
        
        $room = $this->Room->findById($roomId);
        
        if(!$room){
            
            throw new NotFoundException("Internal Error !");
        }
        
        $tenants = $this->Tenant->find('count',array('conditions' => array('Tenant.active' => true,'Tenant.room_id' => $roomId)));
        
        $beds = $room['Room']['number_of_beds'];
        
        return $beds - $tenants;
    }
    
    public function freePlace(){
        
     $rooms = $this->Room->find('all');
     
     $tempArr = array();
     
     foreach($rooms as $key => $value):
     
     $beds = $this->_freeBeds($value['Room']['id']);
     
     if($beds !== 0){
        
        unset($value['Tenant']);
        
      $locationTitle = $this->Property->findById($value['Room']['property_id']);
        
      $value['Room']['location_title'] = $locationTitle['Property']['title'];
      
      $value['Room']['free_beds'] = $beds;
        
      $tempArr[$key] = $value;
        
     }
     
     endforeach;
     
     $data = $tempArr;
     
     $this->set('data',$data);
     
     unset($tempArr);
    
    }
    
    public function index()
    {
      
      $rooms = $this->Room->find('all');
      
      $tenants = $this->Tenant->find('count',array('conditions' => array('Tenant.active' => true)));
      
      $onlyRooms = array();
      
      $onlyTenants = array();
      
      $temp = array();
      
      foreach($rooms as $k => $v):
      
      unset($v['Tenant']);
      
      $onlyRooms[] = $v;
      
      $freeBeds = $this->_freeBeds($v['Room']['id']);
      
      $locationTitle = $this->Property->findById($v['Room']['property_id']);
    
        //var_dump($locationTitle);
        
        //exit();
      
      $v['Room']['location_title'] = $locationTitle['Property']['title'];
      
      $v['Room']['free_beds'] = $freeBeds;
      
      //array_push($v['Room'],;['']$freeBeds);
      
      $temp[] = $v;
      
      endforeach;
      
      $countRooms = count($onlyRooms);
      
      //$this->_freeBeds(1);
      
      $rooms = $temp;
     
       $pendingPayments = $this->Pending->find('count');
       
       $tenantsTotal = count($onlyTenants);
       
       $counter = array('PP' => $pendingPayments,'Rooms' => $countRooms, 'Tenant' => $tenants);
      
       $this->set('rooms',$rooms);
       
       $this->set('counter',$counter);
      
      
    }
    
    public function add($propertyId = null)
    {
        if(!$propertyId){
        
        $properties = $this->Property->find('all');
        
        $this->set('properties',$properties);
        
        }else{
             
            $id = true;
            
            $properties = $this->Property->findById($propertyId);
            
            if(!$properties){
                
                throw new NotFoundException("Invalid ID");
            }
            
            $this->set('properties',$properties);
            
            $this->set('single',true);
            
            
            
        }
        
        
        if($this->request->is('post')):
        
        
        $data = $this->request->data;
        
        $this->Room->set($data);
        
        if ($this->Room->validates()) {
            
        $this->Room->create();  
        
        if($id  === true):
        
        $this->Room->saveField('property_id',$propertyId);
        
        endif;
            
        $save = $this->Room->save($data);
        
        $id = $this->Room->getLastInsertID();
    
        $this->_flasher('You Added Record with ID:'. $id,'success');
        
        //$this->redirect($this->referer());
        
        $data['type'] = 'added';
        $data['onlyId'] = $id;
        $data['urlToId'] = $this->_linkerist('room','view',$id);
        $data['urlToAction'] = $this->_linkerist('room','add');
        
        $this->set('data',$data);
        
        $this->render('/Elements/linker');
        
        
        } else {
    
       
       $this->_flasher('There was an error... Please check that you filled all the fileds correctly!','danger');
       
       $this->redirect($this->referer());
        
        }
        
        
        
        
        endif;
        
        
    }
    
    public function view($id = null)
    {
        
        if(!$id):
        throw new NotFoundException(h("Invalid ID"));
        endif;
        
        $id = (int)$id;
        
        $room = $this->Tenant->find('all',array('conditions' => array('Tenant.room_id' => arraY($id),'Tenant.active' => true)));
   
   
        if(!$room):
        
        $msg = "<h4>There are no Tenants in This Room !</h4>";
        
        $this->set('id',$id);
        
        $this->set('msg',$msg) ;      
        
        endif;
        
        $this->set('data',$room);
    }
    
    
    
}