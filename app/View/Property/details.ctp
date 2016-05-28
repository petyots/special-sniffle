

<div class="col-sm-12">

<?php echo $this->element('buttonbar',array('controller' => 'room','text' => 'Add Room Here','pass' => $data['Property']['id'] )); ?>

</div>

<div class="col-sm-12">

<div class="well">
<h4>You are in <?php echo h($data['Property']['location']); ?></h4>
</div>

    <div class="panel-primary">
    <div class="panel-heading"><h5>Records</h5></div>
    <div class="panel-body">
    
    <div class="table-responsive">
           <table class="table-condensed" style="width: 100%;">
            <thead>
                 <tr>
                   <th>ID</th>
                   <th>Beds</th>
                   <th>Type</th>
                   <th>Price</th>
                   <th>Action</th>
                 </tr>
                </thead>
                <tbody>
               
                <?php foreach($data['Room'] as $key => $value): ?>
                 
                 <tr>
                 
                 <td><?php echo h($value['id']); ?></td>
                 <td><?php echo h($value['number_of_beds']); ?></td>
                 <td><?php echo h($value['type']); ?></td>
                 <td><?php echo h($value['price']); ?></td>
                 <td><a href="<?php echo Router::url(array('controller' => 'room', 'action' => 'view', h($value['id']) ) ); ?>" class="btn btn-success" role="button">Open</a></td>
                 
                 </tr>
                
                <?php endforeach; ?>
                
                </tbody>
           </table>
           </div>
           </div>
           </div>
    
    </div>


