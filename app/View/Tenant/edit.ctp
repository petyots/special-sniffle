<div class="col-sm-12">



<?php

echo $this->Form->create('Tenant',array('role' => 'form'));
?>

<?php


$fieldFirstName = $this->Form->input('first_name',array(
                                              
                                              'label' => 'Forename' , 
                                              //'value' => $tenant['Tenant']['first_name'],
                                              'class' => 'form-control', 
                                              
                                              ));
$fieldMiddleName = $this->Form->input('middle_name',array(
                                              
                                              'label' => 'Middle Name' ,
                                              //'value' => $tenant['Tenant']['middle_name'], 
                                              'class' => 'form-control' 
                                              
                                              ));  
                                              
$fieldLastName = $this->Form->input('last_name',array(
                                              
                                              'label' => 'Surname' ,
                                              //'value' => $tenant['Tenant']['last_name'], 
                                              'class' => 'form-control' 
                                              
                                              ));
                                              
$fieldDob = $this->Form->input('dob',array(
                                              
                                              'label' => 'Date Of Birth' ,
                                              'type' => 'text',
                                              //'value' => $tenant['Tenant']['dob'], 
                                              'class' => 'form-control',
                                              //'dateFormat' => 'DMY',
                                              //'minYear' => date('Y') - 70,
                                              //'maxYear' => date('Y') - 18, 
                                              
                                              ));
                                              
$fieldSmoker = $this->Form->input('smoker',array(
                                              
                                              'label' => 'Smoker' ,
                                              //'value' => $tenant['Tenant']['smoker'], 
                                              'class' => 'form-control' 
                                              
                                              ));                                                                                            
                                              
$fieldNationality = $this->Form->input('nationality',array(
                                              
                                              'label' => 'Nationality' , 
                                              //'value' => $tenant['Tenant']['nationality'],
                                              'class' => 'form-control' 
                                              
                                              ));
$fieldMobileNumber = $this->Form->input('mobile_number',array(
                                              
                                              'label' => 'Mobile Number' ,
                                              //'value' => $tenant['Tenant']['mobile_number'], 
                                              'class' => 'form-control' 
                                              
                                              ));  
                                              
$fieldDateOfMoveIn = $this->Form->input('date_of_move_in',array(
                                              
                                              'type' => 'text',
                                              'label' => 'Date of Move - In' ,
                                              //'value' => $tenant['Tenant']['date_of_move_in'], 
                                              'class' => 'form-control' 
                                              
                                              ));
$fieldRentType = $this->Form->input('rent_type',array(
                                              
                                              'label' => 'Rent Type' ,
                                              //'value' => $tenant['Tenant']['rent_type'], 
                                              'class' => 'form-control' 
                                              
                                              )); 
$fieldRent = $this->Form->input('rent',array(
                                              
                                              'label' => 'Rent' ,
                                              //'value' => $tenant['Tenant']['rent'], 
                                              'class' => 'form-control' 
                                              
                                              ));                                                                                             
                                              
                                              
$fieldComment = $this->Form->textarea('comments',array(

                                              'label' => 'Comment' ,
                                              //'value' => $tenant['Tenant']['comments'],
                                              'class' => 'form-control' 

                                              ));

$fieldGender = $this->Form->input('gender',array(

                                              'label' => 'Gender' ,
                                              //'value' => $tenant['Tenant']['gender'],
                                              'class' => 'form-control'

                                              ));

$fieldEmail = $this->Form->input('email',array(

                                              'label' => 'Email' ,
                                              //'value' => $tenant['Tenant']['email'],
                                              'class' => 'form-control'

                                              ));

echo $this->Html->div('form-group',$fieldFirstName);
echo $this->Html->div('form-group',$fieldMiddleName);
echo $this->Html->div('form-group',$fieldLastName);
echo $this->Html->div('form-group',$fieldDob);
echo $this->Html->div('form-group',$fieldGender);
echo $this->Html->div('form-group',$fieldSmoker);
echo $this->Html->div('form-group',$fieldNationality);
echo $this->Html->div('form-group',$fieldMobileNumber);
echo $this->Html->div('form-group',$fieldEmail);
echo $this->Html->div('form-group',$fieldDateOfMoveIn);
echo $this->Html->div('form-group',$fieldRentType);
echo $this->Html->div('form-group',$fieldRent);
echo $this->Html->div('form-group',$fieldComment);



echo $this->Form->end(array('class'=>'btn btn-default','value' => 'Add'));

?>

</div>