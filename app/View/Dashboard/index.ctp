<div class="col-sm-12">
  <div class="panel panel-default">
     <div class="panel-heading"><h4>Statistics</h4></div>
        <div class="panel-body">
           
           <div class="col-sm-3">
            <div class="panel-primary">
             <div class="panel-heading"><h4>Properties</h4></div>
              <div class="panel-body">
                
                <h2>
                <p class="text-primary text-center">
                
                
              <?php echo h($counter['properties']); ?>
              
                
                </p>
                </h2>
              
                </div>
               <div class="panel-footer">
                <centeR>
               <a href="
               <?php echo Router::url(array('controller' => 'property', 'action' => 'index')); ?>"
               class="btn btn-primary" role="button">View</a>
               </centeR>
               </div>
              </div>
            </div>
            
            <div class="col-sm-3">
            <div class="panel-primary">
             <div class="panel-heading"><h4>Rooms</h4></div>
              <div class="panel-body">
              
              <h2>
                <p class="text-primary text-center">
                
                
              <?php echo h($counter['rooms']); ?>
              
                
                </p>
                </h2>
              
               </div>
               <div class="panel-footer">
               <centeR>
               <a href="
               <?php echo Router::url(array('controller' => 'room', 'action' => 'index')); ?>"
               class="btn btn-primary" role="button">View</a>
               </centeR>
               </div>
              </div>
            </div>
            
            <div class="col-sm-3">
            <div class="panel-success">
             <div class="panel-heading"><h4>Tenants</h4></div>
              <div class="panel-body">
              <h2>
                <p class="text-success text-center">
                
                
              <?php echo h($counter['tenants']); ?>
              
                
                </p>
                </h2>
               </div>
               <div class="panel-footer">
               <centeR>
               <a href="
               <?php echo Router::url(array('controller' => 'tenant', 'action' => 'index')); ?>"
               class="btn btn-success" role="button">View</a>
               </centeR>
               </div>
              </div>
            </div>
            
            <div class="col-sm-3">
            <div class="panel-success">
             <div class="panel-heading"><h4>Free Beds</h4></div>
              <div class="panel-body">
              
              <h2>
                <p class="text-success text-center">
                
                
              <?php echo h($counter['free_beds']); ?>
              
                
                </p>
                </h2>
              
               </div>
               <div class="panel-footer">
               <centeR>
               <a href="
               <?php echo Router::url(array('controller' => 'room', 'action' => '')); ?>"
               class="btn btn-success" role="button">View</a>
               </centeR>
               </div>
              </div>
            </div>
            
            
            
            <div class="col-sm-3">
            <div class="panel-warning">
             <div class="panel-heading"><h4>Pending Rents</h4></div>
              <div class="panel-body">
              
              <h2>
                <p class="text-warning text-center">
                
               
              
              <?php echo h($counter['pendings']); ?>
              
              
                
                </p>
                </h2>
              
               </div>
               <div class="panel-footer">
               <centeR>
               <a href="
               <?php echo Router::url(array('controller' => 'pending', 'action' => 'index')); ?>"
               class="btn btn-warning" role="button">View</a>
               </centeR>
               </div>
              </div>
            </div>
            
            
            
            <div class="col-sm-3">
            <div class="panel-danger">
             <div class="panel-heading"><h4>Overdue Rents</h4></div>
              <div class="panel-body">
              
              <h2>
                <p class="text-danger text-center">
                
                
              <?php echo h($counter['overdue']); ?>
              
                
                </p>
                </h2>
              
               </div>
               <div class="panel-footer">
               <centeR>
               <a href="
               <?php echo Router::url(array('controller' => 'pending', 'action' => 'overdue')); ?>"
               class="btn btn-danger" role="button">View</a>
               </centeR>
               </div>
              </div>
            </div>
           
           
           
           
       </div>  
     </div>
    </div>
  </div>
 