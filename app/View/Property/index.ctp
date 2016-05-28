<div class="col-sm-12">

<?php echo $this->element('buttonbar'); ?>

</div>
<div class="col-sm-12">
    <div class="panel-primary">
    <div class="panel-heading"><h5>Records</h5></div>
    <div class="panel-body">
    
    <div class="table-responsive">
           <table class="table-condensed" style="width: 100%;">
            <thead>
                 <tr>
                   <th>ID</th>
                   <th>Property Title</th>
                   <th>Type</th>
                   <th>Location</th>
                   <th>Action</th>
                 </tr>
                </thead>
                <tbody>
               
                <?php foreach($data as $value): ?>
                 
                 <tr>
                 
                 <td><?php echo h($value['Property']['id']); ?></td>
                 <td><?php echo h($value['Property']['title']); ?></td>
                 <td><?php echo h($value['Property']['type']); ?></td>
                 <td><?php echo h($value['Property']['location']); ?></td>
                 <td><a href="<?php echo Router::url(array('controller' => 'property', 'action' => 'details', h($value['Property']['id']) ) ); ?>" class="btn btn-success" role="button">Go There</a></td>
                 
                 </tr>
                
                <?php endforeach; ?>
                
                </tbody>
           </table>
           </div>
           </div>
           </div>
    
    </div>


