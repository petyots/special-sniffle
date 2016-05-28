 <?php

    $rawDob = new DateTime($data['Tenant']['dob']);
    $fixedDob = $rawDob->format("d-m-Y");

    if($data['Tenant']['active'] === true):

    $active = "Yes";

    else:

    $active = "No";

    endif;

    ?>

<div class="col-sm-12">

    <div class="panel panel-default">
    <div class="panel-heading"><h4><?php echo h($data['Tenant']['first_name']. ' ' . $data['Tenant']['middle_name']. ' ' . $data['Tenant']['last_name']); ?></h4></div>
    <div class="panel-body">

    <?php

        if($data['Tenant']['active'] === false):

      ?>

    <div class="alert alert-danger">This Tenant is Deactivated !</div>

     <?php endif; ?>
                     
        <div class="col-sm-6">
            <ul class="list-group">
              <li class="list-group-item"><b>ID Number : <?php echo h($data['Tenant']['id']); ?> </b></li>
              <li class="list-group-item"><b>Location : <?php echo h($data['Tenant']['location_title']);?></b></li>
              <li class="list-group-item"><b>Room Number : <?php echo h($data['Tenant']['internal_room_number']); ?> </b></li>
              <li class="list-group-item"><b>Bed Number : <?php echo h($data['Tenant']['bed_number']); ?> </b></li>
              <li class="list-group-item"><b>First Name : <?php echo h($data['Tenant']['first_name']); ?>  </b></li>
              <li class="list-group-item"><b>Middle Name : <?php echo h($data['Tenant']['middle_name']); ?></b></li>
              <li class="list-group-item"><b>Last Name : <?php echo h($data['Tenant']['last_name']); ?></b></li>
              <li class="list-group-item"><b>Nationality : <?php echo h($data['Tenant']['nationality']); ?></b></li>
              <li class="list-group-item"><b>DOB : <?php echo h($fixedDob); ?></b></li>
              <li class="list-group-item"><b>Gender : <?php echo h($data['Tenant']['gender']); ?></li>
              <li class="list-group-item"><b>Smoker : <?php echo h($data['Tenant']['smoker']); ?></b></li>
              <li class="list-group-item"><b>Mobile Number : <?php echo h($data['Tenant']['mobile_number']); ?></b></li>
              <li class="list-group-item"><b>Email : <?php echo h($data['Tenant']['email']); ?></b></li>
              <li class="list-group-item"><b>Date Of Move In : <?php echo h($data['Tenant']['date_of_move_in']); ?></b></li>
              <li class="list-group-item"><b>Date Of Move Out : <?php echo h($data['Tenant']['date_of_move_out']); ?></b></li>
              <li class="list-group-item"><b>Rent Type : <?php echo h($data['Tenant']['rent_type']); ?></b></li>
              <li class="list-group-item"><b>Rent : <?php echo h($data['Tenant']['rent']); ?></b></li>
              <li class="list-group-item"><b>Active : <?php echo h($active); ?></b></li>
            </ul>
        </div>

        <div class="col-sm-6">
        <a href="#" class="thumbnail">
      <img src="http://placehold.it/330x350" alt="">
        </a>
        </div>
                   <div class="clearfix"></div>


                   <?php

   if($data['Pending']['id']):

   ?>



   <div class="alert alert-danger" role="alert">This Tenant Needs To Pay The Rent !</div>


   <br/>

<?php

   endif;

   ?>

   <div class="panel panel-default">
   <div class="panel-heading">Options</div>
   <div class="panel-body">

   <a href="<?php echo Router::url(array('controller'=> 'rent', 'action' => 'pay',h($data['Tenant']['id']))); ?>"
     class="btn btn-success" role="button">Pay</a>

     <a href="<?php echo Router::url(array('controller'=> 'tenant', 'action' => 'edit',h($data['Tenant']['id']))); ?>"
     class="btn btn-warning" role="button">Edit</a>

   <?php if($data['Tenant']['active'] !== false): ?>

   <?php
    echo $this->Form->postLink('Deactivate',Router::url(
    array('controller' => 'tenant',
    'action' => 'status',$data['Tenant']['id'],'deactivate')),
    array('class' => 'btn btn-danger','role' => 'button' , 'confirm' => 'Are You Sure ?'));
    ?>

   <?php else: ?>

   <?php
    echo $this->Form->postLink('Activate',Router::url(
    array('controller' => 'tenant',
    'action' => 'status',$data['Tenant']['id'],'activate')),
    array('class' => 'btn btn-success','role' => 'button' , 'confirm' => 'Are You Sure ?'));
    ?>

   <?php endif; ?>

   </div>
   </div>


        <div class="panel panel-default">
        <div class="panel-heading">Documents</div>

        <div class="panel-body">
            <div class="btn-group" role="group" aria-label="">
           <a href="<?php echo Router::url(array('controller'=> 'tenant', 'action' => 'issue','proof_of_addr',h($data['Tenant']['id']))); ?>"
             class="btn btn-primary" role="button">Proof Of Address</a>
             <a href="<?php echo Router::url(array('controller'=> 'tenant', 'action' => 'issue','contract',h($data['Tenant']['id']))); ?>"
             class="btn btn-primary " role="button">Contract</a>
           <a href="<?php echo Router::url(array('controller'=> 'tenant', 'action' => 'display','id',h($data['Tenant']['id']))); ?>"
             class="btn btn-primary" role="button">Show ID</a>
        </div>

        </div>
        </div>

        <div class="clearfix"></div>

         <div class="table-responsive">
  <table class="table" style="width: 100%;">
    <thead>
     <tr>
       <th>ID</th>
       <th>Rent Type</th>
       <th>Amount Paid</th>
       <th>Date Paid</th>
       <th>Next Date</th>
       <th>Comment</th>
     </tr>
    </thead>
    <tbody>
    <?php foreach($data['Rent'] as $key => $value): ?>
     <tr>
     <td><p class="text-center"><b><?php echo h($value['id']); ?></b></p></td>
     <td><p class="text-center"><b><?php echo h($data['Tenant']['rent_type']); ?></b></p></td>
     <td><p class="text-center"><b><?php echo h($value['amount_paid']); ?></b></p></td>
     <td><p class="text-center"><b><?php echo h($value['date_paid']); ?></b></p></td>
     <td><p class="text-center"><b><?php echo h($value['next_date']); ?></b></p></td>
     <td><p class="text-center"><b><?php echo h($value['comment']);?></b></p></td>
     </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
  </div>

    </div>
    <div class="panel-footer"></div>
    </div>

</div>