<?php

App::uses('AppController','Controller');
App::uses('CakeEmail', 'Network/Email');

Class TenantController extends AppController
{
    public $uses = arraY('Room','Tenant','Property');
    
    public $components = array('Paginator');

     public function beforeFilter()
        {

        if($this->_isLoggedIn() === false){

            $this->_flasher('You have to log - in first','info');
            $this->redirect(array('controller' => 'Operator','action' => 'login'));
        }

        }

    public function test()
    {
        $subject = "Tenant Payment Made ";

        $message = "On Date Of Payment, You paid AMOUNT for Your Rent. Your
        Next date for payments is NEXTDATE.<br/> Your Confirmation Code is : CODE";


        $Email = new CakeEmail();
        $Email->from(array('me@example.com' => 'My Site'))
        ->to('kurecpalec@grr.la')
        ->emailFormat('html')
        ->subject($subject)
        ->send($message);

        $this->autoRender  = false;

        echo "OK";


    }

    public function find()
    {
        if($this->request->is('post')){

            $tenantId = $this->data['Tenant']['tenant_id'];

            $tenant = $this->Tenant->findById($tenantId);

            if(!$tenant){
                throw new NotFoundException("Tenant with ID : ".$tenantId." Does not Exist...");
            }else{

             $this->set('tenant',$tenant);

             $this->redirect(Router::url(array('action' => 'details',$tenantId)));

            }

        }

    }

    public function index()
    {



        $this->Paginator->settings = array(
        'order' => array(
            'Tenant.room_id' => 'asc'
        ),
        'conditions' => array('Tenant.active' => true),
        'limit' => 10
        );
        $data = $this->Paginator->paginate('Tenant');
        
        $tempArr = $data;

        foreach($data as $key => $value):
        
        $room = $this->Room->findById($value['Tenant']['room_id']);
        
        $property = $this->Property->findById($room['Room']['property_id']);
        
        $tempArr[$key]['Tenant']['room_number'] = $room['Room']['room_number'];
        
        $tempArr[$key]['Tenant']['location_title'] = $property['Property']['title'];
        
        endforeach;
        
        $data = $tempArr;
        
        unset($tempArr);
        
        $this->set('data',$data);
        
    }
    
    public function edit($id = null) {
    if (!$id) {
        throw new NotFoundException(__('Invalid post'));
    }

    $tenant = $this->Tenant->findById($id);
    if (!$tenant) {
        throw new NotFoundException(__('Invalid post'));
    }

    if ($this->request->is(array('post', 'put'))) {
        $this->Tenant->id = $id;
        if ($this->Tenant->save($this->request->data)) {
            $this->_flasher('You Updated Record with ID:'. $id,'success');
              
            return $this->redirect(Router::url(array('controller' => 'tenant', 'action' =>'details',$id)));  
        }
        
        $this->Session->_flasher('Unable to update your post.','danger');
    }

    if (!$this->request->data) {
        $this->request->data = $tenant;
    }
}
    

    public function add($roomId = null){
        
        if(!$roomId){
            
            throw new NotFoundException("You must enter a room first !");
        }
        
        $room = $this->Room->findById($roomId);
        
        if(!$room){
            
            throw new NotFoundException("You must enter a room first !");
        }
        
        $this->set('room',$roomId);
        
        
        if($this->request->is('post')):
        
        
        $data = $this->request->data;
        
        $this->Tenant->set($data);
        
        
        if ($this->Tenant->validates()) {
            
        $this->Tenant->create();  
            
        $save = $this->Tenant->save($data);
        
        $id = $this->Tenant->getLastInsertID();
    
        $this->_flasher('You Added Record with ID:'. $id,'success');
        
        //$this->redirect($this->referer());
        
        $data['type'] = 'added';
        $data['onlyId'] = $id;
        $data['urlToId'] = $this->_linkerist('tenant','details',$id);
        $data['urlToAction'] = $this->_linkerist('tenant','add');
        
        $this->set('data',$data);
        
        $this->render('/Elements/linker');
        
        
        
        } else {
    
       
       $this->_flasher('There was an error... Please check that you filled all the fileds correctly!','danger');
       
       $this->redirect($this->referer());
        
        }
        
        
        
        
        endif;
        
    }
    
    public function status($tenantId = null, $state = null){
        
        if($this->request->is('get')):
        
        throw new NotFoundException(h("Wrong Command..."));
        
        endif;
        
        if(!$tenantId):
        throw new NotFoundException(h("Invalid ID"));
        endif; 
        
        $tenant = $this->Tenant->findById($tenantId);
        
        if(!$tenant):
        throw new NotFoundException(h("Invalid ID"));
        endif;
        
        $this->Tenant->id = $tenant['Tenant']['id'];
        
        if(!$state):
        
        return $tenant['Tenant']['active'];
        
        endif;
        
        switch($state){
            
            case 'activate':
            
            if($this->Tenant->saveField('active',true)):
            
            $this->_flasher("You changed the status of Tenant ID : ". $tenantId . " To Active.",'success');
            
            return $this->redirect($this->referer());
            
            else:
            
            $this->_flasher("Something Went Really Wrong...",'danger');
            
            return $this->redirect($this->referer());
            
            endif;
            
            break;
            
            case 'deactivate':
            
            if($this->Tenant->saveField('active',false)):
            
            $this->_flasher("You changed the status of Tenant ID : ". $tenantId . " To Inactive.",'danger');
            
            return $this->redirect($this->referer());
            
            else:
            
            $this->_flasher("Something Went Really Wrong...",'danger');
            
            return $this->redirect($this->referer());
            
            endif;
            
            break;
            
            default:
            
            throw new NotFoundException(h("Wrong Command..."));
            
        }
        
    }
    
    public function details($id = null)
    {

        
        if(!$id):
        throw new NotFoundException(h("Invalid ID"));
        endif;
        
        $id = (int)$id;
        
        $tenant = $this->Tenant->findById($id);
        
        if(!$tenant):
        throw new NotFoundException(h("Invalid ID"));
        endif;
        
        $tempArr = $tenant;
        
        $room = $this->Room->findById($tenant['Tenant']['room_id']);
        
        $property = $this->Property->findById($room['Room']['property_id']);
        
        $tempArr['Tenant']['room_number'] = $room['Room']['room_number'];
        
        $tempArr['Tenant']['location_title'] = $property['Property']['title'];
        
        $tenant = $tempArr;
        
        unset($tempArr);
        
        $this->set('data',$tenant);
        
        $this->set('referer',$this->referer());
    }
    
}