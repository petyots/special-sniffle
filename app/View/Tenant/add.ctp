<div class="col-sm-12">



<?php

echo $this->Form->create('Tenant',array('role' => 'form'));
?>

<?php

echo $this->Form->hidden('room_id',array('value' => $room) );

$fieldFirstName = $this->Form->input('first_name',array(

                                              'label' => 'Forename' ,
                                              'class' => 'form-control'

                                              ));
$fieldMiddleName = $this->Form->input('middle_name',array(
                                              
                                              'label' => 'Middle Name' ,
                                              'class' => 'form-control' 
                                              
                                              ));
                                              
$fieldLastName = $this->Form->input('last_name',array(

                                              'label' => 'Surname' ,
                                              'class' => 'form-control'

                                              ));
$fieldGender = $this->Form->input('gender',array(

                                              'label' => 'Gender' ,
                                              'class' => 'form-control'

                                              ));

$fieldNationality = $this->Form->input('nationality',array(
                                              
                                              'label' => 'Nationality' , 
                                              'class' => 'form-control'

                                              ));
$fieldMobileNumber = $this->Form->input('mobile_number',array(

                                              'label' => 'Mobile Number' , 
                                              'class' => 'form-control'

                                              ));

$fieldEmail = $this->Form->input('email',array(

                                              'label' => 'Email' ,
                                              'class' => 'form-control'

                                              ));

$fieldRoomNumber = $this->Form->input('room_number',array(

                                              'label' => 'Room Number' ,
                                              'class' => 'form-control'

                                              ));
                                              
$fieldDateOfMoveIn = $this->Form->input('date_of_move_in',array(
                                              
                                              'label' => 'Date of Move - In' ,
                                              'class' => 'form-control' 
                                              
                                              ));
$fieldRentType = $this->Form->input('rent_type',array(
                                              
                                              'label' => 'Rent Type' , 
                                              'class' => 'form-control' 

                                              )); 
$fieldRent = $this->Form->input('rent',array(
                                              
                                              'label' => 'Rent' ,
                                              'class' => 'form-control' 
                                              
                                              ));                                                                                             


$fieldComment = $this->Form->input('comment',array(

                                              'label' => 'Comment' ,
                                              'class' => 'form-control'

                                              ));
$fieldDob = $this->Form->input('dob',array(

                                              'label' => 'Date Of Birth' ,
                                              'class' => 'form-control'

                                              ));
$fieldSmoker = $this->Form->input('smoker',array(

                                              'label' => 'Smoker' ,
                                              'class' => 'form-control'

                                              ));

$fieldBedNumber = $this->Form->input('bed_number',array(

                                              'label' => 'Bed Number' ,
                                              'class' => 'form-control'

                                              ));

echo $this->Html->div('form-group',$fieldFirstName);
echo $this->Html->div('form-group',$fieldMiddleName);
echo $this->Html->div('form-group',$fieldLastName);
echo $this->Html->div('form-group',$fieldDob);
echo $this->Html->div('form-group',$fieldGender);
echo $this->Html->div('form-group',$fieldNationality);
echo $this->Html->div('form-group',$fieldSmoker);
echo $this->Html->div('form-group',$fieldMobileNumber);
echo $this->Html->div('form-group',$fieldEmail);
echo $this->Html->div('form-group',$fieldDateOfMoveIn);
echo $this->Html->div('form-group',$fieldRoomNumber);
echo $this->Html->div('form-group',$fieldBedNumber);
echo $this->Html->div('form-group',$fieldRentType);
echo $this->Html->div('form-group',$fieldRent);
echo $this->Html->div('form-group',$fieldComment);



echo $this->Form->end(array('class'=>'btn btn-default','value' => 'Add'));

?>

</div>