<?php

App::uses('AppController','Controller');

Class PropertyController extends AppController 
{
     public function beforeFilter()
        {

        if($this->_isLoggedIn() === false){

            $this->_flasher('You have to log - in first','info');
            $this->redirect(array('controller' => 'Operator','action' => 'login'));
        }

        }
    
    public function index()
    {
        
        $data = $this->Property->find('all');
        
        $this->set('data',$data);
        
        

    }

    public function _gen_random($length=8)
{
    $final_rand='';
    for($i=0;$i< $length;$i++)
    {
        $final_rand .= rand(0,9);

    }

    return $final_rand;
}


    public function add()
    {

        if($this->request->is('post')):


        $data = $this->request->data;
        
        $this->Property->set($data);
        
        
        if ($this->Property->validates()) {
            
        $this->Property->create();  
            
        $save = $this->Property->save($data);
        
        $id = $this->Property->getLastInsertID();
    
        $this->_flasher('You Added Record with ID:'. $id,'success');
        
        //$this->redirect($this->referer());
        
        $data['type'] = 'added';
        $data['onlyId'] = $id;
        $data['urlToId'] = $this->_linkerist('property','details',$id);
        $data['urlToAction'] = $this->_linkerist('property','add');
        
        $this->set('data',$data);
        
        $this->render('/Elements/linker');
        
        
        } else {
    
       
       $this->_flasher('There was an error... Please check that you filled all the fileds correctly!','danger');
       
       $this->redirect($this->referer());
        
        }
        
        
        
        
        endif;
        
        
       
        
    }
    
    public function details($id = null){
        
        if(!$id):
        throw new NotFoundException(h("Invalid ID"));
        endif;
        
        $id = (int)$id;
        
        $details = $this->Property->findById($id);
        
        if(!$details):
        throw new NotFoundException(h("Invalid ID"));
        endif;
        
        $this->set('data',$details);
        
        
        
    }
    
}