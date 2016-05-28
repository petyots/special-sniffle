<div class="col-sm-12">


<?php

echo $this->Form->create('Property',array('role' => 'form' , 'novalidate' => true));

$fieldTitle = $this->Form->input('title',array(
                                              
                                              'label' => 'Title' , 
                                              'class' => 'form-control' 
                                              
                                              ));
$fieldType = $this->Form->input('type',array(
                                              
                                              'label' => 'Type' , 
                                              'class' => 'form-control' 
                                              
                                              ));  
                                              
$fieldLocation = $this->Form->input('location',array(
                                              
                                              'label' => 'Location' , 
                                              'class' => 'form-control' 
                                              
                                              ));                                                                                          
                                              
echo $this->Html->div('form-group',$fieldTitle);
echo $this->Html->div('form-group',$fieldType);
echo $this->Html->div('form-group',$fieldLocation);
echo $this->Form->end(array('class'=>'btn btn-default','value' => 'Add'));

?>

</div>