<?php

App::uses('AppController','Controller');

Class RentController extends AppController {

 public function beforeFilter()
        {

        if($this->_isLoggedIn() === false){

            $this->_flasher('You have to log - in first','info');
            $this->redirect(array('controller' => 'Operator','action' => 'login'));
        }

        }
    
    public $uses = array('Tenant','Pending','Rent');
    
    public $components = array('Paginator','Mail');

    public $helpers = array('Code')   ;
    
    public function index()
    {
        
        $this->Paginator->settings = array(
        'order' => array(
            'Rent.id' => 'asc'
        ),
        'limit' => 10
        );
        
        $data = $this->Paginator->paginate('Rent');
        
        $this->set('data',$data);      
        
        
    }

    public function _confirmationCode($length=8)
    {
    $final_rand='';

    for($i=0;$i< $length;$i++)
    {
        $final_rand .= rand(0,9);

    }

    return $final_rand;
    }
    
    public function pay($tenantId = null)
    {
        if(!$tenantId){
            
            throw new NotFoundException;
        }
        
        $tenant = $this->Tenant->findById($tenantId);
        
        
        
         if(!$tenant){
            
            throw new NotFoundException;
        }

        $this->set('tenant',$tenant);
        
        if($this->request->is(array('post'))){

        $confirmationCode = $this->_confirmationCode();

        $this->request->data['Rent']['code'] = $confirmationCode;

        $this->Rent->set($this->request->data);

            $this->Rent->create();

            if ($this->Rent->save($this->request->data)) {

                $data['code'] = $confirmationCode;

                $data['email'] = $tenant['Tenant']['email'];

                $data['tenant_name'] = $tenant['Tenant']['first_name']." ".$tenant['Tenant']['last_name'];

                $data['date_of_payment'] = $this->request->data['Rent']['date_paid'];

                $data['next_date'] = $this->request->data['Rent']['next_date'];

                $data['amount'] = $this->request->data['Rent']['amount_paid'];

                $this->Mail->rentConfirmation($data);

                $pending = $this->Pending->findByTenantId($tenantId);

                if($pending){

                    $this->Pending->delete($pending['Pending']['id'],false);

                }
                
                $this->_flasher('Tenant with ID : '.$tenantId. "Payed the rent !",'success');
                return $this->redirect(array('controller'=>'tenant','action' => 'details',$tenantId));
            }



        }



    }



}

