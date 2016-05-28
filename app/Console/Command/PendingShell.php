<?php

class PendingShell extends AppShell {
    
    public $uses = array('Rent','Tenant','Pending','Error');
    
    public function main() 
    {
        
        
        
        $data = $this->_collectData();
        
        $desc = $this->_decide($data);
        
        $this->_saveData($desc);
        
        
        
        
    }
    
    public function _saveData($data)
    {
       if(!$data){
        
        $this->Error->create();
        $this->Error->saveField('controller','PendingShell');
        $this->Error->saveField('action', 'saveData');
        $this->Error->saveField('error','No Records in The Array...');
        
        exit();
        
       }
       
       foreach($data as $key => $value){
        
        $record = $this->Pending->findByTenantId($value['tenant_id']);
        
        if(!$record){
            
            $this->Pending->create();
            $this->Pending->saveField('tenant_id',$value['tenant_id']);
            $this->Pending->saveField('room_id',$value['room_id']);
            $this->Pending->saveField('amount',$value['amount']);
            
        }else{
            
            $this->Pending->id = $record['Pending']['id'];
            
            $checks = $record['Pending']['checks'];
            
            $updateChecks = $checks + 1;
            
            $this->Pending->saveField('checks',$updateChecks);
            
            
        }
        
       } 
        
    }
  
    
    
    
    public function _collectData()
    {
        
        $data = $this->Rent->find('all');
        
        return $data;
        
        
    }
    
    public function _findTenant($id){
        
        $tenant = $this->Tenant->findById($id);
        
        if(!$tenant){
            
            $this->Error->create();
            $this->Error->saveField('controller','PendingShell');
            $this->Error->saveField('action', 'findTenant');
            $this->Error->saveField('error','Record With ID: '.$id.' Does Not Exist !');
            
            
        
        }else{



            $readyData = array(
            
            'room_id' => $tenant['Tenant']['room_id'],
            'tenant_id' => $id,
            'amount' => $tenant['Tenant']['rent'],

            
            
            );
            
            return $readyData;
            
            
            
        }
        
    }
    
    public function _decide($data){
        
        $tenantData = array();
        
        foreach($data as $key => $value){
            
            $nextDate = $value['Rent']['next_date'];
            
            if($this->_timer($nextDate,false) === true){
                
            $tenantData[] = $this->_findTenant($value['Rent']['tenant_id']);
                
            }

            $tenant = $this->_findTenant()
        }
        
        return $tenantData;
    }
    
    public function _timer($nextDate,$verbose = false)
    {
        $next = new DateTime($nextDate);
        
        $today = new DateTime();
        
        $diff = $next->diff($today);
        
        $descision = $today >= $next;
        
        if($descision === true && $verbose === true):
        
        $data = array(true,$diff->format('%d'));
        
        return $data;
        
        else:
        
        return $descision;
        
        endif;
        
    }
}

?>