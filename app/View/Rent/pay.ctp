<div class="col-sm-12">

<h4>Payment Form For TENANT ID : <?php echo h($tenant['Tenant']['id']); ?></h4>
<br />



<?php

$today = new DateTime('now');

$displayToday = $today->format('Y-m-d');

switch($tenant['Tenant']['rent_type']){

    case 'Weekly':
    
    $nextRaw = new DateTime('+1 week');
    $nextDate = $nextRaw->format('Y-m-d');
    
    break;
    
    case 'Monthly':
    
    $nextRaw = new DateTime('+1 month');
    $nextDate = $nextRaw->format('Y-m-d');
    
    break;
    
    default:
    
    $nextRaw = new DateTime('+1 week');
    $nextDate = $nextRaw->format('Y-M-D');
    
    
}

echo $this->Form->create('Rent',array('role' => 'form'));
?>

<?php

echo $this->Form->hidden('tenant_id',array('value' => h($tenant['Tenant']['id']) ));



$fieldDatePaid = $this->Form->input('date_paid',array(
                                              
                                              'label' => 'Date Of Payment' ,
                                              'readonly' => 'readonly',
                                              'value' => $displayToday,
                                              'class' => 'form-control' 
                                              
                                              ));
$fieldAmountPaid = $this->Form->input('amount_paid',array(
                                              
                                              'label' => 'Amount To Pay',
                                              'value' => h($tenant['Tenant']['rent']) ,
                                              'class' => 'form-control' 
                                              
                                              ));  
                                              
$fieldNextDate = $this->Form->input('next_date',array(
                                              
                                              'label' => 'Date Of Next Payment <br/> Should Be : '.$nextDate , 
                                              'class' => 'form-control',
                                              'dateFormat' => 'YMD' ,
                                              
                                              ));
                                              
$fieldComment = $this->Form->input('comment',array(
                                              
                                              'label' => 'Comments' , 
                                              'class' => 'form-control' 
                                              
                                              ));

                                                                                                                                                                                                                                 
                                              
echo $this->Html->div('form-group',$fieldDatePaid);
echo $this->Html->div('form-group',$fieldAmountPaid);
echo $this->Html->div('form-group',$fieldNextDate);
echo $this->Html->div('form-group',$fieldComment);


echo $this->Form->end(array('class'=>'btn btn-default','value' => 'Add'));

?>

</div>