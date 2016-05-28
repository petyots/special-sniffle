<div class="col-sm-12">
 <div class="panel panel-default">
  <div class="panel-heading">Free Beds</div>
   <div class="panel-body">
    <div class="table-responsive">
     <table class="table">
    <thead>
     <tr>
      <th>RID</th>
      <th>Location</th>
      <th>Room Number</th>
      <th>Room Type</th>
      <th>Free Beds</th>
      
     </tr>
    </thead>
     <tbody>
     <?php foreach($data as $key => $value): ?>
      <tr>
       <td><?php echo h($value['Room']['id']); ?></td>
       <td><?php echo h($value['Room']['location_title']); ?></td>
       <td><?php echo h($value['Room']['room_number']); ?></td>
       <td><?php echo h($value['Room']['type']); ?></td>
       <td><?php echo h($value['Room']['free_beds']); ?></td>
       <td>
       <a href="
       <?php echo Router::url(array('controller' => 'room', 'action' => 'view' , h($value['Room']['id']))); ?>
       " class="btn btn-success" role="button">Open Room</a>
       </td>
      </tr>
      <?php endforeach; ?>
     </tbody>
     </table>
     </div>
   </div>
 </div>
</div>