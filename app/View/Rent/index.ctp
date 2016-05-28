<div class="col-sm-12">

<div class="table-responsive">
  <table class="table" style="width: 100%;">
    <thead>
     <tr>
       <th>ID</th>
       <th>Tenant ID</th>
       <th>Amount Paid</th>
       <th>Date Paid</th>
       <th>Next Date</th>
     </tr>
    </thead>
    <tbody>
    <?php foreach($data as $key => $value): ?>
     <tr>
     <td><p class="text-center"><b><?php echo h($value['Rent']['id']); ?></b></p></td>
     <td><p class="text-center"><b><?php echo h($value['Rent']['tenant_id']); ?></b></p></td>
     <td><p class="text-center"><b><?php echo h($value['Rent']['amount_paid']); ?></b></p></td>
     <td><p class="text-center"><b><?php echo h($value['Rent']['date_paid']); ?></b></p></td>
     <td><p class="text-center"><b><?php echo h($value['Rent']['next_date']); ?></b></p></td>
     <td><a href="<?php echo Router::url(array('controller' => 'tenant','action' => 'details',h($value['Rent']['tenant_id']))); ?>" role="button" class="btn btn-success">Check</a></td>
     </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
  
  <br />
  
  </div>
  
  <centeR>
  
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
  
  
  </centeR>

</div>

