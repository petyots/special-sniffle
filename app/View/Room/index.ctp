<div class="col-sm-12">

<?php echo $this->element('buttonbar'); ?>

</div>

<div class="col-sm-12">



    <div class="panel panel-default">
       <div class="panel-heading"><h5>Statistics</h5></div>
         <div class="panel-body">
          
   <div class="col-sm-12">
      
      <div class="col-sm-4">
       <div class="panel panel-primary">
         <div class="panel-heading"><h5>Rooms</h5></div>
           <div class="panel-body">
           
           
           <h3><p class="text-primary text-center"><?php echo h($counter['Rooms']); ?></p></h3>
           
           <br />
           
           <center>
           
           <a class="btn btn-primary" role="button">View</a>
           
           </center>
           
           </div>
       </div>
     </div>
     
     <div class="col-sm-4">
       <div class="panel panel-success">
         <div class="panel-heading"><h5>Tenants</h5></div>
           <div class="panel-body">
           
           
           <h3><p class="text-success text-center"><?php echo h($counter['Tenant']); ?></p></h3>
           
           <br />
           
           <center>
           
           <a class="btn btn-success" role="button">View</a>
           
           </center>
           
           </div>
       </div>
     </div>
     
     <div class="col-sm-4">
       <div class="panel panel-danger">
         <div class="panel-heading"><h5>Pending Rents</h5></div>
           <div class="panel-body">
           
           
           <h3><p class="text-danger text-center"><?php echo h($counter['PP']); ?></p></h3>
           
           
           
           <br />
           
           <center>
           
           <a class="btn btn-danger" role="button">View</a>
           
           </center>
           
           </div>
       </div>
     </div>
   
   </div>      
   
   
            
         
         </div>
    </div>
    
   
    
</div> <!-- STATISTICS DIV END --!>

 <div class="col-sm-12">
    <div class="panel-primary">
    <div class="panel-heading"><h5>Records</h5></div>
    <div class="panel-body">
    
    <div class="table-responsive">
           <table class="table-condensed" style="width: 100%;">
            <thead>
                 <tr>
                   <th>RID</th>
                   <th>Location</th>
                   <th>Room Number</th>
                   <th>Type</th>
                   <th>Beds</th>
                   <th>Free Beds</th>
                   <th>Price</th>
                   <th>Action</th>
                 </tr>
                </thead>
                <tbody>
               
                <?php foreach($rooms as $key => $value): ?>
                 
                 <tr>
                 
                 <td><?php echo h($value['Room']['id']); ?></td>
                 <td><?php echo h($value['Room']['location_title']); ?></td>
                 <td><?php echo h($value['Room']['room_number']); ?></td>
                 <td><?php echo h($value['Room']['type']); ?></td>
                 <td><?php echo h($value['Room']['number_of_beds']); ?></td>
                 <td><?php echo h($value['Room']['free_beds']); ?></td>
                 <td><?php echo h($value['Room']['price']); ?></td>
                 <td><a href="<?php echo Router::url(array('controller' => 'room', 'action' => 'view', h($value['Room']['id']) ) ); ?>" class="btn btn-success" role="button">Open</a></td>
                 </tr>
                
                <?php endforeach; ?>
                
                </tbody>
           </table>
           </div>
           </div>
           </div>
    
    </div>

