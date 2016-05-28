<div class="col-sm-12">
 <div class="panel panel-default">
  <div class="panel-heading">Pendings</div>
   <div class="panel-body">
    <div class="table-responsive">
     <table class="table">
    <thead>
     <tr>
      <th>ID</th>
      <th>Tenant ID</th>
      <th>Room  - Location</th>
      <th>Amount</th>
      <th>Days / Checks</th>
     </tr>
    </thead>
     <tbody>
     <?php foreach($pendings as $key => $value): ?>
      <tr>
       <td><?php echo h($value['Pending']['id']); ?></td>
       <td><?php echo h($value['Pending']['tenant_id']); ?></td>
       <td><?php echo h($value['Pending']['location']); ?></td>
       <td><?php echo h($value['Pending']['amount']); ?></td>
       <td><?php echo h($value['Pending']['checks']); ?></td>
       <td>
       <a href="
       <?php echo Router::url(array('controller' => 'tenant', 'action' => 'details' , h($value['Pending']['tenant_id']))); ?>
       " class="btn btn-success" role="button">Open Record</a>
       </td>
      </tr>
      <?php endforeach; ?>
     </tbody>
     </table>
     </div>
   </div>
 </div>
</div>