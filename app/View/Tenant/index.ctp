<div class="col-sm-12">
 <div class="panel panel-default">
  <div class="panel-heading">Tenants</div>
   <div class="panel-body">
    <div class="table-responsive">
     <table class="table">
    <thead>
     <tr>
      <th>ID</th>
      <th>Location</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Check - In</th>
      <th>Type</th>
      <th>Rent</th>
      <th>Rent Check</th>
     </tr>
    </thead>
     <tbody>
     <?php 
            $ok =  "<p class=\"text-success\"><b>PASS</b></p>";
            $fail = "<p class=\"text-danger\"><b>FAIL</b></p>";
            ?>
            
                <?php foreach($data as $key => $value): ?>
      <tr>
       <td><?php echo h($value['Tenant']['id']); ?></td>
                 <td><?php echo h($value['Tenant']['room_number']. " - ". $value['Tenant']['location_title']); ?></td>
                 <td><?php echo h($value['Tenant']['first_name']); ?></td>
                 <td><?php echo h($value['Tenant']['last_name']); ?></td>
                 <td><?php echo h($value['Tenant']['date_of_move_in']); ?></td>
                 <td><?php echo h($value['Tenant']['rent_type']); ?></td>
                 <td><?php echo h($value['Tenant']['rent']); ?></td>
                 <td>
                 <?php 
                 if($value['Pending']['id'] === null){ 
                    echo $ok; }else { echo $fail; 
                    
                    };
                    
                  ?>
                 </td>
                 <td><a href="<?php echo Router::url(array('controller' => 'tenant', 'action' => 'details', h($value['Tenant']['id']) ) ); ?>" class="btn btn-success" role="button">Open File</a></td>
      </tr>
      <?php endforeach; ?>
     </tbody>
     </table>
     </div>
   </div>
 </div>
</div>



           <?php
           
           // Shows the page numbers
echo $this->Paginator->numbers();

// Shows the next and previous links
echo $this->Paginator->prev(
  '« Previous',
  null,
  null,
  array('class' => 'disabled')
);
echo $this->Paginator->next(
  'Next »',
  null,
  null,
  array('class' => 'disabled')
);
?>
           </div>
           </div>
           
         
         </div>
</div>




