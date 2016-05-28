<div class="col-sm-12">



<?php

echo $this->Form->create('Tenant',array('role' => 'form'));
?>

<?php

$fieldTenantId = $this->Form->input('tenant_id',array(
                                              'type' => 'text',
                                              'label' => 'Tenant ID' ,
                                              'class' => 'form-control'

                                              ));


echo $this->Html->div('form-group',$fieldTenantId);


echo $this->Form->end(array('class'=>'btn btn-default','value' => 'Find'));

?>

</div>