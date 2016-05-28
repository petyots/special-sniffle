

<div class="col-sm-12">

             <?php

             $roomId = $this->request->params['pass'][0];
            
             ?>

<?php echo $this->element('buttonbar',array('controller' => 'tenant', 'pass' => $roomId, 'text' => 'Add Tenant In This Room')); ?>

</div>

<div class="col-sm-12">



    <div class="panel panel-default">
       <div class="panel-heading"><h5>Statistics</h5></div>
         <div class="panel-body">
          
   <div class="col-sm-12">
      
      
     
     
     
   
   </div>      
   
   
            
         
         </div>
    </div>
    
   
    
</div> <!-- STATISTICS DIV END --!>

 <div class="col-sm-12">
    <div class="panel-primary">
    <div class="panel-heading"><h5>Tenants in This Room</h5></div>
    <div class="panel-body">
    
    <?php if($data): ?>
    
    <div class="table-responsive">
           <table class="table-condensed" style="width: 100%;">
            <thead>
     <tr>
       <th>ID</th>
       <th>First Name</th>
       <th>Middle Name</th>
       <th>Last Name</th>
       <th>Move - In</th>
       <th>Move - Out</th>
       <th>Rent Type</th>
       <th>Rent</th>
       <th>Action</th>
     </tr>
    </thead>
                <tbody>
               
                <?php foreach($data as $key => $value): ?>

                 <tr>
                 
                 <td><?php echo h($value['Tenant']['id']); ?></td>
                 <td><?php echo h($value['Tenant']['first_name']); ?></td>
                 <td><?php echo h($value['Tenant']['middle_name']); ?></td>
                 <td><?php echo h($value['Tenant']['last_name']); ?></td>
                 <td><?php echo h($value['Tenant']['date_of_move_in']); ?></td>
                 <td><?php echo h($value['Tenant']['date_of_move_out']); ?></td>
                 <td><?php echo h($value['Tenant']['rent_type']); ?></td>
                 <td><?php echo h($value['Tenant']['rent']); ?></td>
                 <td><a href="<?php echo Router::url(array('controller' => 'tenant', 'action' => 'details', h($value['Tenant']['id']) ) ); ?>" class="btn btn-success" role="button">Open File</a></td>
                 </tr>
                
                <?php endforeach; ?>
                
                </tbody>
           </table>
           </div>
           
           <?php else: ?>
           
           <?php echo $msg; endif; ?>
           
           </div>
           </div>
    
    </div>

